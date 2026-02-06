<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamApplication;
use Illuminate\Http\Request;

class TeamApplicationController extends Controller
{
    public function accept(TeamApplication $application)
    {
        $team = $application->team;

        // Authorization: Check if user is IGL of the team or Admin
        if (!$this->canManageTeam($team)) {
            abort(403, 'Unauthorized action.');
        }

        // Add user to team members
        $team->members()->create([
            'user_id' => $application->user_id,
            'role' => 'main', // Default role
        ]);

        // Update application status
        $application->update(['status' => 'accepted']);

        return back()->with('success', 'Player accepted into the team!');
    }

    public function reject(TeamApplication $application)
    {
        $team = $application->team;

        // Authorization
        if (!$this->canManageTeam($team)) {
            abort(403, 'Unauthorized action.');
        }

        $application->update(['status' => 'rejected']);

        return back()->with('success', 'Application rejected.');
    }

    private function canManageTeam(Team $team)
    {
        $user = auth()->user();
        
        if ($user->isAdmin()) {
            return true;
        }

        // Check if user is a member with role 'igl'
        return $team->members()
            ->where('user_id', $user->id)
            ->where('role', 'igl')
            ->exists();
    }
}
