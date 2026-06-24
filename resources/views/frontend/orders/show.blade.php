@extends('layouts.frontend')

@section('content')

    <section class="sectionPadding imageBackground02">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="text-center">
                        <h2 class="fw-bold welcomeUser">
                            <span class="text-red">Welcome</span>
                            {{ auth()->user()->name }}
                        </h2>
                    </div>

                    <div class="userProfileImage">
                        <a href="#" class="d-block shadow">
                            <img src="{{ asset('images/user-image.jpg') }}" alt="{{ auth()->user()->name }}"
                                class="imgResponsive">
                        </a>

                        <div class="memberSince fw-bold">
                            Member Since {{ auth()->user()->created_at->format('Y') }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="sectionPadding profileInfoOuter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    {{-- Order Header --}}
                    <div class="order-box d-flex justify-content-between align-items-center greyBg">

                        <div>
                            <h5>Order #{{ $order->order_number }}</h5>

                            <p class="mb-0">
                                Placed on {{ $order->created_at->format('d M Y') }}
                            </p>
                        </div>

                        <h6 class="text-white p-3
                                        @if($order->order_status == 'delivered')
                                            bg-success
                                        @elseif($order->order_status == 'cancelled')
                                            bg-danger
                                        @else
                                            bg-warning
                                        @endif">

                            {{ ucfirst($order->order_status) }}

                        </h6>

                    </div>
                    {{-- Products --}}

                    <h5>Items Ordered</h5>

                    @foreach($order->items as $item)

                                <div class="p-3 border-bottom">

                                    {{-- Product Row --}}

                                    <div class="d-flex justify-content-between align-items-start">

                                        <div class="d-flex">

                                            <img src="{{ $item->product && $item->product->image
                        ? asset($item->product->image)
                        : asset('images/no-image.png') }}" class="product-img me-3">

                                            <div>

                                                <h6 class="mb-1">

                                                    {{ $item->product_name }}

                                                </h6>

                                                <small class="text-red fw-bold">

                                                    Qty: {{ $item->quantity }}

                                                    |

                                                    ${{ number_format($item->price, 2) }} each

                                                </small>

                                            </div>

                                        </div>

                                        <strong>

                                            ${{ number_format($item->total, 2) }}

                                        </strong>

                                    </div>


                                    {{-- Review Section --}}

                                    @if($order->order_status == 'delivered')

                                        <div class="reviewBox mt-3 p-3 rounded border">

                                            <form action="{{ route('product.review.store') }}" method="POST">

                                                @csrf

                                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">


                                                <input type="hidden" name="order_id" value="{{ $order->id }}">


                                                <input type="hidden" name="rating" class="selected_rating" value="5">


                                                <div class="mb-2">

                                                    <label class="fw-semibold">

                                                        Your Rating

                                                    </label>

                                                </div>


                                                {{-- Stars --}}

                                                <div class="productRating productRatingLarge mb-3">

                                                    @for($i = 1; $i <= 5; $i++)

                                                        <span class="fa fa-star checked rating-star" data-rating="{{ $i }}">

                                                        </span>

                                                    @endfor

                                                </div>


                                                {{-- Title --}}

                                                <div class="form-group mb-3">

                                                    <label>

                                                        Review Title

                                                    </label>

                                                    <input type="text" name="title" class="form-control" placeholder="Enter review title">

                                                </div>


                                                {{-- Feedback --}}

                                                <div class="form-group mb-3">

                                                    <label>

                                                        Your Review

                                                    </label>

                                                    <textarea name="review" rows="3" class="form-control"
                                                        placeholder="Share your experience">

                                                            </textarea>

                                                </div>


                                                <button type="submit" class="btn customBtn01 redBg text-white">

                                                    Submit Review

                                                </button>

                                            </form>

                                        </div>

                                    @else

                                        <small class="text-muted d-block mt-3">

                                            <i class="fa-solid fa-circle-info"></i>

                                            You can review this product after delivery.

                                        </small>

                                    @endif

                                </div>

                    @endforeach

                    {{-- Price Details --}}
                    <div class="order-box">

                        <h5>Price Details</h5>

                        <div class="d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span class="fw-bold">
                                ${{ number_format($order->subtotal, 2) }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>Discount</span>
                            <span class="fw-bold text-success">
                                -${{ number_format($order->discount ?? 0, 2) }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>Shipping</span>
                            <span class="fw-bold">
                                ${{ number_format($order->shipping_charge ?? 0, 2) }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span>Tax (GST)</span>
                            <span class="fw-bold">
                                ${{ number_format($order->tax ?? 0, 2) }}
                            </span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between fw-bold">
                            <span>Total Paid</span>

                            <span class="text-red productPrice">
                                ${{ number_format($order->grand_total, 2) }}
                            </span>
                        </div>

                    </div>

                    {{-- Address --}}
                    <div class="row">

                        <div class="col-md-6 d-flex">

                            <div class="order-box w-100">

                                <h5>Shipping Address</h5>

                                <p>
                                    {{ $order->shipping_name ?? auth()->user()->name }}<br>

                                    {{ $order->shipping_address_1 ?? '' }}<br>

                                    @if(!empty($order->shipping_address_2))
                                        {{ $order->shipping_address_2 }}<br>
                                    @endif

                                    {{ $order->shipping_city ?? '' }}
                                    {{ $order->shipping_zip ?? '' }}<br>

                                    {{ $order->shipping_country ?? '' }}<br>

                                    Phone:
                                    {{ $order->shipping_phone ?? '' }}
                                </p>

                            </div>

                        </div>

                        {{-- Payment --}}
                        <div class="col-md-6 d-flex">

                            <div class="order-box w-100">

                                <h5>Payment Info</h5>

                                <p>

                                    Method:
                                    <span class="fw-bold">
                                        {{ $order->payment_method ?? 'N/A' }}
                                    </span>

                                    <br>

                                    Status:

                                    <span class="fw-bold
                                                    @if($order->payment_status == 'paid')
                                                        text-success
                                                    @else
                                                        text-danger
                                                    @endif">

                                        {{ ucfirst($order->payment_status ?? 'pending') }}

                                    </span>

                                    <br>

                                    Transaction ID:

                                    <span class="fw-bold">
                                        {{ $order->transaction_id ?? 'N/A' }}
                                    </span>

                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- Tracking --}}
                    <div class="order-box">

                        <h5>Order Tracking</h5>

                        <!-- <div class="timeline">

                                        <div class="timeline-step active">
                                            <span>✓</span>
                                            <p>Placed</p>
                                        </div>

                                        @if(in_array($order->status,['shipped','out_for_delivery','delivered']))
                                            <div class="timeline-step active">
                                                <span>✓</span>
                                                <p>Shipped</p>
                                            </div>
                                        @endif

                                        @if(in_array($order->status,['out_for_delivery','delivered']))
                                            <div class="timeline-step active">
                                                <span>✓</span>
                                                <p>Out</p>
                                            </div>
                                        @endif

                                        @if($order->status == 'delivered')
                                            <div class="timeline-step active">
                                                <span>✓</span>
                                                <p>Delivered</p>
                                            </div>
                                        @endif

                                    </div> -->

                        @php
                            $steps = [
                                'placed' => 'Placed',
                                'shipped' => 'Shipped',
                                'out_for_delivery' => 'Out For Delivery',
                                'delivered' => 'Delivered',
                            ];

                            $currentStep = array_search($order->status, array_keys($steps));
                        @endphp

                        <div class="timeline">

                            @foreach($steps as $key => $label)

                                @php
                                    $stepIndex = array_search($key, array_keys($steps));
                                @endphp

                                <div class="timeline-step {{ $stepIndex <= $currentStep ? 'active' : '' }}">
                                    <span>
                                        {{ $stepIndex <= $currentStep ? '✓' : '' }}
                                    </span>
                                    <p>{{ $label }}</p>
                                </div>

                            @endforeach

                        </div>


                    </div>


                    {{-- Actions --}}
                    <div class="order-box d-flex justify-content-between">

                        <a href="{{ route('orders.index') }}" class="customBtn01 blackBg">
                            Back
                        </a>

                        <div>

                            <a href="{{ route('orders.invoice', $order) }}" target="_blank" class="customBtn01 redBg">
                                Download Invoice
                            </a>

                            <a href="/products" class="customBtn01 blueBg">
                                Reorder
                            </a>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"
        integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '.rating-star', function () {

            let form = $(this).closest('form');

            let rating = $(this).data('rating');

            form.find('.selected_rating')

                .val(rating);

            form.find('.rating-star')

                .removeClass('checked');

            form.find('.rating-star')

                .each(function () {

                    if ($(this).data('rating') <= rating) {

                        $(this)

                            .addClass('checked');
                    }

                });

        });
    </script>
@endsection