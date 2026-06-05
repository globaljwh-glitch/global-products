<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('frontend.orders.index', compact('orders'));
    }

    // public function show(Order $order)
    // {
    //     abort_if($order->user_id != auth()->id(), 403);

    //     return view('frontend.orders.show', compact('order'));
    // }

    // public function show(Order $order)
    // {
    //     abort_if($order->user_id != auth()->id(), 403);

    //     $order->load('items');

    //     return view('frontend.orders.show', compact('order'));
    // }

    public function show(Order $order)
    {
        abort_if($order->user_id != auth()->id(), 403);

        $order->load('items.product');

        return view('frontend.orders.show', compact('order'));
    }

    public function invoice(Order $order)
    {
        abort_if($order->user_id != auth()->id(), 403);

        //$order->load('items');
        $order->load('items.product');

        return view(
            'frontend.orders.invoice',
            compact('order')
        );
    }

    public function trackForm()
    {
        return view('frontend.orders.track');
    }

    public function track(Request $request)
    {
        $request->validate([
            'order_number' => 'required',
        ]);

        $order = Order::where('order_number', $request->order_number)
            ->first();

        if (!$order) {
            return back()->with('error', 'Order not found.');
        }

        return view('frontend.orders.track', compact('order'));
    }
}