<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Product $product)
    {
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
    }
}