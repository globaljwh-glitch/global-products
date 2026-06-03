<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::where('is_active', 1)
            ->latest()
            ->get();

        return view('frontend.careers.index', compact('careers'));
    }

    public function show(Career $career)
    {
        return view('frontend.careers.show', compact('career'));
    }
}