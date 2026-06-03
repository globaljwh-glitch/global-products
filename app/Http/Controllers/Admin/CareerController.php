<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::latest()->paginate(20);

        return view('admin.careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'location'         => 'nullable|string|max:255',
            'job_type'         => 'nullable|string|max:255',
            'posted_date'      => 'nullable|date',
            'overview'         => 'nullable',
            'responsibilities' => 'nullable',
            'skills'           => 'nullable',
            'qualifications'   => 'nullable',
            'offer'            => 'nullable',
            'is_active'        => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Career::create($validated);

        return redirect()
            ->route('admin.careers.index')
            ->with('success', 'Career created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        return view('admin.careers.show', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        $validated = $request->validate([
            'title'            => 'required|string|max:255',
            'location'         => 'nullable|string|max:255',
            'job_type'         => 'nullable|string|max:255',
            'posted_date'      => 'nullable|date',
            'overview'         => 'nullable',
            'responsibilities' => 'nullable',
            'skills'           => 'nullable',
            'qualifications'   => 'nullable',
            'offer'            => 'nullable',
            'is_active'        => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $career->update($validated);

        return redirect()
            ->route('admin.careers.index')
            ->with('success', 'Career updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        $career->delete();

        return redirect()
            ->route('admin.careers.index')
            ->with('success', 'Career deleted successfully.');
    }
}