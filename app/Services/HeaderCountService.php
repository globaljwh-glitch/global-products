<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Favourite;

class HeaderCountService
{
    public function getCounts()
    {
        $cartCount = 0;

        $wishlistCount = 0;


        // ===================
        // Logged in user
        // ===================

        if (auth()->check()) {

            $cart = Cart::with('items')

                ->where('user_id', auth()->id())

                ->first();

            if ($cart) {

                $cartCount = $cart->items

                    ->sum('quantity');
            }

            $wishlistCount = Favourite::where(

                'user_id',

                auth()->id()

            )->count();
        }

        // ===================
        // Guest user
        // ===================
        else {

            $guestCart = session('cart', []);

            $cartCount = collect($guestCart)

                ->sum('quantity');


            $wishlistCount = count(

                session(

                    'guest_wishlist',

                    []

                )

            );



        }

        return [

            'cart_count' => $cartCount,

            'wishlist_count' => $wishlistCount

        ];
    }
}