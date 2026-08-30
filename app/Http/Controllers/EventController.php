<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Game;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::with(['game'])
            ->withCount('registrations')
            ->when($request->status, fn($q, $status) => $q->where('status', $status))
            ->when($request->type, fn($q, $type) => $q->where('type', $type))
            ->latest('start_time')
            ->paginate(12);
        
        if ($request->ajax()) {
            return view('pages.events._events_grid', compact('events'))->render();
        }
        
        return view('pages.events.index', compact('events'));
    }

    public function show(Event $event)
    {
        $event->load(['game', 'registrations.user', 'matchResult.winner']);
        $event->loadCount('registrations');
        return view('pages.events.show', compact('event'));
    }

    public function register(Request $request, Event $event)
    {
        $user = auth()->user();
        
        if ($event->registrations()->where('user_id', $user->id)->exists()) {
            return back()->with('error', 'You are already registered for this event.');
        }

        $validated = $request->validate([
            'ingame_id' => 'required|string|max:255',
            'ingame_name' => 'required|string|max:255',
            'ingame_level' => 'required|string|max:255',
        ]);

        $event->registrations()->create([
            'user_id' => $user->id,
            'status' => 'pending',
            'ingame_id' => $validated['ingame_id'],
            'ingame_name' => $validated['ingame_name'],
            'ingame_level' => $validated['ingame_level'],
        ]);

        return back()->with('success', 'Successfully registered for the event!');
    }
    public function unregister(Event $event)
    {
        $user = auth()->user();
        
        $registration = $event->registrations()->where('user_id', $user->id)->first();
        
        if ($registration) {
            $registration->delete();
            return back()->with('success', 'Successfully unregistered from the event.');
        }

        return back()->with('error', 'You are not registered for this event.');
    }
}
