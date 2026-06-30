<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Industry;

use App\Models\Brand;
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
    public function category(Request $request,$slug)
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
        $query = Product::with('primaryImage')->withAvg('reviews', 'rating')->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds);
                });
        // SORTING
        switch ($request->get('sort')) {

            case 'price_low':

                $query->orderBy('price', 'asc');

                break;

            case 'price_high':

                $query->orderBy('price', 'desc');

                break;

            case 'new':

                $query->latest();

                break;

            default:

                $query->latest();
        }
        $products = $query->paginate(24)->withQueryString();
        //echo "<pre>";print_r($products->toArray());die;
        $type = "category";
        return view('frontend.categories.products-list', compact(
            'category',
            'sidebarCategories',
            'products',
            'activeCategories',
            'breadcrumbs',
            'type'
        ));
    }
    public function getProducts(Request $request, $type = null, $slug = null, $slug2 = null)
    {
        $query = Product::with([
            'primaryImage',
            'categories',
            'brands',
            'industries'
            ])->withAvg('reviews', 'rating')->where('status', 1);
        $category          = [];
        $industry          = [];
        $sidebarCategories = [];
        $products          = [];
        $activeCategories  = [];
        $breadcrumbs       = [];
        $brand             = [];
       if ($type && $slug) 
       {
          switch ($type) 
          {
            case 'category':
              $category = Category::with('parentRecursive', 'childrenRecursive')->where('slug', $slug)->firstOrFail();
              $breadcrumbs = $category->breadcrumbs();
              /****** Find Root Category ******/
              $root = $category;
              while ($root->parent) {
                  $root = $root->parent;
              }

              /****** Sidebar Categories ******/
              $sidebarCategories = Category::with('childrenRecursive')->where('id', $root->id)->get();
              /****** Active Parent IDs (Auto Expand) ******/

              $temp = $category;

              while ($temp) {
                  $activeCategories[] = $temp->id;
                  $temp = $temp->parent;
              }

              /****** Current Category + Child Categories ******/

              $categoryIds = $this->getCategoryIds($category);
              $query->whereHas('categories', function ($q) use ($categoryIds) {
                  $q->whereIn('categories.id', $categoryIds);
              });
              break;
            
            case 'industry':
              $industry = Industry::with('categories')->where('slug', $slug)->firstOrFail();
              $breadcrumbs = $industry->breadcrumbs();
              $sidebarCategories = $industry->categories;
              //echo "<pre>";print_r($sidebarCategories->toArray());die;
              $query->whereHas('industries', function ($q) use ($industry) {

                  $q->where('industries.id', $industry->id);

              });

              break;
            case 'brand':
              $brand = Brand::with('categories')->where('slug', $slug)->firstOrFail();
              $sidebarCategories = $brand->categories;
              $breadcrumbs = $brand->breadcrumbs();
              $query->whereHas('brands', function ($q) use ($brand) {

                  $q->where('brands.id', $brand->id);
              });

              break;

            default:

                    abort(404);
            }
        }


        // SEARCH
        // if ($request->filled('search')) {

        //     $search = trim($request->search);

        //     $query->where(function ($q) use ($search) {

        //         $q->where('name', 'like', "%{$search}%")
        //             ->orWhere('sku', 'like', "%{$search}%")
        //             ->orWhere('model_number', 'like', "%{$search}%");

        //     });
        // }


        // SORTING
        switch ($request->get('sort')) {

            case 'price_low':

                $query->orderBy('price', 'asc');

                break;

            case 'price_high':

                $query->orderBy('price', 'desc');

                break;

            case 'new':

                $query->latest();

                break;

            default:

                $query->latest();
        }

        $products = $query->paginate(9)
            ->withQueryString();

        return view('frontend.categories.products-list', compact(
            'category',
            'sidebarCategories',
            'products',
            'activeCategories',
            'breadcrumbs',
            'industry',
            'brand',
            'type'
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
