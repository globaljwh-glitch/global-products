<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Industry;
use App\Models\Category;
use App\Models\Product;
class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::where('status', 1)->get();

        return view('frontend.brands.index', compact('brands'));
    }
    public function brandDetails($slug)
    {
        $brand = Brand::with('categories')->where('slug', $slug)->firstOrFail();
        //echo "<pre>";print_r($industry->toArray());die;
        $products = Product::with('primaryImage')->withAvg('reviews', 'rating')->withCount('reviews')->whereHas('brandProducts', function ($query) use ($brand) {
                $query->where('brands.id', $brand->id);
                })->paginate(8);
        return view('frontend.brands.brand-details', compact('brand','products'));
    }
}
