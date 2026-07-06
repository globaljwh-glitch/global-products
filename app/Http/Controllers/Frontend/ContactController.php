<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;
use Illuminate\Support\Facades\Http;
use App\Mail\ContactOtpMail;

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

        // Captcha 
        $captcha = $request->input('g-recaptcha-response');

        if (!$captcha) {
            return back()
                ->withErrors(['g-recaptcha-response' => 'Please verify captcha'])
                ->withInput();
        }

        // verify with Google
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
            'response' => $captcha,
            'remoteip' => $request->ip(),
        ]);

        if (!data_get($response->json(), 'success')) {
            return back()
                ->withErrors(['g-recaptcha-response' => 'Captcha verification failed'])
                ->withInput();
        }

        $contact = Contact::create($validated);

        //Mail::to(env('ADMIN_EMAIL'))->send(new ContactAdminMail($contact));
        //logger('before first mail');
        //Mail::to(config('mail.admin_email'))->send(new ContactAdminMail($contact));
        Mail::to(config('mail.admin_email'))->queue(new ContactAdminMail($contact));
        Mail::to($contact->email)->queue(new ContactUserMail($contact));
        //logger('without mail send before redirect');
        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully.');
    }

    public function sendOtp(Request $request)
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

        $otp = random_int(100000, 999999);

        session([
            'contact_form_data' => $validated,
            'contact_otp' => $otp
        ]);

        Mail::to($validated['email'])->queue(new ContactOtpMail($otp));

        return response()->json([
            'status' => true
        ]);
    }

    public function verifyOtp(Request $request)
    {
        if(session('contact_otp') != $request->otp){
            return response()->json([
                'status' => false
            ]);
        }

        $contact = Contact::create(session('contact_form_data'));

        Mail::to(config('mail.admin_email'))->queue(new ContactAdminMail($contact));
        Mail::to($contact->email)->queue(new ContactUserMail($contact));

        session()->forget([
            'contact_form_data',
            'contact_otp'
        ]);

        return response()->json([
            'status' => true
        ]);
    }
}