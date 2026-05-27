{{-- resources/views/frontend/thank-you.blade.php --}}

@extends('layouts.frontend')

@section('content')

<style>
    .thank-you-section {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f5f5f5;
        padding: 60px 20px;
    }

    .thank-you-card {
        background: #fff;
        padding: 60px 50px;
        border-radius: 15px;
        text-align: center;
        max-width: 650px;
        width: 100%;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .thank-you-icon {
        width: 100px;
        height: 100px;
        background: #28a745;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 50px;
        margin: 0 auto 25px;
    }

    .thank-you-title {
        font-size: 42px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 15px;
    }

    .thank-you-text {
        font-size: 18px;
        color: #6b7280;
        line-height: 1.8;
        margin-bottom: 35px;
    }

    .thank-you-order {
        background: #f9fafb;
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 35px;
        font-size: 18px;
        font-weight: 600;
        color: #111827;
    }

    .thank-you-btn {
        display: inline-block;
        background: #111827;
        color: #fff;
        padding: 14px 35px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        transition: 0.3s;
    }

    .thank-you-btn:hover {
        background: #000;
        color: #fff;
    }
</style>

<section class="thank-you-section">

    <div class="thank-you-card">

        <div class="thank-you-icon">
            ✓
        </div>

        <h1 class="thank-you-title">
            Thank You!
        </h1>

        <p class="thank-you-text">
            Your order has been placed successfully.
            We appreciate your purchase and will process your order shortly.
        </p>

        <!-- <div class="thank-you-order">
            Order ID: #{{ $order->id ?? '1001' }}
        </div> -->

        <a href="{{ url('/categories') }}" class="thank-you-btn">
            Continue Shopping
        </a>

    </div>

</section>

@endsection