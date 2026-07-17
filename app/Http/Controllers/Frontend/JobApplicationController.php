<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AdminJobApplicationMail;
use App\Mail\ApplicantConfirmationMail;
use App\Models\Career;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JobApplicationController extends Controller
{
    public function store(Request $request, Career $career)
    {
        $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|max:50',
            'resume' => 'required|mimes:pdf,doc,docx|max:5120',
            'cover_letter' => 'nullable'
        ]);

        $resumePath = $request->file('resume')
            ->store('resumes', 'public');

        $application = JobApplication::create([
            'career_id' => $career->id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'resume' => $resumePath,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        /*
        |--------------------------------------------------
        | Email Admin
        |--------------------------------------------------
        */
        Mail::to(config('custom.admin_email'))
            ->queue(new AdminJobApplicationMail($application));

        /*
        |--------------------------------------------------
        | Email Applicant
        |--------------------------------------------------
        */
        Mail::to($application->email)
            ->queue(new ApplicantConfirmationMail(
                $application
            ));

        return back()->with(
            'success',
            'Application submitted successfully.'
        );
    }
}