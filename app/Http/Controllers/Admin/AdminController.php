<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function promote(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot change role of an admin.');
        }

        $user->update(['role' => 'recruiter']);

        return back()->with('success', "{$user->name} has been promoted to Recruiter.");
    }
    
    public function demote(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot change role of an admin.');
        }

        $user->update(['role' => 'player']);

        return back()->with('success', "{$user->name} has been demoted to Player.");
    }
}
