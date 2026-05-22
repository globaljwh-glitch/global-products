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

                        <img
                            src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('images/user-image.jpg') }}"
                            alt="User"
                            class="imgResponsive"
                        >

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

                                <img
                                    src="{{ asset($product->thumbnail ?? 'images/no-image.png') }}"
                                    class="product-img"
                                >

                            </div>

                            <div class="col-md-4">

                                <h6>{{ $product->name }}</h6>

                                <div class="productModel fw-semibold">
                                    Model #: {{ $product->sku ?? 'N/A' }}
                                </div>

                                <a href="{{ route('cart.remove', $item->id) }}" 
                                   class="text-red remove-from-cart-btn">

                                    <i class="fa-solid fa-trash-can"></i>

                                </a>

                            </div>

                            <div class="col-md-2">

                                <div class="qty-box">

                                    <button 
                                        class="minus update-qty update_cart_quantity"
                                        data-type="minus"
                                        data-cart-item="{{ $item->id }}"
                                    >
                                        -
                                    </button>

                                    <input
                                        type="text" id="quantity_{{ $i }}"
                                        value="{{ $item->quantity }}"
                                        class="qty-input"
                                    >

                                    <button 
                                        class="plus update-qty update_cart_quantity"
                                        data-type="plus"
                                        data-cart-item="{{ $item->id }}"
                                    >
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

                    <a href="{{ url('/') }}"
                       class="customBtn01 bg-white text-blue">

                        ← Continue Shopping

                    </a>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="col-lg-4 d-flex">

                <div class="shopCartBox greyBg sticky-summary w-100">

                    <h5>Order Summary</h5>

                    <div class="input-group coupon-box my-3">

                        <input type="text"
                               class="form-control mb-0"
                               placeholder="Apply Coupon">

                        <button class="btn btn-primary customBtn01 blueBg">
                            Apply
                        </button>

                    </div>

                    @php
                        $discount = 0;
                        $shipping = 25;
                        $tax = 25;

                        $grandTotal = $subtotal - $discount + $shipping + $tax;
                    @endphp

                    <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span>${{ number_format($subtotal, 2) }}</span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span>Discount</span>
                        <span class="text-success">
                            -${{ number_format($discount, 2) }}
                        </span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span>${{ number_format($shipping, 2) }}</span>
                    </div>

                    <div class="d-flex justify-content-between">
                        <span>Tax (GST)</span>
                        <span class="fw-bold">
                            ${{ number_format($tax, 2) }}
                        </span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fw-bold">

                        <span>Total</span>

                        <span class="productPrice text-red">
                            ${{ number_format($grandTotal, 2) }}
                        </span>

                    </div>

                    <a href="{{ url('/checkout') }}"
                       class="btn btn-primary w-100 mt-2 mt-md-3 customBtn01 redBg text-white">

                        Proceed to Checkout

                    </a>

                    <small class="text-muted text-center d-block mt-2">
                        Safe & Secure Payments
                    </small>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="sectionPadding imageBackground02">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="text-center">
                     <h2 class="fw-bold welcomeUser"><span class="text-red">Welcome</span> User Name</h2>
                  </div>
                  <div class="userProfileImage">
                     <a href="#" class="d-block shadow"><img src="images/user-image.jpg" alt="User" class="imgResponsive"></a>
                     <div class="memberSince fw-bold">Member Since 2026</div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="sectionPadding profileInfoOuter">
         <div class="container">
            <div class="row ">
               <!-- LEFT: CART ITEMS -->
               <div class="col-lg-8 d-flex">
                  <div class="shopCartBox">
                     <h5 class="mb-4">Shopping Cart (3 Items)</h5>
                     <hr>
                     <!-- ITEM 1 -->
                     <div class="row align-items-center mb-4">
                        <div class="col-md-2">
                           <img src="images/products/product-thumb-02.jpg" class="product-img">
                        </div>
                        <div class="col-md-4">
                           <h6>Nexel® Stem Casters Set (4), 5" Polyurethane Wheel, 2 with Brakes, 1200 Lb Capacity</h6>
                           <div class="productModel fw-semibold">Model #: WB500592</div>
                           <a href="#" class="text-red"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                        <div class="col-md-2">
                           <div class="qty-box">
                              <button>-</button>
                              <input type="text" value="2">
                              <button>+</button>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <small class="text-red"><del>$35.95</del></small><br>
                           <strong>$30.95</strong>
                        </div>
                        <div class="col-md-2 text-end">
                           <strong>$61.90</strong>
                        </div>
                     </div>
                     <hr>
                     <!-- ITEM 2 -->
                     <div class="row align-items-center mb-4">
                        <div class="col-md-2">
                           <img src="images/products/product-thumb-03.jpg" class="product-img">
                        </div>
                        <div class="col-md-4">
                           <h6>L-Desks with Adjustable Height Return</h6>
                           <div class="productModel fw-semibold">Model #: WB761215PF</div>
                           <a href="#" class="text-red"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                        <div class="col-md-2">
                           <div class="qty-box">
                              <button>-</button>
                              <input type="text" value="1">
                              <button>+</button>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <strong>$45.75</strong>
                        </div>
                        <div class="col-md-2 text-end">
                           <strong>$45.75</strong>
                        </div>
                     </div>
                     <hr>
                     <!-- ITEM 3 -->
                     <div class="row align-items-center mb-4">
                        <div class="col-md-2">
                           <img src="images/products/product-thumb-04.jpg" class="product-img">
                        </div>
                        <div class="col-md-4">
                           <h6>Pure Flow 1000® Eyewash Station Self-contained unit collects used eyewash solution</h6>
                           <div class="productModel fw-semibold">Model #: WB761215PF</div>
                           <a href="#" class="text-red"><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                        <div class="col-md-2">
                           <div class="qty-box">
                              <button>-</button>
                              <input type="text" value="1">
                              <button>+</button>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <strong>$45.75</strong>
                        </div>
                        <div class="col-md-2 text-end">
                           <strong>$45.75</strong>
                        </div>
                     </div>
                     <hr>
                     <!-- CONTINUE SHOPPING -->
                     <a href="#" class="customBtn01 bg-white text-blue">
                     ← Continue Shopping
                     </a>
                  </div>
               </div>
               <!-- RIGHT: SUMMARY -->
               <div class="col-lg-4 d-flex">
                  <div class="shopCartBox greyBg sticky-summary w-100">
                     <h5>Order Summary</h5>
                     <!-- Coupon -->
                     <div class="input-group coupon-box my-3">
                        <input type="text" class="form-control mb-0" placeholder="Apply Coupon">
                        <button class="btn btn-primary customBtn01 blueBg">Apply</button>
                     </div>
                     <!-- Price -->
                     <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span>$153.40</span>
                     </div>
                     <div class="d-flex justify-content-between">
                        <span>Discount</span>
                        <span class="text-success">-$20</span>
                     </div>
                     <div class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span>$25</span>
                     </div>
                     <div class="d-flex justify-content-between">
                        <span>Tax (GST)</span>
                        <span class="fw-bold">$25</span>
                     </div>
                     <hr>
                     <div class="d-flex justify-content-between fw-bold">
                        <span>Total</span>
                        <span class="productPrice text-red">$183.40</span>
                     </div>
                     <a href="checkout.html" class="btn btn-primary w-100 mt-2 mt-md-3 customBtn01 redBg text-white">
                     Proceed to Checkout
                     </a>
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

$(document).on('click', '.remove-from-cart-btn', function(e){

    e.preventDefault();

    let button = $(this);

    let productId = button.data('product-id');

    $.ajax({

        url: '/cart/remove/' + productId,

        method: 'POST',

        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },

        success: function(response){

            button.closest('.cart-item').remove();

            alert(response.message);

        }

    });

});

</script>


<script>

    $(document).on('click', '.update_cart_quantity', function(){

        //e.preventDefault();
        let button = $(this);

        let type = button.data('type');

        let cartItemId = button.data('cart-item');

        let input = button.closest('.qty-box').find('.qty-input');

        let currentQty = parseInt(input.val());

        if(type == 'plus') {

            currentQty++;

        } else {

            if(currentQty > 1) {
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

            success: function(response){

                location.reload();

            }

        });

    });
</script>