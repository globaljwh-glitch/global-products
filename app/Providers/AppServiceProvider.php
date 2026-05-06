<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Industry;
use App\Models\Product;

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
                'globalRecentProducts' => $recentProducts
            ]);
        });
    }
}