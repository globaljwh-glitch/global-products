<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use App\Services\OfferService;

use App\Services\CartCalculationService;

class CartController extends Controller
{
    public function index(
        OfferService $offerService,
        CartCalculationService $cartCalculationService
    ) {
        /*
        |--------------------------------------------------------------------------
        | Logged-in user cart
        |--------------------------------------------------------------------------
        */
        if (auth()->check()) {

            $cart = Cart::with('items.product')
                ->where('user_id', auth()->id())
                ->first();

            $cartItems = $cart ? $cart->items : collect();

        } else {

            /*
            |--------------------------------------------------------------------------
            | Guest cart from session
            |--------------------------------------------------------------------------
            */
            $sessionCart = session()->get('cart', []);

            $cartItems = collect();

            if (!empty($sessionCart)) {

                $productIds = array_keys($sessionCart);

                $products = Product::with('mainImage')
                    ->whereIn('id', $productIds)
                    ->get()
                    ->keyBy('id');

                foreach ($sessionCart as $productId => $item) {

                    if (isset($products[$productId])) {

                        $product = $products[$productId];

                        $cartItems->push((object) [
                            'product_id' => $product->id,
                            'product'    => $product,
                            'price'      => $item['price'],
                            'variant_id' => $item['variant_id'] ?? null,
                            'quantity'   => $item['quantity'],
                        ]);
                    }
                }
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate subtotal
        |--------------------------------------------------------------------------
        */
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $subtotal += $item->price * $item->quantity;
        }

        /*
        |--------------------------------------------------------------------------
        | Offers / Discounts
        |--------------------------------------------------------------------------
        */
        $offer = null;
        $discount = 0;

        $summary = $cartCalculationService->calculate(
            $subtotal,
            $discount
        );

        return view(
            'frontend.cart.index',
            compact(
                'cartItems',
                'summary',
                'offer'
            )
        );
    }

    // public function add(Request $request, Product $product)
    // {
    //     $quantity = (int) $request->quantity;

    //     // Prevent invalid quantity
    //     if ($quantity < 1) {
    //         $quantity = 1;
    //     }

    //     $cart = Cart::firstOrCreate([
    //         'user_id' => auth()->id(),
    //     ]);

    //     $cartItem = CartItem::where('cart_id', $cart->id)
    //         ->where('product_id', $product->id)
    //         ->first();

    //     if ($cartItem) {

    //         // Add requested quantity dynamically
    //         $cartItem->increment('quantity', $quantity);

    //     } else {

    //         CartItem::create([
    //             'cart_id' => $cart->id,
    //             'product_id' => $product->id,
    //             'quantity' => $quantity,
    //             'price' => $product->sale_price ?? $product->price,
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

        $price = $product->sale_price ?? $product->price;

        if ($request->filled('variant_id')) {

            $variant = ProductVariant::find($request->variant_id);

            if ($variant) {
                $price = $variant->price;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Logged-in user → Database Cart
        |--------------------------------------------------------------------------
        */
        if (auth()->check()) {

            $cart = Cart::firstOrCreate([
                'user_id' => auth()->id(),
            ]);

            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $product->id)
                ->first();

            if ($cartItem) {

                $cartItem->increment('quantity', $quantity);

            } else {

                CartItem::create([
                    'cart_id'    => $cart->id,
                    'product_id' => $product->id,
                    'variant_id' => $request->variant_id ?? null,
                    'quantity'   => $quantity,
                    'price'      => $price, //$product->sale_price ?? $product->price,
                ]);
            }

        } else {

            /*
            |--------------------------------------------------------------------------
            | Guest user → Session Cart
            |--------------------------------------------------------------------------
            */
            $cart = session()->get('cart', []);

            if (isset($cart[$product->id])) {

                $cart[$product->id]['quantity'] += $quantity;

            } else {

                $cart[$product->id] = [
                    'product_id' => $product->id,
                    'name'       => $product->name,
                    'price'      => $price, //$product->sale_price ?? $product->price,
                    'quantity'   => $quantity,
                    'image'      => $product->mainImage?->image,
                ];
            }

            session()->put('cart', $cart);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart'
        ]);
    }

