<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Game;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::with('game')->latest('start_time')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $games = Game::all();
        return view('admin.events.create', compact('games'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'game_id' => 'required|exists:games,id',
            'start_time' => 'required|date',
            'location' => 'nullable|string|max:255',
            'prize_pool' => 'nullable|string|max:255',
            'max_teams' => 'nullable|integer|min:2',
            'type' => 'required|in:online,offline',
            'status' => 'required|in:upcoming,live,completed',
            'banner_url' => 'nullable|url',
        ]);

        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        $games = Game::all();
        return view('admin.events.edit', compact('event', 'games'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'game_id' => 'required|exists:games,id',
            'start_time' => 'required|date',
            'location' => 'nullable|string|max:255',
            'prize_pool' => 'nullable|string|max:255',
            'max_teams' => 'nullable|integer|min:2',
            'type' => 'required|in:online,offline',
            'status' => 'required|in:upcoming,live,completed',
            'banner_url' => 'nullable|url',
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
