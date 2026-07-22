<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{

    public function paypalPayment(Request $request)
    {
        $cart = Cart::with('items.product')
            ->where('user_id', auth()->id())
            ->first();

        if (!$cart || $cart->items->count() == 0) {

            return back()->with('error', 'Cart is empty');
        }

        $subtotal = 0;

        foreach ($cart->items as $item) {

            $subtotal += $item->price * $item->quantity;
        }

        // $shipping = 25;
        // $tax = 25;
        $shipping = config('custom.shipping_charge', 0);
        $taxPercentage = config('custom.tax_percentage', 0);
        $tax = ($subtotal * $taxPercentage) / 100;

        $grandTotal = $subtotal + $shipping + $tax;

        // Create Order First
        $order = Order::create([

            'user_id' => auth()->id(),

            'order_number' => 'ORD-' . strtoupper(uniqid()),

            'subtotal' => $subtotal,

            'shipping_charge' => $shipping,

            'tax' => $tax,

            'grand_total' => $grandTotal,

            'payment_method' => 'paypal',

            'payment_status' => 'pending',

        ]);

        foreach ($cart->items as $item) {

            OrderItem::create([

                'order_id' => $order->id,

                'product_id' => $item->product_id,

                'product_name' => $item->product->name,

                'quantity' => $item->quantity,

                'price' => $item->price,

                'total' => $item->price * $item->quantity,

            ]);
        }

        // PayPal
        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $provider->getAccessToken();

        $response = $provider->createOrder([

            "intent" => "CAPTURE",

            "application_context" => [

                "return_url" => route('paypal.success'),

                "cancel_url" => route('paypal.cancel'),

            ],

            "purchase_units" => [[

                "amount" => [

                    "currency_code" => "USD",

                    "value" => $grandTotal

                ]

            ]]

        ]);

        if (isset($response['id']) && $response['id'] != null) {

            $order->update([
                'paypal_order_id' => $response['id']
            ]);

            foreach ($response['links'] as $link) {

                if ($link['rel'] == 'approve') {

                    return redirect($link['href']);
                }
            }
        }

        return back()->with('error', 'Something went wrong.');
    }

    public function paypalSuccess(Request $request)
    {
        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);
        //dd($response);

        \Log::info('PayPal Response', $response);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $order = Order::where('paypal_order_id', $request->token)
                ->first();

            if ($order) {

                $order->update([

                    'payment_status' => 'paid',

                    'status' => 'processing',

                    'transaction_id' =>
                        $response['purchase_units'][0]['payments']['captures'][0]['id']

                ]);

                // Clear Cart
                CartItem::where('cart_id', function($q){

                    $q->select('id')
                        ->from('carts')
                        ->where('user_id', auth()->id())
                        ->limit(1);

                })->delete();
            }

            return redirect('/thank-you')
                ->with('success', 'Payment successful');
        }

        return redirect('/cart')
            ->with('error', 'Payment failed');
    }

    public function paypalCancel(Request $request)
    {
        $order = Order::where('paypal_order_id', $request->token)
            ->first();

        if ($order) {

            $order->update([
                'payment_status' => 'cancelled',
                'status' => 'cancelled',
            ]);
        }

        return redirect('/checkout')
            ->with('error', 'Payment was cancelled.');
    }
}
