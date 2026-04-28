<?php 

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['images']) // adjust relation
            ->where('status', 1)
            ->latest()
            ->paginate(12);

        return view('frontend.products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::with([
                'images',
                'categories',
                //'industry'
            ])
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('frontend.products.show', compact('product'));
    }
}