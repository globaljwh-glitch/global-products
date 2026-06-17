<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();

        return view('frontend.categories.index', compact('categories'));
    }

    // public function show($slug)
    // {
    //     $category = Category::with('children')
    //         ->where('slug', $slug)
    //         ->where('status', 1)
    //         ->firstOrFail();

    //     $subCategories = $category->children()
    //         ->where('status', 1)
    //         ->get();

    //     return view(
    //         'frontend.categories.show',
    //         compact(
    //             'category',
    //             'subCategories'
    //         )
    //     );
    // }

    public function show($slug)
    {
        $category = Category::with('children')
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $children = $category->children()
            ->where('status', 1)
            ->get();

        // No more children? Show products
        if ($children->count() == 0) {

            return redirect(
                route('products.category', $category->slug)
            );
        }

        // return view(
        //     'frontend.categories.show',
        //     compact('category', 'children')
        // );

        $subCategories = $category->children;

        return view(
            'frontend.categories.show',
            compact('category', 'subCategories')
        );
    }

    // public function show($slug)
    // {
    //     $category = Category::with('children')
    //         ->where('slug', $slug)
    //         ->firstOrFail();

    //     if ($category->children->count() == 0) {

    //         return redirect(
    //             '/products/category/'.$category->slug
    //         );
    //     }

    //     return view(
    //         'frontend.categories.show',
    //         [
    //             'category' => $category,
    //             'subCategories' => $category->children
    //         ]
    //     );
    // }
}
