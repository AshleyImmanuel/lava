<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Game;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $teams = Team::with(['game', 'members.user'])
            ->withCount('members')
            ->when($request->game_id, fn($q, $gameId) => $q->where('game_id', $gameId))
            ->when($request->search, fn($q, $search) => $q->where('name', 'like', "%{$search}%"))
            ->latest()
            ->paginate(12);
        
        
        $games = Game::whereIn('name', ['VALORANT', 'Counter-Strike 2', 'Free Fire'])->get();
        
        return view('pages.teams.index', compact('teams', 'games'));
    }

    public function show(Team $team)
    {
        $team->load(['game', 'members.user', 'wonMatches.event']);
        
        $upcomingEvents = $team->game->events()
            ->where('start_time', '>', now())
            ->where('status', '!=', 'completed')
            ->orderBy('start_time')
            ->take(3)
            ->get();

        $pastMatches = $team->wonMatches()
            ->with('event')
            ->latest()
            ->take(5)
            ->get();

        return view('pages.teams.show', compact('team', 'upcomingEvents', 'pastMatches'));
    }

    public function apply(Request $request, Team $team)
    {
        $request->validate([
            'message' => 'nullable|string|max:500',
            'ingame_id' => 'required|string|max:255',
            'ingame_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'personal_email' => 'required|email|max:255',
            'ingame_level' => 'required|string|max:50',
            'experience' => 'required|string|max:1000',
        ]);

        $user = auth()->user();

        // Check if user is already in a team
        if ($user->teams()->exists()) {
            return back()->with('error', 'You are already in a team. You must leave your current team to join another.');
        }

        // Check if already applied
        if ($team->applications()->where('user_id', $user->id)->where('status', 'pending')->exists()) {
             return back()->with('error', 'You have already applied to this team.');
        }

        $team->applications()->create([
            'user_id' => $user->id,
            'status' => 'pending',
            'message' => $request->message,
            'ingame_id' => $request->ingame_id,
            'ingame_name' => $request->ingame_name,
            'phone_number' => $request->phone_number,
            'personal_email' => $request->personal_email,
            'ingame_level' => $request->ingame_level,
            'experience' => $request->experience,
        ]);

        return back()->with('success', 'Application sent successfully!');
    }
}
