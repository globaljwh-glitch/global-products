<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')
            ->where('status', 1)
            ->orderBy('display_order', 'asc')
            ->take(12)
            ->get();

        $bestSellers = Product::with('mainImage')
            ->where('status', 1)
            ->where('is_featured', 1)
            ->orderBy('display_order')
            ->take(10)
            ->get();


        $latestProducts = Product::with('mainImage')
            ->where('status', 1)
            ->latest()
            ->take(4)
            ->get();

        return view(
            'frontend.home',
            compact('categories', 'bestSellers', 'latestProducts')
        );
    }


}
