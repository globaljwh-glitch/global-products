<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Industry;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Offer;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {

          
            $categoriesData = Cache::remember('header_categories', 3600, function () {
                return Category::whereNull('parent_id')
                    ->where('status', 1)
                    ->orderBy('display_order')
                    ->get();
            });

            $brandsData = Cache::remember('header_brands', 3600, function () {
                return Brand::where('status', 1)
                    ->where('is_featured', 1)
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

            $industriesData = Cache::remember('header_industries', 3600, function () {
                return Industry::where('status', 1)
                    ->where('is_featured', 1)
                    ->orderBy('display_order')
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
            $view->with([
                'categories_data' => $categoriesData,
                'brands_data' => $brandsData,
                'industries_data' => $industriesData,
                'globalRecentProducts' => $recentProducts,
                'banner' => $bannerData, 
                'offer' => $offerData,
                'offer_featured' => $offerFeaturedData
            ]);
        });
    }
}