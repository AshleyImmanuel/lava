<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Game;
use Illuminate\Http\Request;

class AdminTeamController extends Controller
{
    public function index()
    {
        $teams = Team::with('game')->latest()->paginate(10);
        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        $games = Game::all();
        return view('admin.teams.create', compact('games'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'game_id' => 'required|exists:games,id',
            'logo_url' => 'nullable|url',
            'region' => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        Team::create($validated);

        return redirect()->route('admin.teams.index')->with('success', 'Team created successfully.');
    }

    public function edit(Team $team)
    {
        $games = Game::all();
        return view('admin.teams.edit', compact('team', 'games'));
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'game_id' => 'required|exists:games,id',
            'logo_url' => 'nullable|url',
            'region' => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        $team->update($validated);

        return redirect()->route('admin.teams.index')->with('success', 'Team updated successfully.');
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('admin.teams.index')->with('success', 'Team deleted successfully.');
    }
}
