<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Event;

    class DashboardController extends Controller
    {
        /**
         * Show the application dashboard.
         */
    public function index()
    {
        $user = Auth::user();
        $eventsCount = $user->eventRegistrations()->count();
        // Check for active team (first team for now)
        $activeTeam = $user->teams()->first();
        
        // Application History (latest first)
        $applicationHistory = $user->applications()->with('team')->latest()->get();
        // We still keep $pendingApplication for the status card if needed, or derived from history
        $pendingApplication = $applicationHistory->where('status', 'pending')->first();

        // Get upcoming events for the user (via registrations)
        $registeredEvents = $user->eventRegistrations()->with('event')->whereHas('event', function($q) {
            $q->where('start_time', '>', now());
        })->take(3)->get()->pluck('event');

        // Past Events (History)
        $eventHistory = $user->eventRegistrations()->with('event')->whereHas('event', function($q) {
            $q->where('start_time', '<=', now());
        })->latest()->take(10)->get();

        // Fallback: If no registered events, show global upcoming events
        $recommendedEvents = collect();
        if ($registeredEvents->isEmpty()) {
            $recommendedEvents = Event::with('game')
                ->where('status', 'upcoming')
                ->where('start_time', '>', now())
                ->orderBy('start_time')
                ->take(3)
                ->get();
        }

        return view('dashboard', compact('eventsCount', 'activeTeam', 'pendingApplication', 'applicationHistory', 'registeredEvents', 'eventHistory', 'recommendedEvents'));
    }
    }
