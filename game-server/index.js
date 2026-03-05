const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const cors = require('cors');
const os = require('os');

const app = express();
app.use(cors());

const server = http.createServer(app);
const io = new Server(server, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
});

// State
let waitingPlayer = null; // { id: 'socket_id', name: 'PlayerName' }
// roomID -> { players: {id1: 'X', id2: 'O'}, board: Array(9), turn: 'X' }
const activeGames = {};

const winPatterns = [
    [0, 1, 2], [3, 4, 5], [6, 7, 8], // Rows
    [0, 3, 6], [1, 4, 7], [2, 5, 8], // Cols
    [0, 4, 8], [2, 4, 6]           // Diagonals
];

function checkWin(board) {
    for (let p of winPatterns) {
        if (board[p[0]] && board[p[0]] === board[p[1]] && board[p[0]] === board[p[2]]) {
            return board[p[0]]; // 'X' or 'O'
        }
    }
    if (!board.includes('')) return 'Draw';
    return null;
}

io.on('connection', (socket) => {
    socket.currentRoom = null;

    socket.on('findMatch', (data) => {
        const playerName = data && data.name ? data.name : 'PLAYER';

        // If already waiting, ignore
        if (waitingPlayer && waitingPlayer.id === socket.id) return;

        if (waitingPlayer && waitingPlayer.id !== socket.id) {
            // Found a match! Pair them up.
            const p1 = waitingPlayer.id;
            const p1Name = waitingPlayer.name;
            const p2 = socket.id;
            const p2Name = playerName;

            const roomName = `room_${p1}_${p2}`;

            // Ensure p1 is still connected before starting
            const socket1 = io.sockets.sockets.get(p1);
            if (!socket1) { // p1 disconnected while waiting
                waitingPlayer = { id: socket.id, name: playerName };
                return;
            }

            // Join both sockets to the new private room
            socket1.join(roomName);
            socket.join(roomName);

            socket1.currentRoom = roomName;
            socket.currentRoom = roomName;

            // Initialize game state (p1 is always X, p2 is always O)
            activeGames[roomName] = {
                players: {
                    [p1]: 'X',
                    [p2]: 'O'
                },
                board: Array(9).fill(''),
                turn: 'X'
            };

            waitingPlayer = null;

            // Notify players they found a match and assign roles + opponent names
            io.to(p1).emit('matchFound', { mark: 'X', turn: 'X', opponentName: p2Name });
            io.to(p2).emit('matchFound', { mark: 'O', turn: 'X', opponentName: p1Name });
            io.to(roomName).emit('boardUpdate', activeGames[roomName].board);

        } else {
            // Nobody is waiting, so this socket becomes the waiting player
            waitingPlayer = { id: socket.id, name: playerName };
        }
    });

    socket.on('makeMove', (index) => {
        const roomName = socket.currentRoom;
        if (!roomName || !activeGames[roomName]) return;

        const game = activeGames[roomName];
        const mark = game.players[socket.id];

        // Validate it is the player's turn and the clicked cell is empty
        if (game.turn !== mark || game.board[index] !== '') return;

        // Apply the move
        game.board[index] = mark;

        // Check for win or draw
        const winner = checkWin(game.board);

        // Broadcast the updated board to the room
        io.to(roomName).emit('boardUpdate', game.board);

        if (winner) {
            // Send Game Over event
            io.to(roomName).emit('gameOver', { winner });

            // Note: We DO NOT delete the game room here anymore, 
            // because players might want a rematch!
            game.state = 'game_over';
        } else {
            // Proceed to the next turn
            game.turn = mark === 'X' ? 'O' : 'X';
            io.to(roomName).emit('turnChange', game.turn);
        }
    });

    socket.on('requestRematch', () => {
        const roomName = socket.currentRoom;
        if (roomName && activeGames[roomName]) {
            // Forward the request to the other player in the room
            socket.to(roomName).emit('rematchRequested');
        }
    });

    socket.on('acceptRematch', () => {
        const roomName = socket.currentRoom;
        if (roomName && activeGames[roomName]) {
            const game = activeGames[roomName];
            // Reset the board
            game.board = Array(9).fill('');
            // Optional: You could swap who goes first. For now, we'll let X always start.
            game.turn = 'X';
            game.state = 'playing';

            io.to(roomName).emit('rematchStarted', { board: game.board, turn: game.turn });
        }
    });

    socket.on('declineRematch', () => {
        const roomName = socket.currentRoom;
        if (roomName) {
            socket.to(roomName).emit('rematchDeclined');
            handleDisconnectOrLeave(socket); // Use the existing cleanup function to destroy the room
        }
    });

    // --- WebRTC Signaling Events ---
    socket.on('webrtc_offer', (offer) => {
        const roomName = socket.currentRoom;
        if (roomName) socket.to(roomName).emit('webrtc_offer', offer);
    });

    socket.on('webrtc_answer', (answer) => {
        const roomName = socket.currentRoom;
        if (roomName) socket.to(roomName).emit('webrtc_answer', answer);
    });

    socket.on('webrtc_ice_candidate', (candidate) => {
        const roomName = socket.currentRoom;
        if (roomName) socket.to(roomName).emit('webrtc_ice_candidate', candidate);
    });

    // Bind the leave handler locally so we can pass the socket manually if needed
    function handleDisconnectOrLeave(targetSocket = socket) {
        // If the disconnected player was in the queue, remove them
        if (waitingPlayer && waitingPlayer.id === targetSocket.id) {
            waitingPlayer = null;
        }

        // If they were actively in a game, forfeit the match
        const roomName = targetSocket.currentRoom;
        if (roomName && activeGames[roomName]) {
            const mark = activeGames[roomName].players[targetSocket.id];
            const winner = mark === 'X' ? 'O' : 'X'; // The other player wins by default
            io.to(roomName).emit('gameOver', { winner, method: 'disconnect' });
            delete activeGames[roomName];

            // Clean up sockets from the room
            const socketsInRoom = io.sockets.adapter.rooms.get(roomName);
            if (socketsInRoom) {
                for (const sid of socketsInRoom) {
                    const s = io.sockets.sockets.get(sid);
                    if (s) {
                        s.currentRoom = null;
                        s.leave(roomName);
                        s.emit('roomDestroyed'); // Tell client to return to menu
                    }
                }
            }
        }
    }

    socket.on('disconnect', () => handleDisconnectOrLeave(socket));
    socket.on('leaveMatch', () => handleDisconnectOrLeave(socket));
});

const PORT = Number(process.env.PORT || 3000);
const HOST = process.env.HOST || '0.0.0.0';

function getLanIPv4() {
    const nets = os.networkInterfaces();
    for (const name of Object.keys(nets)) {
        for (const net of nets[name] || []) {
            if (net.family === 'IPv4' && !net.internal) {
                return net.address;
            }
        }
    }
    return null;
}

server.listen(PORT, HOST, () => {
    const lanIp = getLanIPv4();
    console.log(`Tic-Tac-Toe Server running on ${HOST}:${PORT}`);
    console.log(`Local URL: http://localhost:${PORT}`);
    if (lanIp) {
        console.log(`Network URL: http://${lanIp}:${PORT}`);
    }
});
