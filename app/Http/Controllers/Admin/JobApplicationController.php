<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = JobApplication::with('career')
            ->latest()
            ->paginate(20);

        return view(
            'admin.job-applications.index',
            compact('applications')
        );
    }

    public function show(JobApplication $job_application)
    {
        return view(
            'admin.job-applications.show',
            ['application' => $job_application]
        );
    }

    public function update(Request $request, JobApplication $job_application)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $job_application->update([
            'status' => $request->status
        ]);

        return back()->with(
            'success',
            'Application status updated successfully.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobApplication $job_application)
    {
        if ($job_application->resume &&
            Storage::disk('public')->exists($job_application->resume)) {

            Storage::disk('public')->delete($job_application->resume);
        }

        $job_application->delete();

        return redirect()
            ->route('admin.job-applications.index')
            ->with('success', 'Application deleted successfully.');
    }
}
