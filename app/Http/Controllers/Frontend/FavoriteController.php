<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Product $product)
    {
        if (auth()->check()) {
            $user = auth()->user();

            $exists = $user->favoriteProducts()
                ->where('product_id', $product->id)
                ->exists();

            if ($exists) {

                $user->favoriteProducts()->detach($product->id);

                return response()->json([
                    'status' => 'removed'
                ]);

            } else {

                $user->favoriteProducts()->attach($product->id);

                return response()->json([
                    'status' => 'added'
                ]);
            }
        } else {

            // Guest user
            $wishlist = session()->get('guest_wishlist', []);

            if (in_array($product->id, $wishlist)) {

                $wishlist = array_values(array_diff($wishlist, [$product->id]));

                session()->put('guest_wishlist', $wishlist);

                return response()->json([
                    'status' => 'removed',
                    'count'  => count($wishlist),
                ]);

            } else {

                $wishlist[] = $product->id;

                $wishlist = array_unique($wishlist);

                session()->put('guest_wishlist', $wishlist);

                return response()->json([
                    'status' => 'added',
                    'count'  => count($wishlist),
                ]);
            }
            
        }
    }
}