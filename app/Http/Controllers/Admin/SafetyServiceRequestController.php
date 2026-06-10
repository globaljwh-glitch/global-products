<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SafetyServiceRequest;

class SafetyServiceRequestController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SafetyServiceRequest $safetyServiceRequest)
    {
        $safetyServiceRequest->delete();

        return redirect()
            ->route('admin.safety-service-requests.index')
            ->with('success', 'Request deleted successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = SafetyServiceRequest::latest()->paginate(20);

        return view(
            'admin.safety-service-requests.index',
            compact('requests')
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(SafetyServiceRequest $safetyServiceRequest)
    {
        return view(
            'admin.safety-service-requests.show',
            ['request' => $safetyServiceRequest]
        );
    }
}
