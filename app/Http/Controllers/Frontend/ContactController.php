<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name'     => 'required|string|max:100',
            'last_name'      => 'required|string|max:100',
            'email'          => 'required|email|max:150',
            'phone'          => 'required|string|max:20',
            'company_name'   => 'nullable|string|max:150',
            'street_address' => 'nullable|string|max:255',
            'city'           => 'required|string|max:100',
            'state'          => 'required|string|max:100',
            'zip_code'       => 'required|string|max:20',
            'country'        => 'required|string|max:100',
            'message'        => 'required|string',
        ]);

        $contact = Contact::create($validated);

        Mail::to(env('ADMIN_EMAIL'))->send(new ContactAdminMail($contact));
        Mail::to($contact->email)->send(new ContactUserMail($contact));

        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully.');
    }
}