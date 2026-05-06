<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Industry;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    // public function index($slug = null)
    // {


    //     $query = Product::with('mainImage', 'categories')->where('status', 1);


    //     if ($slug) {
    //         $category = Category::where('slug', $slug)->first();

    //         if ($category) {
    //             $query->whereHas('categories', function ($q) use ($category) {
    //                 $q->where('categories.id', $category->id);
    //             });
    //         }
    //     }

    //     if (request()->sort) {
    //         switch (request()->sort) {
    //             case 'price_low':
    //                 $query->orderBy('price', 'asc');
    //                 break;
    //             case 'price_high':
    //                 $query->orderBy('price', 'desc');
    //                 break;
    //             case 'new':
    //                 $query->latest();
    //                 break;
    //             default:
    //                 $query->latest();
    //         }
    //     } else {
    //         $query->latest();
    //     }

    //     $products = $query->paginate(9)->withQueryString();


    //     return view('frontend.products.index', compact('products'));
    // }

    public function index(Request $request, $type = null, $slug = null)
    {
        $query = Product::with('mainImage', 'categories')
            ->where('status', 1);

        if ($type && $slug) {

            switch ($type) {

                case 'category':
                    $category = Category::where('slug', $slug)->first();
                    if ($category) {
                        $query->whereHas('categories', function ($q) use ($category) {
                            $q->where('categories.id', $category->id);
                        });
                    }
                    break;

                case 'brand':
                    $brand = Brand::where('slug', $slug)->first();
                    if ($brand) {
                        $query->whereHas('brands', function ($q) use ($brand) {
                            $q->where('brands.id', $brand->id);
                        });
                    }
                    
                    break;

                case 'industry':
                    $industry = Industry::where('slug', $slug)->first();
                    if ($industry) {
                        $query->whereHas('industries', function ($q) use ($industry) {
                            $q->where('industries.id', $industry->id);
                        });
                    }
                    break;
            }
        }

        // SORTING (same as before)
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

        $products = $query->paginate(9)->withQueryString();

        return view('frontend.products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::with([
            'images',
            'mainImage',
            'categories'
        ])
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        /*
        |----------------------------------------
        | Recently Viewed (Session Logic)
        |----------------------------------------
        */
        $recent = session()->get('recently_viewed', []);

        // Remove if already exists
        $recent = array_diff($recent, [$product->id]);

      
        array_unshift($recent, $product->id);

       
        $recent = array_slice($recent, 0, 8);

        
        session()->put('recently_viewed', $recent);

       
        $recentlyViewed = Product::whereIn('id', $recent)
            ->where('id', '!=', $product->id) 
            ->with('mainImage')
            ->get();


        $relatedProducts = Product::whereIn('id', function ($query) use ($product) {
            $query->select('related_product_id')
                ->from('related_products')
                ->where('product_id', $product->id);
        })
            ->with('mainImage')
            ->orderBy('display_order')
            ->take(4)
            ->get();

        return view('frontend.products.show', compact(
            'product',
            'relatedProducts',
            'recentlyViewed'
        ));
    }

    /**
     * Get Brands
     */
    public function GetBrands($slug = null)
    {
        $query = Product::with('mainImage', 'brands')->where('status', 1);

        if ($slug) {
            $brand = Brand::where('slug', $slug)->first();

            if ($brand) {
                $query->whereHas('brands', function ($q) use ($brand) {
                    $q->where('brands.id', $brand->id);
                });
            }
        }

        if (request()->sort) {
            switch (request()->sort) {
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
        } else {
            $query->latest();
        }

        $products = $query->paginate(9)->withQueryString();


        return view('frontend.products.brand', compact('products'));
    }
}