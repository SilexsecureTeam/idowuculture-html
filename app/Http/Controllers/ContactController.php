<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000'
        ]);

        $contact = Contact::create([
            'full_name' => $request->fullName,
            'email_address' => $request->email,
            'phone_number' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);



        if ($contact) {
            return back()->with('success', 'Your message has been sent successfully!');
        }

        return back()->with('error', 'Something went wrong');
    }
}
