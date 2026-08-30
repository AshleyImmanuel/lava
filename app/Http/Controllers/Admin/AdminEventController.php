<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Game;
use Illuminate\Http\RedirectResponse;
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
        // Backward-compatibility with older form field names
        if ($request->filled('max_teams') && ! $request->filled('max_players')) {
            $request->merge(['max_players' => $request->input('max_teams')]);
        }
        if ($request->filled('banner_url') && ! $request->filled('image_path')) {
            $request->merge(['image_path' => $request->input('banner_url')]);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'game_id' => 'required|exists:games,id',
            'start_time' => 'required|date',
            'max_players' => 'nullable|integer|min:2',
            'entry_fee' => 'nullable|integer|min:0',
            'prize_pool' => 'nullable|integer|min:0',
            'type' => 'required|in:tryout,scrim,friendly,tournament',
            'status' => 'required|in:upcoming,ongoing,completed,cancelled',
            'image_path' => 'nullable|url',
        ]);

        $validated['entry_fee'] = $validated['entry_fee'] ?? 0;
        $validated['prize_pool'] = $validated['prize_pool'] ?? 0;

        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(int $event)
    {
        $event = Event::find($event);
        if (! $event) {
            return redirect()
                ->route('admin.events.index')
                ->with('error', 'Event not found. It may have been deleted.');
        }

        $games = Game::all();
        return view('admin.events.edit', compact('event', 'games'));
    }

    public function update(Request $request, int $event)
    {
        $event = Event::find($event);
        if (! $event) {
            return redirect()
                ->route('admin.events.index')
                ->with('error', 'Event not found. It may have been deleted.');
        }

        // Backward-compatibility with older form field names
        if ($request->filled('max_teams') && ! $request->filled('max_players')) {
            $request->merge(['max_players' => $request->input('max_teams')]);
        }
        if ($request->filled('banner_url') && ! $request->filled('image_path')) {
            $request->merge(['image_path' => $request->input('banner_url')]);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'game_id' => 'required|exists:games,id',
            'start_time' => 'required|date',
            'max_players' => 'nullable|integer|min:2',
            'entry_fee' => 'nullable|integer|min:0',
            'prize_pool' => 'nullable|integer|min:0',
            'type' => 'required|in:tryout,scrim,friendly,tournament',
            'status' => 'required|in:upcoming,ongoing,completed,cancelled',
            'image_path' => 'nullable|url',
        ]);

        $validated['entry_fee'] = $validated['entry_fee'] ?? 0;
        $validated['prize_pool'] = $validated['prize_pool'] ?? 0;

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(int $event): RedirectResponse
    {
        $event = Event::find($event);
        if (! $event) {
            return redirect()
                ->route('admin.events.index')
                ->with('error', 'Event not found. It may have been deleted.');
        }

        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }
}
