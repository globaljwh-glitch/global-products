<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsletterController extends Controller
{
    /**
     * Subscribe user
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
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
        

        $subscriber = NewsletterSubscriber::where('email', $request->email)
            ->first();

        // Already subscribed
        if ($subscriber && $subscriber->status === 'active') {
            return response()->json([
                'success' => false,
                'message' => 'Email already subscribed.',
            ]);
        }

        // Resubscribe
        if ($subscriber && $subscriber->status === 'unsubscribed') {

            $subscriber->update([
                'status' => 'active',
                'subscribed_at' => now(),
                'unsubscribed_at' => null,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Subscription activated again.',
            ]);
        }

        // New subscriber
        NewsletterSubscriber::create([
            'email' => $request->email,
            'token' => Str::uuid(),
            'status' => 'active',
            'subscribed_at' => now(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Subscribed successfully.',
        ]);
    }

    /**
     * Unsubscribe user
     */
    public function unsubscribe($token)
    {
        $subscriber = NewsletterSubscriber::where('token', $token)
            ->firstOrFail();

        $subscriber->update([
            'status' => 'unsubscribed',
            'unsubscribed_at' => now(),
        ]);

        return view('frontend.newsletter.unsubscribe-success');
    }
}