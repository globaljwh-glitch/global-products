<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Offer;
use App\Models\News;
use App\Services\HeaderCountService;

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


        $banner = Banner::where('is_featured', 1)
            ->where('status', 1)
            //->where('page', 'home')
            ->latest()
            ->first();

        $headerOffer = Offer::where('offer_code', 'OFFER50')
            ->where('status', 1)
            ->latest()
            ->first();

        $offer_featured = Offer::where('is_featured', 1)
            ->where('status', 1)
            ->take(2)
            ->get();

        $news_data = News::where('is_featured', 1)
            ->where('status', 'published')
            ->take(3)
            ->get();

        return view(
            'frontend.home',
            compact('categories', 'bestSellers', 'latestProducts', 'banner', 'headerOffer', 'offer_featured', 'news_data')
        );

    }

    public function counts(
        HeaderCountService $headerCountService
    ) {

        return response()->json(

            $headerCountService

                ->getCounts()

        );
    }


}
