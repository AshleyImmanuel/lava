<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::withCount(['teams', 'events'])->get();
        if (request()->ajax()) {
            return view('pages.games._games_grid', compact('games'))->render();
        }

        return view('pages.games.index', compact('games'));
    }

    public function show(Game $game)
    {
        $game->load(['teams' => fn($q) => $q->withCount('members'), 'events' => fn($q) => $q->latest('start_time')->withCount('registrations')->take(5)]);
        return view('pages.games.show', compact('game'));
    }
}
