@extends('layouts.app')

@section('title', 'Tic-Tac-Toe - LAVA ESPORTS')

@section('content')
<div class="container mx-auto px-4 py-12 pt-32 min-h-screen">
    
    <!-- Game Container Wrapper -->
    <div class="max-w-4xl mx-auto bg-[#0a0a0a] rounded-xl border border-white/10 overflow-hidden shadow-2xl relative group" id="game-wrapper">
        
        <!-- Exit Game Button -->
        <div class="absolute top-4 left-4 z-50 hidden" id="exit-btn-container">
           <button id="exit-btn" class="bg-red-600/80 hover:bg-red-700 text-white px-4 py-2 text-sm font-bold uppercase tracking-widest rounded border border-red-500/50 backdrop-blur-sm transition-colors shadow-lg" title="Exit Game">
               Exit Match
           </button>
        </div>

        <!-- Control Buttons Container -->
        <div class="absolute top-4 right-4 z-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex gap-2">
           <!-- Mic Toggle Button -->
           <button id="mic-btn" class="bg-black/50 hover:bg-black/80 text-white p-2 rounded border border-white/20 backdrop-blur-sm transition-colors hidden" title="Toggle Microphone">
               <!-- Icon: Mic On -->
               <svg id="mic-icon-on" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 shadow-[0_0_10px_rgba(34,197,94,0.5)] hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
               </svg>
               <!-- Icon: Mic Muted -->
               <svg id="mic-icon-off" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0m-6-3l12 12" />
               </svg>
           </button>

           <!-- Video Toggle Button -->
           <button id="video-btn" class="bg-black/50 hover:bg-black/80 text-white p-2 rounded border border-white/20 backdrop-blur-sm transition-colors hidden" title="Toggle Camera">
               <!-- Icon: Video On -->
               <svg id="video-icon-on" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 shadow-[0_0_10px_rgba(34,197,94,0.5)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
               </svg>
               <!-- Icon: Video Off -->
               <svg id="video-icon-off" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" clip-rule="evenodd" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
               </svg>
           </button>
           
           <!-- Fullscreen Toggle Button -->
           <button id="fullscreen-btn" class="bg-black/50 hover:bg-black/80 text-white p-2 rounded border border-white/20 backdrop-blur-sm transition-colors" title="Toggle Fullscreen">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
               </svg>
           </button>
        </div>

        <!-- Toast Notifications Container -->
        <div id="toast-container" class="absolute top-16 right-4 z-[100] flex flex-col gap-2 pointer-events-none"></div>

        <!-- Video Containers -->
        <div class="absolute top-20 left-4 z-40 w-32 h-24 md:w-48 md:h-36 bg-black/80 rounded-xl overflow-hidden border-2 border-green-500 shadow-[0_0_15px_rgba(34,197,94,0.3)] hidden transition-all duration-500" id="local-video-container">
            <video id="local-video" autoplay muted playsinline class="w-full h-full object-cover transform -scale-x-100"></video>
            <div class="absolute bottom-1 right-1 text-[10px] text-white font-bold bg-black/80 px-2 py-0.5 rounded tracking-widest hidden" id="local-mic-muted">MUTED</div>
            <div class="absolute top-1 left-2 text-[10px] text-white font-bold bg-black/50 px-1 rounded tracking-widest">YOU</div>
        </div>

        <div class="absolute bottom-4 right-4 z-40 w-32 h-24 md:w-48 md:h-36 bg-black/80 rounded-xl overflow-hidden border-2 border-lava-500 shadow-[0_0_15px_rgba(220,38,38,0.3)] hidden transition-all duration-500" id="remote-video-container">
            <video id="remote-video" autoplay playsinline class="w-full h-full object-cover transform -scale-x-100"></video>
            <div class="absolute top-1 right-2 text-[10px] text-white font-bold bg-black/50 px-1 rounded tracking-widest" id="remote-video-name">OPPONENT</div>
        </div>

        <!-- The actual display area (Aspect Ratio 16:9 like a screen) -->
        <div id="game-display" class="w-full aspect-video flex items-center justify-center relative bg-black overflow-hidden">
            
            <!-- Ambient Background Image Layer for the Game Container -->
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat opacity-60 pointer-events-none" style="background-image: url('https://images.unsplash.com/photo-1557672172-298e090bd0f1?q=80&w=1974&auto=format&fit=crop');"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black pointer-events-none"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-transparent to-black/80 pointer-events-none"></div>

            <!-- STATE 1: Start Screen -->
            <div id="state-start" class="text-center absolute inset-0 flex flex-col items-center justify-center z-20 backdrop-blur-sm bg-black/40 text-shadow-xl">
                 <h2 class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500 mb-2 tracking-widest uppercase filter drop-shadow-[0_0_10px_rgba(220,38,38,0.8)]">Tic-Tac-Toe</h2>
                 <p class="text-gray-300 tracking-widest text-sm mb-8 font-bold drop-shadow-md">MULTIPLAYER SHOWDOWN</p>
                 
                 <input type="text" id="player-name-input" placeholder="ENTER YOUR NAME" class="mb-6 px-6 py-3 bg-black/60 border border-white/20 rounded text-center text-white font-bold tracking-widest focus:outline-none focus:border-lava-500 transition-colors w-64 placeholder-gray-500" maxlength="15">
                 
                 <button id="play-btn" class="px-12 py-4 bg-lava-600 hover:bg-lava-700 text-white font-black text-xl rounded tracking-widest transition-all shadow-[0_0_20px_rgba(220,38,38,0.4)] hover:shadow-[0_0_30px_rgba(220,38,38,0.6)] uppercase hover:scale-105">
                     Play Now
                 </button>
                 <p id="server-status" class="mt-6 text-xs text-red-500 hidden tracking-widest bg-black/50 px-4 py-2 rounded">SERVER UNREACHABLE - START NODE.JS</p>
            </div>

            <!-- STATE 2: Searching -->
            <div id="state-searching" class="hidden text-center absolute inset-0 flex flex-col items-center justify-center bg-black/60 backdrop-blur-md z-20">
                 <div class="w-16 h-16 border-4 border-lava-500 border-t-transparent rounded-full animate-spin mb-8 shadow-[0_0_15px_rgba(220,38,38,0.5)]"></div>
                 <h2 class="text-2xl font-bold text-white tracking-widest animate-pulse drop-shadow-lg">SEARCHING FOR OPPONENT...</h2>
                 <p class="text-gray-300 mt-2 tracking-widest text-sm drop-shadow-md">Waiting for another player to join</p>
            </div>

            <!-- STATE 3: The Game Board -->
            <div id="state-game" class="hidden w-full h-full flex flex-col items-center justify-center bg-transparent z-10 p-6">
                 
                 <!-- Scoreboard / Status Bar -->
                 <div class="flex justify-between items-center w-full max-w-lg mb-8 text-white font-bold text-xl tracking-wider bg-black/60 backdrop-blur-md p-4 rounded-xl border border-white/10 shadow-lg">
                     <div id="player-you" class="text-blue-500 flex flex-col items-center"><span class="text-xs text-gray-500 mb-1 truncate w-24 text-center" id="label-you">YOU</span>X</div>
                     <div id="game-status" class="text-white px-6 py-2 rounded-full border border-white/10 bg-white/5 text-center min-w-[180px]">WAITING...</div>
                     <div id="player-opponent" class="text-red-500 flex flex-col items-center"><span class="text-xs text-gray-500 mb-1 truncate w-24 text-center" id="label-opponent">OPPONENT</span>O</div>
                 </div>
                 
                 <!-- 3x3 Grid -->
                 <div class="grid grid-cols-3 gap-3 bg-white/5 p-3 rounded-xl border border-white/10 shadow-2xl" id="tictactoe-board">
                     <!-- 9 cells generated by Javascript -->
                 </div>
            </div>
            
            <!-- STATE 4: Game Over -->
            <div id="state-gameover" class="hidden absolute inset-0 flex flex-col items-center justify-center bg-black/80 backdrop-blur-lg z-30 p-4">
                 <h2 id="gameover-text" class="text-6xl font-black text-white mb-10 uppercase tracking-widest drop-shadow-2xl">YOU WIN!</h2>
                 
                 <!-- STANDARD ACTIONS -->
                 <div id="gameover-actions" class="flex flex-col sm:flex-row gap-4 mb-8">
                     <button id="rematch-btn" class="px-8 py-3 bg-lava-600 hover:bg-lava-700 text-white font-black text-lg rounded tracking-widest transition-all shadow-[0_0_15px_rgba(220,38,38,0.4)] uppercase hover:scale-105">
                         Request Rematch
                     </button>
                     <button id="gameover-exit-btn" class="px-8 py-3 bg-black hover:bg-gray-900 border border-white/20 text-white font-black text-lg rounded tracking-widest transition-all hover:border-white/50 uppercase hover:scale-105">
                         Exit Match
                     </button>
                 </div>

                 <!-- WAITING FOR REMATCH -->
                 <div id="rematch-waiting" class="hidden flex-col items-center">
                     <div class="w-8 h-8 border-4 border-lava-500 border-t-transparent rounded-full animate-spin mb-4 shadow-[0_0_10px_rgba(220,38,38,0.5)]"></div>
                     <p class="text-gray-300 tracking-widest animate-pulse font-bold text-center">Waiting for opponent to accept...</p>
                 </div>

                 <!-- PROMPT FOR REMATCH -->
                 <div id="rematch-prompt" class="hidden flex-col items-center bg-black/60 p-6 rounded-xl border border-lava-500/50 shadow-[0_0_30px_rgba(220,38,38,0.2)]">
                     <p class="text-white text-xl font-bold mb-6 tracking-widest text-center">Opponent requested a rematch!</p>
                     <div class="flex gap-4">
                         <button id="accept-rematch-btn" class="px-6 py-2 bg-green-600 hover:bg-green-500 text-white font-bold rounded tracking-wider flex items-center gap-2 transition-colors">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg> Accept
                         </button>
                         <button id="decline-rematch-btn" class="px-6 py-2 bg-red-600 hover:bg-red-500 text-white font-bold rounded tracking-wider flex items-center gap-2 transition-colors">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg> Decline
                         </button>
                     </div>
                 </div>
            </div>
        </div>
    </div>

    <!-- Instructions / Rules below the game -->
    <div class="max-w-4xl mx-auto mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-[#0a0a0a] rounded-xl p-6 border border-white/10 shadow-lg">
            <h2 class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500 mb-4 uppercase tracking-wider">How to Play</h2>
            <ul class="space-y-3 text-gray-400 text-sm leading-relaxed">
                <li class="flex items-start"><span class="text-lava-500 mr-2">1.</span> Click "Play Now" to enter the matchmaking queue.</li>
                <li class="flex items-start"><span class="text-lava-500 mr-2">2.</span> The server will automatically pair you with another online player.</li>
                <li class="flex items-start"><span class="text-lava-500 mr-2">3.</span> Players take turns marking a square in the 3x3 grid with their assigned symbol (X or O).</li>
                <li class="flex items-start"><span class="text-lava-500 mr-2">4.</span> The first player to get 3 of their marks in a row (up, down, across, or diagonally) wins!</li>
            </ul>
        </div>
        
        <div class="flex flex-col gap-6">
            <div class="bg-white/5 rounded-lg p-6 border border-white/5">
                <h3 class="text-lg font-bold text-white mb-2 uppercase tracking-wider">How to connect:</h3>
                <p class="text-gray-400 text-sm mb-4">Ensure the Node.js game server is running in the background. If matchmaking is stuck on 'Searching', the game server might be offline.</p>
                <code class="block bg-black p-3 rounded text-red-500 text-sm font-mono whitespace-nowrap overflow-x-auto border border-white/10 shadow-inner">
                    cd game-server && node index.js
                </code>
            </div>
            
            <div class="bg-white/5 rounded-lg p-6 border border-white/5 hidden" id="dev-stats">
                 <h3 class="text-lg font-bold text-green-500 mb-2 uppercase tracking-wider flex items-center justify-between">Server Connected <span class="relative flex h-3 w-3"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span><span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span></span></h3>
                 <p class="text-gray-400 text-xs tracking-wider">Connected to Matchmaking via WebSockets</p>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<!-- Load Socket.io Client -->
<script src="http://localhost:3000/socket.io/socket.io.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // --- State Variables ---
    let socket;
    let isConnected = false;
    let myMark = '';
    let isMyTurn = false;
    let myName = '';
    let opponentName = '';

    // --- WebRTC State ---
    let localStream = null;
    let peerConnection = null;
    const rtcConfig = { iceServers: [{ urls: 'stun:stun.l.google.com:19302' }] };
    let isMicMuted = true;
    let isVideoMuted = false;

    // --- UI Elements ---
    const uiStart = document.getElementById('state-start');
    const uiSearching = document.getElementById('state-searching');
    const uiGame = document.getElementById('state-game');
    const uiGameOver = document.getElementById('state-gameover');
    
    // Buttons & Inputs
    const exitBtnContainer = document.getElementById('exit-btn-container');
    const exitBtn = document.getElementById('exit-btn');
    const nameInput = document.getElementById('player-name-input');
    const playBtn = document.getElementById('play-btn');
    
    // Rematch Elements
    const gameoverActions = document.getElementById('gameover-actions');
    const rematchWaitContainer = document.getElementById('rematch-waiting');
    const rematchPromptContainer = document.getElementById('rematch-prompt');
    const rematchBtn = document.getElementById('rematch-btn');
    const gameoverExitBtn = document.getElementById('gameover-exit-btn');
    const acceptRematchBtn = document.getElementById('accept-rematch-btn');
    const declineRematchBtn = document.getElementById('decline-rematch-btn');
    const fullscreenBtn = document.getElementById('fullscreen-btn');
    const wrapper = document.getElementById('game-wrapper');
    const serverStatus = document.getElementById('server-status');
    const toastContainer = document.getElementById('toast-container');
    
    // WebRTC Elements
    const micBtn = document.getElementById('mic-btn');
    const micIconOn = document.getElementById('mic-icon-on');
    const micIconOff = document.getElementById('mic-icon-off');
    const videoBtn = document.getElementById('video-btn');
    const videoIconOn = document.getElementById('video-icon-on');
    const videoIconOff = document.getElementById('video-icon-off');
    const localVideo = document.getElementById('local-video');
    const remoteVideo = document.getElementById('remote-video');
    const localVideoContainer = document.getElementById('local-video-container');
    const remoteVideoContainer = document.getElementById('remote-video-container');
    const remoteVideoName = document.getElementById('remote-video-name');
    const localMicMuted = document.getElementById('local-mic-muted');
    
    // Game Elements
    const board = document.getElementById('tictactoe-board');
    const gameStatus = document.getElementById('game-status');
    const playerYou = document.getElementById('player-you');
    const playerOpponent = document.getElementById('player-opponent');
    const labelYou = document.getElementById('label-you');
    const labelOpponent = document.getElementById('label-opponent');
    const gameOverText = document.getElementById('gameover-text');

    // --- Custom Toast Function ---
    function showToast(message, type = 'error') {
        const toast = document.createElement('div');
        toast.className = `px-4 py-3 min-w-[200px] text-center rounded-lg shadow-xl border border-white/20 text-white font-bold tracking-wider transform transition-all duration-300 translate-x-[200%] opacity-0 ${type === 'error' ? 'bg-red-600/90 border-red-500' : 'bg-green-600/90 border-green-500'}`;
        toast.textContent = message;
        toastContainer.appendChild(toast);
        
        // Animate in
        requestAnimationFrame(() => {
            toast.classList.remove('translate-x-[200%]', 'opacity-0');
        });
        
        // Auto remove
        setTimeout(() => {
            toast.classList.add('translate-x-[200%]', 'opacity-0');
            setTimeout(() => toast.remove(), 300);
        }, 4000);
    }

    // --- Generate Board Cells ---
    const cells = [];
    let localBoard = ['', '', '', '', '', '', '', '', ''];
    for(let i=0; i<9; i++) {
        const cell = document.createElement('div');
        cell.className = 'w-20 h-20 sm:w-28 sm:h-28 bg-[#111] hover:bg-[#222] xl:w-32 xl:h-32 border border-white/5 cursor-pointer rounded-lg flex items-center justify-center text-5xl sm:text-7xl font-black transition-all hover:scale-[1.02] active:scale-95 shadow-inner';
        cell.dataset.index = i;
        cell.addEventListener('click', () => handleCellClick(i));
        board.appendChild(cell);
        cells.push(cell);
    }

    // --- Fullscreen API ---
    fullscreenBtn.addEventListener('click', () => {
        if (!document.fullscreenElement) {
            wrapper.requestFullscreen().catch(err => {
                showToast("Fullscreen is not supported or was blocked.", "error");
            });
        } else {
            document.exitFullscreen();
        }
    });

    document.addEventListener('fullscreenchange', () => {
        if (document.fullscreenElement) {
            wrapper.classList.add('rounded-none', 'border-none');
            fullscreenBtn.classList.add('opacity-100');
            micBtn.classList.add('opacity-100');
            videoBtn.classList.add('opacity-100');
        } else {
            wrapper.classList.remove('rounded-none', 'border-none');
            fullscreenBtn.classList.remove('opacity-100');
            micBtn.classList.remove('opacity-100');
            videoBtn.classList.remove('opacity-100');
        }
    });

    // --- Mic Toggle Logic ---
    micBtn.addEventListener('click', () => {
        if(!localStream) return;
        
        const audioTracks = localStream.getAudioTracks();
        if(audioTracks.length > 0) {
            isMicMuted = !isMicMuted;
            audioTracks[0].enabled = !isMicMuted;
            
            if(isMicMuted) {
                micIconOn.classList.add('hidden');
                micIconOff.classList.remove('hidden');
                localMicMuted.classList.remove('hidden');
                showToast("Microphone muted", "error");
            } else {
                micIconOff.classList.add('hidden');
                micIconOn.classList.remove('hidden');
                localMicMuted.classList.add('hidden');
                showToast("Microphone active", "success");
            }
        }
    });

    // --- Video Toggle Logic ---
    videoBtn.addEventListener('click', () => {
        if(!localStream) return;
        
        const videoTracks = localStream.getVideoTracks();
        if(videoTracks.length > 0) {
            isVideoMuted = !isVideoMuted;
            videoTracks[0].enabled = !isVideoMuted;
            
            if(isVideoMuted) {
                videoIconOn.classList.add('hidden');
                videoIconOff.classList.remove('hidden');
                showToast("Camera turned off", "error");
            } else {
                videoIconOff.classList.add('hidden');
                videoIconOn.classList.remove('hidden');
                showToast("Camera turned on", "success");
            }
        }
    });

    // --- WebRTC Functions ---
    async function startCamera() {
        try {
            localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
            
            // Default to muted mic
            const audioTracks = localStream.getAudioTracks();
            if(audioTracks.length > 0) {
                audioTracks[0].enabled = false;
                isMicMuted = true;
                localMicMuted.classList.remove('hidden');
            }
            
            localVideo.srcObject = localStream;
            localVideoContainer.classList.remove('hidden');
            micBtn.classList.remove('hidden');
            videoBtn.classList.remove('hidden');
        } catch(e) {
            console.error("Camera error:", e);
            showToast("Camera/Mic access denied. Real-time video unavailable.", "error");
        }
    }
    
    function createPeerConnection() {
        if(peerConnection) peerConnection.close();
        
        peerConnection = new RTCPeerConnection(rtcConfig);
        
        if (localStream) {
            localStream.getTracks().forEach(track => peerConnection.addTrack(track, localStream));
        }

        peerConnection.ontrack = (event) => {
            remoteVideo.srcObject = event.streams[0];
            remoteVideoContainer.classList.remove('hidden');
        };

        peerConnection.onicecandidate = (event) => {
            if (event.candidate) {
                socket.emit('webrtc_ice_candidate', event.candidate);
            }
        };
    }
    
    function stopWebRTC() {
        if(peerConnection) {
            peerConnection.close();
            peerConnection = null;
        }
        remoteVideoContainer.classList.add('hidden');
        remoteVideo.srcObject = null;
    }
    
    function stopCamera() {
        if(localStream) {
            localStream.getTracks().forEach(t => t.stop());
            localStream = null;
        }
        localVideoContainer.classList.add('hidden');
        micBtn.classList.add('hidden');
        videoBtn.classList.add('hidden');
        
        // Reset state
        isMicMuted = true;
        isVideoMuted = false;
        
        micIconOn.classList.add('hidden');
        micIconOff.classList.remove('hidden');
        localMicMuted.classList.remove('hidden');
        
        videoIconOff.classList.add('hidden');
        videoIconOn.classList.remove('hidden');
        
        localVideo.srcObject = null;
    }

    // --- Socket.IO Connection Setup ---
    try {
        socket = io('http://localhost:3000');
        
        socket.on('connect', () => { 
            isConnected = true; 
            serverStatus.classList.add('hidden');
        });

        socket.on('connect_error', () => {
            isConnected = false;
            serverStatus.classList.remove('hidden');
        });
    } catch(e) {
        console.error("Socket Load Error", e);
        serverStatus.classList.remove('hidden');
    }

    // --- Event Listeners ---
    playBtn.addEventListener('click', startMatchmaking);

    exitBtn.addEventListener('click', () => {
        socket.emit('leaveMatch');
    });
    
    gameoverExitBtn.addEventListener('click', () => {
        socket.emit('leaveMatch');
    });

    rematchBtn.addEventListener('click', () => {
        gameoverActions.classList.add('hidden');
        rematchWaitContainer.classList.remove('hidden');
        rematchWaitContainer.classList.add('flex');
        socket.emit('requestRematch');
    });

    acceptRematchBtn.addEventListener('click', () => {
        socket.emit('acceptRematch');
    });

    declineRematchBtn.addEventListener('click', () => {
        socket.emit('declineRematch');
    });

    async function startMatchmaking() {
        if(!isConnected) {
            showToast("Cannot connect to game server. Make sure it is running.", "error");
            return;
        }
        
        // Start camera immediately so they can see themselves while waiting
        await startCamera();
        
        exitBtnContainer.classList.remove('hidden');
        myName = nameInput.value.trim().toUpperCase() || 'PLAYER';
        
        uiStart.classList.add('hidden');
        uiGameOver.classList.add('hidden');
        uiGame.classList.add('hidden');
        uiSearching.classList.remove('hidden');
        
        localBoard = ['', '', '', '', '', '', '', '', ''];
        for(let i=0; i<9; i++) {
            cells[i].textContent = '';
            cells[i].classList.remove('text-blue-500', 'text-red-500', 'bg-white/10', 'scale-95');
        }
        
        socket.emit('findMatch', { name: myName });
    }

    // --- Socket Event Responses ---
    
    socket.on('matchFound', async (data) => {
        uiSearching.classList.add('hidden');
        uiGame.classList.remove('hidden');
        
        myMark = data.mark;
        isMyTurn = (data.turn === myMark);
        opponentName = data.opponentName || 'OPPONENT';
        
        remoteVideoName.textContent = opponentName;
        
        playerYou.innerHTML = `<span class="text-xs text-gray-500 mb-1 truncate w-24 text-center">${myName}</span>${myMark}`;
        playerOpponent.innerHTML = `<span class="text-xs text-gray-500 mb-1 truncate w-24 text-center">${opponentName}</span>${myMark === 'X' ? 'O' : 'X'}`;
        playerYou.className = myMark === 'X' ? 'text-blue-500 flex flex-col items-center' : 'text-red-500 flex flex-col items-center';
        playerOpponent.className = myMark === 'X' ? 'text-red-500 flex flex-col items-center' : 'text-blue-500 flex flex-col items-center';
        
        updateStatus();
        showToast("Match found! Establishing secure video link...", "success");

        // WebRTC Signaling Start
        createPeerConnection();
        
        if (myMark === 'X') {
            try {
                const offer = await peerConnection.createOffer();
                await peerConnection.setLocalDescription(offer);
                socket.emit('webrtc_offer', offer);
            } catch(e) {
                console.error("Offer error", e);
            }
        }
    });

    socket.on('webrtc_offer', async (offer) => {
        if(!peerConnection) createPeerConnection();
        try {
            await peerConnection.setRemoteDescription(offer);
            const answer = await peerConnection.createAnswer();
            await peerConnection.setLocalDescription(answer);
            socket.emit('webrtc_answer', answer);
        } catch(e) {
            console.error("Answer error", e);
        }
    });

    socket.on('webrtc_answer', async (answer) => {
        if(peerConnection) {
            try {
                await peerConnection.setRemoteDescription(answer);
            } catch(e) {
                console.error("Set Answer error", e);
            }
        }
    });

    socket.on('webrtc_ice_candidate', async (candidate) => {
        if(peerConnection) {
            try {
                await peerConnection.addIceCandidate(candidate);
            } catch(e) {
                console.error("ICE error", e);
            }
        }
    });

    socket.on('boardUpdate', (boardData) => {
        localBoard = boardData;
        for(let i=0; i<9; i++) {
            cells[i].textContent = boardData[i];
            cells[i].classList.remove('text-blue-500', 'text-red-500', 'bg-white/10', 'scale-95');
            if(boardData[i] === 'X') cells[i].classList.add('text-blue-500');
            if(boardData[i] === 'O') cells[i].classList.add('text-red-500');
        }
    });

    socket.on('turnChange', (turnMarker) => {
        isMyTurn = (turnMarker === myMark);
        updateStatus();
    });

    socket.on('gameOver', (data) => {
        uiGame.classList.add('hidden');
        uiGameOver.classList.remove('hidden');
        
        gameoverActions.classList.remove('hidden');
        rematchWaitContainer.classList.add('hidden');
        rematchWaitContainer.classList.remove('flex');
        rematchPromptContainer.classList.add('hidden');
        rematchPromptContainer.classList.remove('flex');
        
        if (data.winner === 'Draw') {
            gameOverText.textContent = "IT'S A DRAW!";
            gameOverText.className = "text-5xl md:text-6xl font-black text-gray-400 mb-10 uppercase tracking-widest drop-shadow-2xl text-center";
        } else if (data.winner === myMark) {
            gameOverText.textContent = "VICTORY!";
            gameOverText.className = "text-5xl md:text-6xl font-black text-green-500 mb-10 uppercase tracking-widest drop-shadow-[0_0_20px_rgba(34,197,94,0.5)] text-center";
        } else {
            gameOverText.textContent = "DEFEAT!";
            gameOverText.className = "text-5xl md:text-6xl font-black text-red-600 mb-10 uppercase tracking-widest drop-shadow-[0_0_20px_rgba(220,38,38,0.5)] text-center";
        }
        
        if(data.method === 'disconnect') {
            gameOverText.textContent = "OPPONENT LEFT!";
            gameOverText.className = "text-4xl md:text-5xl font-black text-yellow-500 mb-10 uppercase tracking-widest text-center";
            gameoverActions.classList.add('hidden');
            showToast("Your opponent disconnected.", "error");
        }
        
        exitBtnContainer.classList.add('hidden');
    });

    socket.on('roomDestroyed', () => {
        uiSearching.classList.add('hidden');
        uiGame.classList.add('hidden');
        uiGameOver.classList.add('hidden');
        uiStart.classList.remove('hidden');
        exitBtnContainer.classList.add('hidden');
        
        stopWebRTC();
        stopCamera();
        localBoard = ['', '', '', '', '', '', '', '', ''];
    });

    socket.on('rematchRequested', () => {
        gameoverActions.classList.add('hidden');
        rematchPromptContainer.classList.remove('hidden');
        rematchPromptContainer.classList.add('flex');
    });

    socket.on('rematchDeclined', () => {
        rematchWaitContainer.classList.add('hidden');
        rematchWaitContainer.classList.remove('flex');
        gameOverText.textContent = "DECLINED!";
        gameOverText.className = "text-4xl md:text-5xl font-black text-gray-500 mb-10 uppercase tracking-widest text-center";
        showToast("Opponent declined the rematch.", "error");
    });

    socket.on('rematchStarted', (data) => {
        uiGameOver.classList.add('hidden');
        uiGame.classList.remove('hidden');
        exitBtnContainer.classList.remove('hidden');
        
        localBoard = data.board;
        isMyTurn = (data.turn === myMark);
        
        for(let i=0; i<9; i++) {
            cells[i].textContent = '';
            cells[i].classList.remove('text-blue-500', 'text-red-500', 'bg-white/10', 'scale-95');
        }
        
        updateStatus();
        showToast("Rematch started!", "success");
    });

    function handleCellClick(index) {
        if(!isMyTurn || localBoard[index] !== '') {
            return;
        }
        cells[index].classList.add('bg-white/10', 'scale-95'); 
        socket.emit('makeMove', index);
    }

    function updateStatus() {
        if(isMyTurn) {
            gameStatus.innerHTML = "<span class='inline-block w-2 h-2 rounded-full bg-green-500 mr-2 animate-pulse'></span> YOUR TURN";
            gameStatus.className = "text-green-400 px-6 py-2 rounded-full border border-green-500/30 bg-green-500/10 shadow-[0_0_15px_rgba(34,197,94,0.2)]";
        } else {
            gameStatus.innerHTML = "OPPONENT'S TURN";
            gameStatus.className = "text-gray-400 px-6 py-2 rounded-full border border-white/10 bg-white/5 opacity-70";
        }
    }
});
</script>
@endpush
