@extends('layouts.frontend')

@section('content')

@php

    $user = auth()->user();

    $cart = \App\Models\Cart::with('items.product')
        ->where('user_id', auth()->id())
        ->first();

    $cartItems = $cart ? $cart->items : collect();

    $subtotal = 0;

    foreach ($cartItems as $item) {

        $subtotal += $item->price * $item->quantity;
    }

    $discount = 0;

    if(!empty($cartItems)) {
        $shipping = config('custom.shipping_charge', 0);
        $taxPercentage = config('custom.tax_percentage', 0);

        $tax = ($subtotal * $taxPercentage) / 100;

    } else {
        $shipping = 0;
        $tax = 0;
    }

    $grandTotal = $subtotal - $discount + $shipping + $tax;

@endphp

<section class="sectionPadding imageBackground02">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="text-center">

                    <h2 class="fw-bold welcomeUser">

                        <span class="text-red">Welcome</span>

                        {{ $user->name }}

                    </h2>

                </div>

                <div class="userProfileImage">

                    <a href="#" class="d-block shadow">

                        <img
                            src="{{ auth()->user()?->image ? asset(auth()->user()->image) : asset('images/guest-user.jpg') }}"
                            alt="User"
                            class="imgResponsive"
                        >

                    </a>

                    <div class="memberSince fw-bold">

                        Member Since {{ $user->created_at->format('Y') }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="sectionPadding profileInfoOuter">

@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        {{ session('success') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif

@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show">

        {{ session('error') }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

@endif

    <div class="container">

        <div class="row">

            <!-- LEFT -->
            <div class="col-lg-8">

                <form action="#" method="POST">

                    @csrf

                    <!-- Contact -->
                    <div class="checkout-box">

                        <h5 class="section-title">
                            Contact Information
                        </h5>

                        <div class="row">

                            <div class="col-md-6">

                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    value="{{ $user->name }}"
                                    placeholder="Full Name"
                                >

                            </div>

                            <div class="col-md-6">

                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    value="{{ $user->email }}"
                                    placeholder="Email Address"
                                >

                            </div>

                            <div class="col-md-6">

                                <input
                                    type="text"
                                    class="form-control"
                                    name="phone"
                                    value="{{ $user->phone ?? '' }}"
                                    placeholder="Phone Number"
                                >

                            </div>

                        </div>

                    </div>

                    <!-- Address -->
                    <div class="checkout-box">

                        <h5 class="section-title">
                            Shipping Address
                        </h5>

                        <div>

                            <input
                                type="text"
                                class="form-control"
                                name="address_1"
                                placeholder="Address Line 1"
                            >

                        </div>

                        <div>

                            <input
                                type="text"
                                class="form-control"
                                name="address_2"
                                placeholder="Address Line 2"
                            >

                        </div>

                        <div class="row">

                            <div class="col-md-4">

                                <input
                                    type="text"
                                    class="form-control"
                                    name="city"
                                    placeholder="City"
                                >

                            </div>

                            <div class="col-md-4">

                                <input
                                    type="text"
                                    class="form-control"
                                    name="state"
                                    placeholder="State"
                                >

                            </div>

                            <div class="col-md-4">

                                <input
                                    type="text"
                                    class="form-control"
                                    name="pincode"
                                    placeholder="Pincode"
                                >

                            </div>

                        </div>

                        <div>

                            <select class="form-control" name="country">

                                <option value="india">
                                    India
                                </option>
                                <option value="usa">
                                    USA
                                </option>
                                <option value="uae">
                                    UAE
                                </option>
                                <option value="uk">
                                    UK
                                </option>
                                <option value="canada">
                                    Canada
                                </option>

                            </select>

                        </div>

                    </div>

                    <!-- Shipping -->
                    <!-- <div class="checkout-box">

                        <h5 class="section-title">
                            Shipping Method
                        </h5>

                        <div class="payment-option active mb-2">

                            <input
                                type="radio"
                                name="shipping_method"
                                value="standard"
                                checked
                            >

                            Standard Delivery (3-5 days) - ₹50

                        </div>

                        <div class="payment-option">

                            <input
                                type="radio"
                                name="shipping_method"
                                value="express"
                            >

                            Express Delivery (1-2 days) - ₹150

                        </div>

                    </div> -->

                    <!-- Payment -->
                    <div class="checkout-box">

                        <h5 class="section-title">
                            Payment Method
                        </h5>

                        <div class="payment-option mb-2">

                            <input
                                type="radio"
                                name="payment_method"
                                value="paypal"
                                checked
                            >

                            PayPal

                        </div>

                        <!-- <div class="payment-option">

                            <input
                                type="radio"
                                name="payment_method"
                                value="cod"
                            >

                            Cash on Delivery

                        </div> -->

                    </div>

                </form>

            </div>

            <!-- RIGHT -->
            <div class="col-lg-4">

                <div class="checkout-box sticky-summary greyBg">

                    <h5 class="section-title">
                        Order Summary
                    </h5>

                    @forelse($cartItems as $item)

                        @php

                            $product = $item->product;

                            $total = $item->price * $item->quantity;

                        @endphp

                        <div class="d-flex align-items-center mb-3">

                            <img
                                src="{{ $product->mainImage
                     ? asset('storage/' . $product->mainImage->image)
                     : asset('images/no-product.png') }}"
                                class="product-img me-2"
                            >

                            <div class="flex-grow-1 pe-2">

                                <h6 class="mb-1">

                                    {{ $product->name }}

                                </h6>

                                <small class="text-red fw-bold">

                                    Qty: {{ $item->quantity }}

                                </small>

                            </div>

                            <strong>

                                ${{ number_format($total, 2) }}

                            </strong>

                        </div>

                    @empty

                        <div class="text-center">

                            <h6>
                                Cart is empty
                            </h6>

                        </div>

                    @endforelse

                    <hr>

                    <!-- Price -->
                    <div class="d-flex justify-content-between">

                        <span>Subtotal</span>

                        <span class="fw-bold">

                            ${{ number_format($subtotal, 2) }}

                        </span>

                    </div>

                    <div class="d-flex justify-content-between">

                        <span>Discount</span>

                        <span class="fw-bold text-success">

                            -${{ number_format($discount, 2) }}

                        </span>

                    </div>

                    <div class="d-flex justify-content-between">

                        <span>Shipping</span>

                        <span class="fw-bold">

                            ${{ number_format($shipping, 2) }}

                        </span>

                    </div>

                    <div class="d-flex justify-content-between">

                        <span>Tax (GST)</span>

                        <span class="fw-bold">

                            ${{ number_format($tax, 2) }}

                        </span>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fw-bold">

                        <span>Total Paid</span>

                        <span class="text-red productPrice">

                            ${{ number_format($grandTotal, 2) }}

                        </span>

                    </div>

                    <!-- PayPal -->
                    @if($cartItems->isNotEmpty())

                        <form action="{{ route('paypal.payment') }}"
                            method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-primary w-100 mt-2 mt-md-3 customBtn01 redBg text-white">

                                Pay With PayPal

                            </button>

                        </form>

                    @else

                        <button
                            type="button"
                            class="btn btn-secondary w-100 mt-2 mt-md-3 customBtn01"
                            disabled>
                            Pay With PayPal
                        </button>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>


@endsection