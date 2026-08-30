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
        $games = Game::withCount('teams')->get();
        $upcomingEvents = Event::with('game')->where('status', 'upcoming')->latest('start_time')->take(3)->get();
        $announcements = Announcement::whereNotNull('published_at')->latest('published_at')->take(3)->get();

        // Dynamic Stats
        $stats = [
            'teams' => \App\Models\Team::count(),
            'tournaments' => Event::count(),
            'games' => Game::count(),
            'members' => \App\Models\User::count(),
        ];
        
        return view('pages.home', compact('games', 'upcomingEvents', 'announcements', 'stats'));
    }
}