    public function remove(Product $product)
    {
        /*
        |--------------------------------------------------------------------------
        | Logged-in user → Database Cart
        |--------------------------------------------------------------------------
        */
        if (auth()->check()) {

            $cart = Cart::where('user_id', auth()->id())->first();

            if ($cart) {
                CartItem::where('cart_id', $cart->id)
                    ->where('product_id', $product->id)
                    ->delete();
            }

        } else {

            /*
            |--------------------------------------------------------------------------
            | Guest user → Session Cart
            |--------------------------------------------------------------------------
            */
            $cart = session()->get('cart', []);

            if (isset($cart[$product->id])) {
                unset($cart[$product->id]);
                session()->put('cart', $cart);
            }
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Product removed from cart'
        ]);
    }

    /**
     * Remove item from cart
     */
    // public function removeItem(Request $request)
    // {
    //     $request->validate([
    //         'cart_item_id' => 'required|exists:cart_items,id'
    //     ]);

    //     $cartItem = CartItem::findOrFail($request->cart_item_id);

    //     // Security check
    //     if ($cartItem->cart->user_id != auth()->id()) {

    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Unauthorized'
    //         ], 403);

    //     }

    //     $cartItem->delete();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Item removed from cart'
    //     ]);
    // }

    public function removeItem(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Logged-in user → Database Cart
        |--------------------------------------------------------------------------
        */
        if (auth()->check()) {

            $cartItem = CartItem::findOrFail($request->cart_item_id);

            // Security check
            if ($cartItem->cart->user_id != auth()->id()) {

                return response()->json([
                    'status'  => 'error',
                    'message' => 'Unauthorized'
                ], 403);
            }

            $cartItem->delete();

        } else {

            /*
            |--------------------------------------------------------------------------
            | Guest user → Session Cart
            |--------------------------------------------------------------------------
            */
            $cart = session()->get('cart', []);

            // Here cart_item_id = product_id for guest cart
            if (isset($cart[$request->cart_item_id])) {
                unset($cart[$request->cart_item_id]);
                session()->put('cart', $cart);
            }
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'Item removed from cart'
        ]);
    }

    // public function updateQuantity(Request $request)
    // {
    //     $request->validate([
    //         'cart_item_id' => 'required|exists:cart_items,id',
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $cartItem = CartItem::findOrFail($request->cart_item_id);

    //     // Security check
    //     if ($cartItem->cart->user_id != auth()->id()) {

    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Unauthorized'
    //         ], 403);

    //     }

    //     // Update quantity
    //     $cartItem->update([
    //         'quantity' => $request->quantity
    //     ]);

    //     // Recalculate totals
    //     $itemTotal = $cartItem->price * $cartItem->quantity;

    //     $cartSubtotal = CartItem::where('cart_id', $cartItem->cart_id)
    //         ->selectRaw('SUM(price * quantity) as subtotal')
    //         ->value('subtotal');

    //     return response()->json([

    //         'status' => 'success',

    //         'message' => 'Quantity updated',

    //         'item_total' => number_format($itemTotal, 2),

    //         'cart_subtotal' => number_format($cartSubtotal, 2)

    //     ]);
    // }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required',
            'quantity'     => 'required|integer|min:1',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Logged-in user → Database Cart
        |--------------------------------------------------------------------------
        */
        if (auth()->check()) {

            $cartItem = CartItem::findOrFail($request->cart_item_id);

            // Security check
            if ($cartItem->cart->user_id != auth()->id()) {

                return response()->json([
                    'status'  => 'error',
                    'message' => 'Unauthorized'
                ], 403);
            }

            // Update quantity
            $cartItem->update([
                'quantity' => $request->quantity
            ]);

            $itemTotal = $cartItem->price * $cartItem->quantity;

            $cartSubtotal = CartItem::where('cart_id', $cartItem->cart_id)
                ->selectRaw('SUM(price * quantity) as subtotal')
                ->value('subtotal');

        } else {

            /*
            |--------------------------------------------------------------------------
            | Guest user → Session Cart
            |--------------------------------------------------------------------------
            */
            $cart = session()->get('cart', []);

            // cart_item_id = product_id for guest
            if (!isset($cart[$request->cart_item_id])) {

                return response()->json([
                    'status'  => 'error',
                    'message' => 'Item not found'
                ], 404);
            }

            $cart[$request->cart_item_id]['quantity'] = $request->quantity;

            session()->put('cart', $cart);

            $itemTotal = $cart[$request->cart_item_id]['price']
                * $cart[$request->cart_item_id]['quantity'];

            $cartSubtotal = collect($cart)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            });
        }

        return response()->json([
            'status'        => 'success',
            'message'       => 'Quantity updated',
            'item_total'    => number_format($itemTotal, 2),
            'cart_subtotal' => number_format($cartSubtotal, 2)
        ]);
    }

    // public function checkout()
    // {
    //     return view('frontend.checkout.index');
    // }

    public function checkout(
        OfferService $offerService,
        CartCalculationService $cartCalculationService
    )
    {
        /*
        |--------------------------------------------------------------------------
        | Redirect guest to login and come back here
        |--------------------------------------------------------------------------
        */
        if (!auth()->check()) {

            session()->put(
                'url.intended',
                route('cart.checkout')
            );

            return redirect()->route('login');
        }

        /*
        |--------------------------------------------------------------------------
        | Merge session cart into DB cart after login (if exists)
        |--------------------------------------------------------------------------
        */
        if (session()->has('cart')) {

            $cart = Cart::firstOrCreate([
                'user_id' => auth()->id()
            ]);

            foreach (session('cart') as $item) {

                $cartItem = CartItem::where('cart_id', $cart->id)
                    ->where('product_id', $item['product_id'])
                    ->first();

                if ($cartItem) {

                    $cartItem->increment(
                        'quantity',
                        $item['quantity']
                    );

                } else {

                    CartItem::create([
                        'cart_id'    => $cart->id,
                        'product_id' => $item['product_id'],
                        'variant_id' => $item['variant_id'] ?? null,
                        'quantity'   => $item['quantity'],
                        'price'      => $item['price'],
                    ]);
                }
            }

            session()->forget('cart');
        }

        /*
        |--------------------------------------------------------------------------
        | Load cart
        |--------------------------------------------------------------------------
        */
        $cart = Cart::with('items.product')
            ->where('user_id', auth()->id())
            ->first();

        $cartItems = $cart ? $cart->items : collect();

        $subtotal = 0;

        foreach ($cartItems as $item) {
            $subtotal += $item->price * $item->quantity;
        }

        $offer = null;
        $discount = 0;

        $summary = $cartCalculationService->calculate(
            $subtotal,
            $discount
        );

        return view(
            'frontend.checkout.index',
            compact(
                'cartItems',
                'summary',
                'offer'
            )
        );
    }


    // public function applyOffer(
    //     Request $request,

    //     OfferService $offerService,

    //     CartCalculationService $cartCalculationService
    // ) {


    //     $request->validate([

    //         'offer_code' => 'required'
    //     ]);

    //     $cart = Cart::with('items.product')

    //         ->where('user_id', auth()->id())

    //         ->first();

    //     $cartItems = $cart ? $cart->items : collect();

    //     $subtotal = 0;

    //     foreach ($cartItems as $item) {

    //         $subtotal += $item->price * $item->quantity;
    //     }
    //     $offer = $offerService->getValidOffer(

    //         $request->offer_code
    //     );

    //     if (!$offer) {

    //         return response()->json([

    //             'status' => false,

    //             'message' => 'Invalid offer code'
    //         ]);
    //     }

    //     $discount = $offerService->calculateDiscount(

    //         $subtotal,

    //         $offer
    //     );

    //     $result = $cartCalculationService->calculate(

    //         $subtotal,

    //         $discount
    //     );

    //     session([

    //         'offer_code' => $offer->offer_code
    //     ]);

    //     return response()->json([

    //         'status' => true,

    //         'message' => 'Offer applied successfully',

    //         'offer' => $offer,

    //         'data' => $result
    //     ]);
    // }


    public function applyOffer(
        Request $request,
        OfferService $offerService,
        CartCalculationService $cartCalculationService
    ) {
        $request->validate([
            'offer_code' => 'required'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Get cart items (DB or Session)
        |--------------------------------------------------------------------------
        */
        if (auth()->check()) {

            $cart = Cart::with('items.product')
                ->where('user_id', auth()->id())
                ->first();

            $cartItems = $cart ? $cart->items : collect();

        } else {

            $sessionCart = session()->get('cart', []);

            $cartItems = collect($sessionCart)->map(function ($item) {
                return (object) $item;
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate subtotal
        |--------------------------------------------------------------------------
        */
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $subtotal += $item->price * $item->quantity;
        }

        /*
        |--------------------------------------------------------------------------
        | Validate offer
        |--------------------------------------------------------------------------
        */
        $offer = $offerService->getValidOffer(
            $request->offer_code
        );

        if (!$offer) {

            return response()->json([
                'status' => false,
                'message' => 'Invalid offer code'
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate discount
        |--------------------------------------------------------------------------
        */
        $discount = $offerService->calculateDiscount(
            $subtotal,
            $offer
        );

        $result = $cartCalculationService->calculate(
            $subtotal,
            $discount
        );

        /*
        |--------------------------------------------------------------------------
        | Store in session (works for guest + logged in)
        |--------------------------------------------------------------------------
        */
        session([
            'offer_code' => $offer->offer_code
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Offer applied successfully',
            'offer'   => $offer,
            'data'    => $result
        ]);
    }

    public function removeOffer()
    {
        session()->forget('offer_code');

        return response()->json([

            'status' => true,

            'message' => 'Offer removed'
        ]);
    }

    public function syncSessionToDatabase()
    {
        $sessionCart = session()->get('cart', []);

        if (empty($sessionCart) || !auth()->check()) {
            return;
        }

        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);

        foreach ($sessionCart as $item) {

            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $item['product_id'])
                ->first();

            if ($cartItem) {

                $cartItem->increment(
                    'quantity',
                    $item['quantity']
                );

            } else {

                CartItem::create([
                    'cart_id'    => $cart->id,
                    'product_id' => $item['product_id'],
                    'variant_id' => $item['variant_id'] ?? null,
                    'quantity'   => $item['quantity'],
                    'price'      => $item['price'],
                ]);
            }
        }

        session()->forget('cart');
    }
}