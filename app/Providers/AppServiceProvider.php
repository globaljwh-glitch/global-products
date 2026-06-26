<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Services\HeaderCountService;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Industry;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Offer;
use App\Models\News;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($_ENV['APP_ENV'] ?? 'local' === 'production') {
            URL::forceScheme('https');
        }

        Paginator::useBootstrapFive();
        //Paginator::useBootstrap();

        View::composer('*', function ($view) {

            $categoriesData = Cache::remember('header_categories', 3600, function () {
                return Category::whereNull('parent_id')
                    ->where('status', 1)
                    ->orderBy('name', 'asc')
                    ->get();
            });
            //Cache::forget('header_brands');
            $brandsData = Cache::remember('header_brands', 3600, function () {
                return Brand::where('status', 1)
                    //->where('is_featured', 1)
                    ->orderBy('display_order')
                    ->get();
            });

            $bannerData = Cache::remember('header_banner', 3600, function () {
                return Banner::where('is_featured', 1)
                    ->where('status', 1)
                    ->latest()
                    ->first();
            });

            $offerData = Cache::remember('header_offer', 3600, function () {
                return Offer::where('offer_code', 'OFFER50')
                    ->where('status', 1)
                    ->latest()
                    ->first();
            });

            $offerFeaturedData = Cache::remember('header_offer_featured', 3600, function () {
                return Offer::where('is_featured', 1)
                    ->where('status', 1)
                    ->take(2)
                    ->get();
            });
            //Cache::forget('header_industries');
            $industriesData = Cache::remember('header_industries', 3600, function () {
                return Industry::where('status', 1)
                    //->where('is_featured', 1)
                    ->orderBy('display_order')
                    ->get();
            });
            //echo "<pre>";print_r($industriesData);die;
            $newsData = Cache::remember('header_news', 3600, function () {
                return News::where('is_featured', 1)
                    ->where('status', 'published')
                    ->take(3)
                    ->get();
            });


            $recentlyViewedIds = session()->get('recently_viewed', []);

            $recentProducts = collect();

            if (!empty($recentlyViewedIds)) {
                $recentProducts = Product::whereIn('id', $recentlyViewedIds)
                    ->with('mainImage')
                    ->get()
                    ->sortByDesc(function ($product) use ($recentlyViewedIds) {
                        return array_search($product->id, $recentlyViewedIds);
                    });
            }

            // ✅ Pass both globally
            //dd($brandsData);

            $latestProducts = Product::with('mainImage')
                ->where('status', 1)
                ->latest()
                ->take(4)
                ->get();

            $categories = Category::whereNull('parent_id')
                ->where('status', 1)
                ->orderBy('name', 'asc')
                ->get();

            $brands = Brand::where('status', 1)
                ->orderBy('display_order', 'asc')
                ->get();

            $industries = Industry::where('status', 1)
                ->orderBy('display_order', 'asc')
                ->get();

            $counts = app(HeaderCountService::class)->getCounts();



            $view->with([
                'categories_data' => $categoriesData,
                'brands_data' => $brandsData,
                'industries_data' => $industriesData,
                'globalRecentProducts' => $recentProducts,
                'banner' => $bannerData, 
                //'offer' => $offerData,
                'headerOffer' => $offerData,
                'offer_featured' => $offerFeaturedData,
                'news_data' => $newsData,
                'latestProducts' => $latestProducts,
                'f_categories' => $categories,
                'f_brands' => $brands,
                'f_industries' => $industries,
                'headerCounts' => $counts,
            ]);
        });
    }
}
