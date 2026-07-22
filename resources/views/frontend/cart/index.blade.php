@extends('layouts.frontend')

@section('content')

    <section class="sectionPadding imageBackground02">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="text-center">
                        <h2 class="fw-bold welcomeUser">
                            <span class="text-red">Welcome</span>
                            {{ auth()->user()?->name ?? 'Guest' }}
                        </h2>
                    </div>

                    <div class="userProfileImage">

                        <a href="#" class="d-block shadow">
                            <img src="{{ auth()->user()?->image ? asset(auth()->user()->image) : asset('images/guest-user.jpg') }}"
                                alt="User" class="imgResponsive">

                        </a>
                        @auth
                        <div class="memberSince fw-bold">
                            Member Since {{ auth()->user()?->created_at->format('Y') }}
                        </div>
                        @endauth
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="sectionPadding profileInfoOuter">

        <div class="container">

            <div class="row">

                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        {{ session('success') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif

                @if(session('error'))

                    <div class="alert alert-danger alert-dismissible fade show">

                        {{ session('error') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif

                <!-- LEFT -->
                <div class="col-lg-8 d-flex">

                    <div class="shopCartBox">

                        <h5 class="mb-4">
                            Shopping Cart ({{ $cartItems->count() }} Items)
                        </h5>

                        <hr>

                        @php
                            $subtotal = 0;
                            $i = 1;
                        @endphp

                        @forelse($cartItems as $item)

                            @php
                                $product = $item->product;

                                $price = $item->price;

                                $total = $price * $item->quantity;

                                $subtotal += $total;
                            @endphp


                            <div class="row align-items-center mb-4 cart-item">

                                <div class="col-md-2">

                                    <img src="{{ $product->mainImage
                     ? asset('storage/' . $product->mainImage->image)
                     : asset('images/no-product.png') }}" class="product-img">

                                </div>

                                <div class="col-md-4">

                                    <h6>{{ $product->name }}</h6>

                                    <div class="productModel fw-semibold">
                                        Model #: {{ $product->sku ?? 'N/A' }}
                                    </div>

                                    <a href="javascript:void(0)" class="text-red remove-from-cart-btn"
                                        data-cart-item="{{ auth()->check() ? $item->id : $item->product_id }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>

                                </div>

                                <div class="col-md-2">

                                    <div class="qty-box">

                                        <button class="minus update-qty update_cart_quantity" data-type="minus"
                                            data-cart-item="{{ auth()->check() ? $item->id : $item->product_id }}">
                                            -
                                        </button>

                                        <input type="text" id="quantity_{{ $i }}" value="{{ $item->quantity }}"
                                            class="qty-input">

                                        <button class="plus update-qty update_cart_quantity" data-type="plus"
                                            data-cart-item="{{ auth()->check() ? $item->id : $item->product_id }}">
                                            +
                                        </button>

                                    </div>

                                </div>

                                <div class="col-md-2">

                                    @if($product->sale_price)

                                        <small class="text-red">
                                            <del>${{ number_format($product->price, 2) }}</del>
                                        </small>
                                        <br>

                                    @endif

                                    <strong>
                                        ${{ number_format($price, 2) }}
                                    </strong>

                                </div>

                                <div class="col-md-2 text-end">

                                    <strong>
                                        ${{ number_format($total, 2) }}
                                    </strong>

                                </div>

                            </div>

                            <hr>

                        @empty

                            <div class="text-center py-5">
                                <h5>Your cart is empty</h5>
                            </div>

                        @endforelse

                        <a href="{{ url('/categories') }}" class="customBtn01 bg-white text-blue">

                            ← Continue Shopping

                        </a>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="col-lg-4 d-flex">

                    <div class="shopCartBox greyBg sticky-summary w-100">

                        <h5>Order Summary</h5>

                        {{-- Coupon Box --}}

                        <div class="input-group coupon-box my-3">

                            <input type="text" id="offer_code" class="form-control mb-0" placeholder="Apply Coupon">

                            <button type="button" id="applyOfferBtn" class="btn btn-primary customBtn01 blueBg">

                                Apply

                            </button>

                        </div>


                        {{-- Success/Error Message --}}

                        <div id="offerMessage"></div>


                        {{-- Applied Coupon Badge --}}

                        <div id="offerBadge">

                            

                        </div>


                        {{-- Subtotal --}}

                        <div class="d-flex justify-content-between">

                            <span>Subtotal</span>

                            <span id="subtotalPrice">

                                ${{ number_format($summary['subtotal'], 2) }}

                            </span>

                        </div>


                        {{-- Discount --}}

                        <div class="d-flex justify-content-between">

                            <span>Discount</span>

                            <span id="discountPrice" class="text-success">

                                -${{ number_format($summary['discount'], 2) }}

                            </span>

                        </div>


                        {{-- Shipping --}}

                        <div class="d-flex justify-content-between">

                            <span>Shipping</span>

                            <span id="shippingPrice">

                            @if($cartItems->isNotEmpty())
                                ${{ number_format($summary['shipping'], 2) }}
                            @else
                                $0.00
                            @endif

                            </span>

                        </div>


                        {{-- Tax --}}

                        <div class="d-flex justify-content-between">

                            <span>Tax</span>

                            <span id="taxPrice">

                                ${{ number_format($summary['tax'], 2) }}

                            </span>

                        </div>


                        <hr>


                        {{-- Grand Total --}}

                        <div class="d-flex justify-content-between fw-bold">

                            <span>Total</span>

                            <span id="grandTotal" class="productPrice text-red">

                            @if($cartItems->isNotEmpty())
                                ${{ number_format($summary['grand_total'], 2) }}
                            @else
                                $0.00
                            @endif

                            </span>

                        </div>

                        @if($cartItems->isNotEmpty())

                            <a href="{{ url('/checkout') }}"
                            class="btn btn-primary w-100 mt-2 mt-md-3 customBtn01 redBg text-white">
                                Proceed to Checkout
                            </a>

                        @else

                            <button
                                type="button"
                                class="btn btn-secondary w-100 mt-2 mt-md-3 customBtn01"
                                disabled>
                                Proceed to Checkout
                            </button>

                        @endif


                        <small class="text-muted text-center d-block mt-2">

                            Safe & Secure Payments

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>



    $(document).on('click', '.remove-from-cart-btn', function (e) {

        e.preventDefault();

        let button = $(this);

        let productId = button.data('product-id');

        $.ajax({

            url: '/cart/remove/' + productId,

            method: 'POST',

            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {

                button.closest('.cart-item').remove();

                alert(response.message);

            }

        });

    });

</script>


<script>

    $(document).on('click', '.update_cart_quantity', function () {

        //e.preventDefault();
        let button = $(this);

        let type = button.data('type');

        let cartItemId = button.data('cart-item');

        let input = button.closest('.qty-box').find('.qty-input');

        let currentQty = parseInt(input.val());

        if (type == 'plus') {

            currentQty++;

        } else {

            if (currentQty > 1) {
                currentQty--;
            }

        }

        input.val(currentQty);

        // let button = $(this);

        // let productId = button.data('product-id');

        // let quantity = $("#quantity").val();

        $.ajax({

            url: '/cart/update-quantity',

            method: 'POST',

            data: {

                _token: $('meta[name="csrf-token"]').attr('content'),

                cart_item_id: cartItemId,

                quantity: currentQty

            },

            success: function (response) {
                updateHeaderCounts();
                location.reload();

            }

        });

    });


    $(document).on('click', '.remove-from-cart-btn', function () {

        let button = $(this);

        let cartItemId = button.data('cart-item');

        if (!confirm('Remove this item from cart?')) {
            return;
        }

        $.ajax({

            url: '/cart/remove-item',

            method: 'POST',

            data: {

                _token: $('meta[name="csrf-token"]').attr('content'),

                cart_item_id: cartItemId

            },

            success: function (response) {
                updateHeaderCounts();
                // Remove item row
                button.closest('.cart-item').remove();

                // Optional:
                location.reload();

            }

        });

    });

    $(document).on('click', '#applyOfferBtn', function (e) {

        e.preventDefault();



        let offerCode = $('#offer_code').val();

        if (offerCode == '') {

            return;
        }

        $.ajax({

            url: '/cart/apply-offer',

            method: 'POST',

            data: {

                _token: $('meta[name="csrf-token"]').attr('content'),

                offer_code: offerCode

            },

            beforeSend: function () {

                $('#applyOfferBtn')

                    .prop('disabled', true)

                    .html('Applying...');
            },

            success: function (response) {

                $('#applyOfferBtn')

                    .prop('disabled', false)

                    .html('Apply');

                if (response.status) {

                    let d = response.data;

                    $('#subtotalPrice').html('$' + d.subtotal);

                    $('#discountPrice').html('-$' + d.discount);

                    $('#shippingPrice').html('$' + d.shipping);

                    $('#taxPrice').html('$' + d.tax);

                    $('#grandTotal').html('$' + d.grand_total);

                    $('#offerMessage').html(`
            <div class="alert alert-success">

                ${response.message}

            </div>
        `);

                    let offerText = response.offer.discount_type == 'percentage'

                        ? response.offer.discount_value + '% OFF'

                        : '$' + response.offer.discount_value + ' OFF';

                    $('#offerBadge').html(`

            <div class="alert alert-success d-flex justify-content-between align-items-center">

                <div>

                    🎉 <strong>${response.offer.offer_code}</strong>

                    (${offerText})

                </div>

                <button
                    type="button"
                    id="removeCouponBtn"
                    class="btn btn-sm btn-danger">

                    Remove

                </button>

            </div>

        `);

                } else {

                    $('#offerMessage').html(`

            <div class="alert alert-danger">

                ${response.message}

            </div>

        `);

                }

            },

            error: function () {

                $('#applyOfferBtn')

                    .prop('disabled', false)

                    .html('Apply');

            }

        });

    });

    $(document).on('click', '#removeCouponBtn', function (e) {

        e.preventDefault();

        $.ajax({

            url: '/cart/remove-offer',

            type: 'POST',

            data: {

                _token: $('meta[name="csrf-token"]').attr('content')

            },

            beforeSend: function () {

                $('#removeCouponBtn')

                    .prop('disabled', true)

                    .html('Removing...');
            },

            success: function (response) {

                if (response.status) {

                    location.reload();
                }

            },

            error: function () {

                $('#removeCouponBtn')

                    .prop('disabled', false)

                    .html('Remove');

                //alert('Unable to remove coupon.');

            }

        });

    });
</script>