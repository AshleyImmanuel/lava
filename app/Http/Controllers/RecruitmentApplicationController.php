<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentPost;
use App\Models\RecruitmentApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruitmentApplicationController extends Controller
{
    /**
     * Store a new application for a recruitment post.
     */
    public function apply(Request $request, RecruitmentPost $post)
    {
        $user = Auth::user();

        // Check if already applied
        if ($post->applications()->where('user_id', $user->id)->exists()) {
            return back()->with('error', 'You have already applied to this recruitment post.');
        }

        $validated = $request->validate([
            'message' => 'nullable|string|max:500',
            'ingame_id' => 'required|string|max:255',
            'ingame_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'personal_email' => 'required|email|max:255',
            'ingame_level' => 'required|string|max:50',
            'experience' => 'required|string|max:1000',
        ]);

        $post->applications()->create([
            'user_id' => $user->id,
            'status' => 'pending',
            ...$validated
        ]);

        return back()->with('success', 'Application sent successfully!');
    }

    /**
     * Approve an application. (Only the recruiter who created the post)
     */
    public function approve(RecruitmentApplication $application)
    {
        $this->authorizeRecruiter($application);

        $application->update(['status' => 'approved']);

        // Option to add them to the team directly if the post had a team_id could be added here later

        return back()->with('success', 'Application approved.');
    }

    /**
     * Reject an application.
     */
    public function reject(RecruitmentApplication $application)
    {
        $this->authorizeRecruiter($application);

        $application->update(['status' => 'rejected']);

        return back()->with('success', 'Application rejected.');
    }

    /**
     * Kick/remove an approved player.
     */
    public function kick(RecruitmentApplication $application)
    {
        $this->authorizeRecruiter($application);

        // Delete the application completely, or just change status. Let's delete it so they can apply again if needed, or just delete it to remove from the list.
        $application->delete();

        return back()->with('success', 'Player removed from the post.');
    }

    /**
     * Helper to ensure the current user owns the recruitment post.
     */
    private function authorizeRecruiter(RecruitmentApplication $application)
    {
        if ($application->recruitmentPost->recruiter_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action. Only the post creator can manage its applications.');
        }
    }
}
