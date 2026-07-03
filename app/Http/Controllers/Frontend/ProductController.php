<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Industry;
use App\Models\Category;
use App\Models\Brand;
use App\Models\DeliveryZip;
use Carbon\Carbon;
use App\Models\ProductReview;

class ProductController extends Controller
{
    public function index(Request $request, $type = null, $slug = null)
    {
        $query = Product::with([
            'mainImage',
            'categories',
            'brands',
            'industries'
        ])->withAvg('reviews', 'rating')->withCount('reviews')
            ->where('status', 1);

        // FILTERING
        if ($type && $slug) {

            switch ($type) {

                case 'category':

                    $category = Category::where('slug', $slug)
                        ->firstOrFail();

                    $query->whereHas('categories', function ($q) use ($category) {

                        $q->where('categories.id', $category->id);

                    });

                    break;

                case 'brand':

                    $brand = Brand::where('slug', $slug)
                        ->firstOrFail();

                    $query->whereHas('brands', function ($q) use ($brand) {

                        $q->where('brands.id', $brand->id);

                    });

                    break;

                case 'industry':

                    $industry = Industry::where('slug', $slug)
                        ->firstOrFail();

                    $query->whereHas('industries', function ($q) use ($industry) {

                        $q->where('industries.id', $industry->id);

                    });

                    break;

                default:

                    abort(404);
            }
        }


        // SEARCH
        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%")
                    ->orWhere('model_number', 'like', "%{$search}%");

            });
        }


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

        return view('frontend.products.index', compact(
            'products'
        ));
    }

    public function wishlist(Request $request)
    {
        $query = Product::with([
            'mainImage',
            'categories',
            'brands',
            'industries'
        ])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->where('status', 1)
            ->whereHas('favoritedByUsers', function ($q) {
                $q->where('users.id', auth()->id());
            });

        switch ($request->get('sort')) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;

            case 'price_high':
                $query->orderBy('price', 'desc');
                break;

            case 'new':
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(9)->withQueryString();

        return view('frontend.wishlist.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::with([
            'images',
            'mainImage',
            'categories',
            'questions',
            'attributes'
        ])->withAvg('reviews', 'rating')->withCount('reviews')
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

    public function checkDelivery(Request $request)
    {
        $zip = DeliveryZip::where(
            'zip_code',
            $request->zip_code
        )->first();

        if (!$zip) {

            return back()->with(
                'delivery_error',
                'Delivery not available for this ZIP code.'
            );
        }

        $deliveryDate = Carbon::now()
            ->addDays($zip->delivery_days)
            ->format('jS M Y');

        return back()->with([
            'delivery_zip' => $request->zip_code,
            'delivery_date' => $deliveryDate,
        ]);
    }


    public function store_product_review(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
            'title' => 'nullable|string|max:255',
        ]);

        ProductReview::updateOrCreate(
            [
                'product_id' => $request->product_id,
                'user_id' => auth()->id(),
            ],
            [
                'rating' => $request->rating,
                'title' => $request->title,
                'review' => $request->review,
                'status' => 1,
            ]
        );

        return back()->with('success', 'Your review has been saved successfully.');
    }
}