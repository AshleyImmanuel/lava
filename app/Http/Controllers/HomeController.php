<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Event;
use App\Models\Announcement;

class HomeController extends Controller
{
    /**
     * Show the application homepage.
     */
    public function index()
    {
        $games = Game::has('teams')->withCount('teams')->get();
        $upcomingEvents = Event::with('game')->where('status', 'upcoming')->latest('start_time')->take(3)->get();
        $announcements = Announcement::whereNotNull('published_at')->latest('published_at')->take(3)->get();

        // Dynamic Stats
        $stats = [
            'players' => \App\Models\User::where('role', 'player')->count(),
            'tournaments' => Event::count(),
            'games' => Game::count(),
            'community' => \App\Models\User::count(),
        ];
        
        return view('pages.home', compact('games', 'upcomingEvents', 'announcements', 'stats'));
    }
}
