<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if (!$user->isRecruiter()) {
            abort(403, 'Only recruiters can access invitations.');
        }

        $invitations = $user->invitations()->latest()->paginate(10);

        return view('pages.invitations.index', compact('invitations'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user->isRecruiter()) {
            abort(403, 'Only recruiters can generate invites.');
        }

        $invitation = $user->invitations()->create([
            'code' => Str::upper(Str::random(8)),
            'expires_at' => now()->addDays(7), // Expire in 7 days by default
        ]);

        return back()->with('success', 'Invitation code generated successfully: ' . $invitation->code);
    }
}
