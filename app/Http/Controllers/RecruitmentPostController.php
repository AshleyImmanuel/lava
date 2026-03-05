<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentPost;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruitmentPostController extends Controller
{
    /**
     * List all open recruitment posts (for Events page AJAX tab).
     */
    public function index(Request $request)
    {
        $posts = RecruitmentPost::with(['game', 'team', 'recruiter'])
            ->where('status', 'open')
            ->where('deadline', '>', now())
            ->when($request->search, function ($q, $search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('role_needed', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(12);

        if ($request->ajax()) {
            return view('pages.events._recruitment_grid', compact('posts'))->render();
        }

        return view('pages.events._recruitment_grid', compact('posts'));
    }

    /**
     * Show the create form for recruiters.
     */
    public function create()
    {
        $user = Auth::user();

        if (!$user->isRecruiter()) {
            abort(403, 'Only recruiters can create recruitment posts.');
        }

        $games = Game::all();
        $teams = Team::all();

        return view('pages.recruitment.create', compact('games', 'teams'));
    }

    /**
     * Store a new recruitment post.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user->isRecruiter()) {
            abort(403, 'Only recruiters can create recruitment posts.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'game_id' => 'required|exists:games,id',
            'team_id' => 'nullable|exists:teams,id',
            'role_needed' => 'required|string|max:255',
            'requirements' => 'nullable|string',
            'deadline' => 'required|date|after:now',
        ]);

        $validated['recruiter_id'] = $user->id;

        RecruitmentPost::create($validated);

        return redirect()->route('dashboard', ['tab' => 'recruitment'])->with('success', 'Recruitment post created successfully!');
    }

    /**
     * Show a single recruitment post.
     */
    public function show(RecruitmentPost $post)
    {
        $post->load(['game', 'team', 'recruiter']);

        return view('pages.recruitment.show', compact('post'));
    }
}
