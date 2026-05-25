<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.product')
            ->where('user_id', auth()->id())
            ->first();

        $cartItems = $cart ? $cart->items : collect();

        return view('frontend.cart.index', compact('cartItems'));

        //return view('frontend.cart.index');
    }

    // public function shopping_cart()
    // {
    //     return view('frontend.cart.shopping_cart');
    // }

    // public function add(Product $product)
    // {
    //     $cart = Cart::firstOrCreate([
    //         'user_id' => auth()->id(),
    //     ]);

    //     $cartItem = CartItem::where('cart_id', $cart->id)
    //         ->where('product_id', $product->id)
    //         ->first();

    //     if ($cartItem) {

    //         $cartItem->increment('quantity');

    //     } else {

    //         CartItem::create([
    //             'cart_id'   => $cart->id,
    //             'product_id'=> $product->id,
    //             'quantity'  => 1,
    //             'price'     => $product->sale_price ?? $product->price,
    //         ]);
    //     }

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Product added to cart'
    //     ]);
    // }

    public function add(Request $request, Product $product)
    {
        $quantity = (int) $request->quantity;

        // Prevent invalid quantity
        if ($quantity < 1) {
            $quantity = 1;
        }

        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {

            // Add requested quantity dynamically
            $cartItem->increment('quantity', $quantity);

        } else {

            CartItem::create([
                'cart_id'    => $cart->id,
                'product_id' => $product->id,
                'quantity'   => $quantity,
                'price'      => $product->sale_price ?? $product->price,
            ]);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Product added to cart'
        ]);
    }

    /**
     * This method is not in use, this is also use for remove product from cart
     */
    public function remove(Product $product)
    {
        $cart = Cart::where('user_id', auth()->id())->first();

        if ($cart) {

            CartItem::where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->delete();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product removed from cart'
        ]);
    }

    /**
     * Remove item from cart
     */
    public function removeItem(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id'
        ]);

        $cartItem = CartItem::findOrFail($request->cart_item_id);

        // Security check
        if ($cartItem->cart->user_id != auth()->id()) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized'
            ], 403);

        }

        $cartItem->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Item removed from cart'
        ]);
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id',
            'quantity'     => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::findOrFail($request->cart_item_id);

        // Security check
        if ($cartItem->cart->user_id != auth()->id()) {

            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized'
            ], 403);

        }

        // Update quantity
        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        // Recalculate totals
        $itemTotal = $cartItem->price * $cartItem->quantity;

        $cartSubtotal = CartItem::where('cart_id', $cartItem->cart_id)
            ->selectRaw('SUM(price * quantity) as subtotal')
            ->value('subtotal');

        return response()->json([

            'status' => 'success',

            'message' => 'Quantity updated',

            'item_total' => number_format($itemTotal, 2),

            'cart_subtotal' => number_format($cartSubtotal, 2)

        ]);
    }

    public function checkout()
    {
        return view('frontend.checkout.index');
    }
}