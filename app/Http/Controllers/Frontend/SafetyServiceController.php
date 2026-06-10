<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SafetyServiceRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminSafetyServiceMail;
use App\Mail\UserSafetyServiceMail;

class SafetyServiceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([

            'company_name' => 'required|max:255',
            'business_type' => 'required|max:255',
            'street_address' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'zip_code' => 'required|max:20',
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'phone' => 'required|max:50',
            'email' => 'required|email',
            'service_required' => 'required',

        ]);

        $requestRecord = SafetyServiceRequest::create($data);

        /*
        |--------------------------------------------------------------------------
        | Email Admin
        |--------------------------------------------------------------------------
        */

        Mail::to(config('mail.admin_email'))
            ->send(new AdminSafetyServiceMail($requestRecord));

        /*
        |--------------------------------------------------------------------------
        | Email User
        |--------------------------------------------------------------------------
        */

        Mail::to($requestRecord->email)
            ->send(new UserSafetyServiceMail($requestRecord));

        return back()->with(
            'success',
            'Thank you. Our safety specialist will contact you shortly.'
        );
    }
}
