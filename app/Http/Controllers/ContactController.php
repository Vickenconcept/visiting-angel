<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        // Honeypot check - if the hidden website field is filled, it's likely spam
        if (!empty($request->input('website'))) {
            // Silently reject the form submission
            return back()->with('success', 'Thank you for your message. We will get back to you soon!');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Get the admin email from config or use a default
        $adminEmail = config('mail.contact_recipient', config('mail.from.address'));

        // Send email using the ContactMail mailable
        Mail::to($adminEmail)->send(new ContactMail(
            $validated['name'],
            $validated['email'],
            $validated['subject'],
            $validated['message']
        ));

        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}

