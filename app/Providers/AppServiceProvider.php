<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\Paginator;

use App\Services\HeaderCountService;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Industry;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Offer;
use App\Models\News;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {

        //if (config('app.env') === 'production') {

        if ($_ENV['APP_ENV'] ?? 'local' === 'production') {
            URL::forceScheme('https');
        }

        Paginator::useBootstrapFive();

        View::composer([
            'layouts.frontend',
            'frontend.*',
        ], function ($view) {

            // ===============================
            // Categories
            // ===============================
            $categoriesData = Cache::remember('header_categories', 3600, function () {
                return Category::whereNull('parent_id')
                    ->where('status', 1)
                    ->orderBy('name')
                    ->get();
            });

            // ===============================
            // Brands
            // ===============================
            $brandsData = Cache::remember('header_brands', 3600, function () {
                return Brand::where('status', 1)
                    ->orderBy('display_order')
                    ->get();
            });

            // ===============================
            // Industries
            // ===============================
            $industriesData = Cache::remember('header_industries', 3600, function () {
                return Industry::where('status', 1)
                    ->orderBy('display_order')
                    ->get();
            });

            // ===============================
            // Banner
            // ===============================
            $bannerData = Cache::remember('header_banner', 3600, function () {
                return Banner::where('is_featured', 1)
                    ->where('status', 1)
                    ->latest()
                    ->first();
            });

            // ===============================
            // Header Offer
            // ===============================
            $offerData = Cache::remember('header_offer', 3600, function () {
                return Offer::where('offer_code', 'OFFER50')
                    ->where('status', 1)
                    ->latest()
                    ->first();
            });

            // ===============================
            // Featured Offers
            // ===============================
            $offerFeaturedData = Cache::remember('header_offer_featured', 3600, function () {
                return Offer::where('is_featured', 1)
                    ->where('status', 1)
                    ->take(2)
                    ->get();
            });

            // ===============================
            // News
            // ===============================
            $newsData = Cache::remember('header_news', 3600, function () {
                return News::where('is_featured', 1)
                    ->where('status', 'published')
                    ->take(3)
                    ->get();
            });

            // ===============================
            // Latest Products (Cached)
            // ===============================
            $latestProducts = Cache::remember('latest_products', 1800, function () {
                return Product::with('mainImage')
                    ->withAvg('reviews', 'rating')
                    ->withCount('reviews')
                    ->where('status', 1)
                    ->latest()
                    ->take(4)
                    ->get();
            });

            // ===============================
            // Header Counts (Cached)
            // ===============================
            $counts = Cache::remember('header_counts', 600, function () {
                return app(HeaderCountService::class)->getCounts();
            });

            // ===============================
            // Recently Viewed
            // ===============================
            $recentProducts = collect();

            $recentlyViewedIds = session('recently_viewed', []);

            if (!empty($recentlyViewedIds)) {

                $recentProducts = Product::with('mainImage')
                    ->whereIn('id', $recentlyViewedIds)
                    ->get()
                    ->sortBy(function ($product) use ($recentlyViewedIds) {
                        return array_search($product->id, $recentlyViewedIds);
                    });
            }

            $view->with([
                'categories_data' => $categoriesData,
                'brands_data' => $brandsData,
                'industries_data' => $industriesData,

                // Reuse cached data
                'f_categories' => $categoriesData,
                'f_brands' => $brandsData,
                'f_industries' => $industriesData,

                'banner' => $bannerData,
                'headerOffer' => $offerData,
                'offer_featured' => $offerFeaturedData,
                'news_data' => $newsData,

                'latestProducts' => $latestProducts,
                'globalRecentProducts' => $recentProducts,
                'headerCounts' => $counts,
            ]);
        });
    }
}