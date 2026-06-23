<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();

        return view('frontend.categories.index', compact('categories'));
    }

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

            // return redirect(
            //     route('products.category', $category->slug)
            // );
            return redirect(
                url('/products/category/' . $category->slug)
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
    public function category($slug)
    {
        $category = Category::with('parentRecursive', 'childrenRecursive')
        ->where('slug', $slug)
        ->firstOrFail();
        $breadcrumbs = $category->breadcrumbs();
         /*
        |--------------------------------------------------------------------------
        | Find Root Category
        |--------------------------------------------------------------------------
        */

        $root = $category;

        while ($root->parent) {
            $root = $root->parent;
        }

        /*
        |--------------------------------------------------------------------------
        | Sidebar Categories
        |--------------------------------------------------------------------------
        */

        $sidebarCategories = Category::with('childrenRecursive')
            ->where('id', $root->id)
            ->get();
            //echo $sidebarCategories;die;
       // echo "<pre>";print_r($sidebarCategories->toArray());die;
        /*
        |--------------------------------------------------------------------------
        | Active Parent IDs (Auto Expand)
        |--------------------------------------------------------------------------
        */

        $activeCategories = [];

        $temp = $category;

        while ($temp) {
            $activeCategories[] = $temp->id;
            $temp = $temp->parent;
        }

        /*
        |--------------------------------------------------------------------------
        | Current Category + Child Categories
        |--------------------------------------------------------------------------
        */

        $categoryIds = $this->getCategoryIds($category);

        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */
        //echo "<pre>";print_r($categoryIds);die;
        //$products = Product::whereIn('category_id', $categoryIds)->paginate(20);
        $products = Product::with('primaryImage')->withAvg('reviews', 'rating')->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds);
                })->distinct()->paginate(21);
        //echo "<pre>";print_r($products->toArray());die;
        return view('frontend.categories.products-list', compact(
            'category',
            'sidebarCategories',
            'products',
            'activeCategories',
            'breadcrumbs'
        ));
    }

    private function getCategoryIds($category)
    {
        $ids = [$category->id];

        foreach ($category->childrenRecursive as $child) {
            $ids = array_merge($ids, $this->getCategoryIds($child));
        }

        return $ids;
    }
    private function getRootCategory($category)
    {
        while ($category->parent) {
            $category = $category->parent;
        }

        return $category;
    }

}
