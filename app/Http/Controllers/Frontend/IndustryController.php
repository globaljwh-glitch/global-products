<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Industry;
use App\Models\Category;
use App\Models\Product;
class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::where('status', 1)->get();
        return view('frontend.industries.index', compact('industries'));
    }
    public function industryDetails($slug)
    {
        $industry = Industry::with('categories','brands')->where('slug', $slug)->firstOrFail();
        //echo "<pre>";print_r($industry->toArray());die;
        $products = Product::with('primaryImage')->withAvg('reviews', 'rating')->withCount('reviews')->whereHas('industries', function ($query) use ($industry) {
                $query->where('industries.id', $industry->id);
                })->paginate(8);
        return view('frontend.industries.industry-details', compact('industry','products'));
    }
}
