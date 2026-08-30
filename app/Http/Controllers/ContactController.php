<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Send email to the admin address
        // Send admin notification
        Mail::to('immanuelashley77@gmail.com')->send(new ContactMail($validated));

        // Send auto-reply to user
        Mail::to($validated['email'])->send(new \App\Mail\ContactConfirmationMail($validated));

        return back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
