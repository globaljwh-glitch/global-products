<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
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

          
            $categories = Cache::remember('header_categories', 3600, function () {
                return Category::whereNull('parent_id')
                    ->where('status', 1)
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
                'categories' => $categories,
                'globalRecentProducts' => $recentProducts
            ]);
        });
    }
}