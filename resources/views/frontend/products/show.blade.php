@extends('layouts.frontend')

@section('content')

   <section class="sectionPadding">
      <div class="container">
         <div class="row">
            <div class="col-md-4 col-lg-5">
               <!-- <div class="productLargeThumb positionRelative">
                           <img class="imgResponsive" src="{{ $product->mainImage
                              ? asset('storage/' . $product->mainImage->image)
                              : asset('images/no-product.png') }}">
                        </div> -->
               <div class="productLargeThumb positionRelative">
                  <img id="mainProductImage" class="imgResponsive" src="{{ $product->mainImage
      ? asset('storage/' . $product->mainImage->image)
      : asset('images/no-product.png') }}">
               </div>
               <div class="productThumbnailList mb-4 mb-md-2">

                  @foreach($product->images as $img)
                     <div class="thumbImg {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $img->image) }}" data-image="{{ asset('storage/' . $img->image) }}"
                           class="imgResponsive thumbnailImage">
                     </div>
                  @endforeach

               </div>
            </div>
            <div class="col-md-8 col-lg-7">
               <div class="productDetail">
                  <h2>{{ $product->name }}</h2>
                  <div class="productModel fw-semibold">
                     Model #: <span id="productSku">{{ $product->sku ?? 'N/A' }}</span>
                  </div>

@if($product->variants->count())

<div class="productVariants mb-4">

    <h5 class="fw-bold mb-3">Available Options</h5>

    @foreach($product->variants as $variant)

        <label class="variantBox d-flex align-items-center mb-2">

            <input
                type="radio"
                name="variant_id"
                value="{{ $variant->id }}"
                class="variant-radio me-2"
                data-price="{{ $variant->price }}"
                data-sku="{{ $variant->sku }}"
                data-stock="{{ $variant->stock }}"
                {{ $loop->first ? 'checked' : '' }}>

            <div>

                <div class="fw-semibold">
                    {{ $variant->variant_name }}
                </div>

                <small class="text-muted">

                    @foreach($variant->variantAttributes as $variantAttribute)

                        {{ $variantAttribute->attribute->name }}
                        :
                        {{ $variantAttribute->attribute->value }}

                        @if(!$loop->last)
                            |
                        @endif

                    @endforeach

                </small>

            </div>

        </label>

    @endforeach

</div>

@endif


                  <div class="productRating">
                     @php
                        $rating = round($product->reviews_avg_rating ?? 0);
                     @endphp

                     @for($i = 1; $i <= 5; $i++)
                        @if($i <= $rating)
                           ⭐
                        @else
                           ☆
                        @endif
                     @endfor

                     <small class="text-muted">
                        {{ number_format($product->reviews_avg_rating ?? 0, 1) }}
                        ({{ $product->reviews_count ?? 0 }} {{ Str::plural('Review', $product->reviews_count ?? 0) }})
                     </small>
                  </div>

                  <div class="productPrice text-red fw-bold" id="productPrice">
                     ${{ number_format($product->price, 2) }}
                  </div>
                  <div class="smallDesc">
                     {!! $product->description ?? '<p>No description available.</p>' !!}
                  </div>
                  <div id="successMessage" class="success-message" style="display:none;"></div>
                  <div class="cart-box">
                     <!-- Quantity Box -->
                     <div class="qty-box">
                        <button onclick="minus_cart_quantity();">-</button>
                        <input type="number" id="quantity" value="1" min="1">
                        <button onclick="plus_cart_quantity();">+</button>
                     </div>
                     <!-- Add to Cart -->
                     <!-- <button class="customBtn01 redBg text-white">Add to Cart</button> -->
                     <!-- <button type="button" class="customBtn01 redBg text-white add-to-cart-btn"
                        data-product-id="{{ $product->id }}">

                        ADD TO CART

                     </button> -->

                     <button
                        type="button"
                        class="customBtn01 redBg text-white add-to-cart-btn"
                        data-product-id="{{ $product->id }}"
                        data-variant-id="">
                        ADD TO CART
                     </button>

                     <button class="customBtn01 blueBg add-to-wishlist" data-product-id="{{ $product->id }}">
                        {{ auth()->check() && auth()->user()->favoriteProducts->contains($product->id)
      ? 'Remove from Wishlist'
      : 'Add to Wishlist' }}

                     </button>
                  </div>
                  <div class="shipBy w-100 borderTop">
                     <h6>Ships Same Day</h6>
                     <div class="d-flex mb-2">
                        <form method="POST" action="{{ route('delivery.check') }}">
                           @csrf

                           <input type="text" name="zip_code" placeholder="Enter Zip Code" required>

                           <input type="hidden" name="product_id" value="{{ $product->id }}">

                           <button type="submit" class="customBtn01 redBg">
                              SAVE
                           </button>
                        </form>
                     </div>
                     <!-- <p class="d-none mb-2">Ship to 16001 | <a href="#">Change zipcode</a></p>
                              <p>Estimated delivery to <strong>16001</strong> by <strong>23rd Apr 2026</strong></p> -->

                     @if(session()->has('delivery_zip'))

                        <p class="mb-2">
                           Ship to {{ session('delivery_zip') }}
                           <!-- |
                                             <a href="#" id="changeZipCode">Change zipcode</a> -->
                        </p>

                        <p>
                           Estimated delivery to
                           <strong>{{ session('delivery_zip') }}</strong>
                           by
                           <strong>{{ session('delivery_date') }}</strong>
                        </p>
                     
                        @else

                        <div class="alert alert-warning mb-0">
                           <i class="fa fa-exclamation-circle me-2"></i>
                           <strong>Delivery Unavailable</strong><br>
                           Sorry, we currently do not deliver to the ZIP code you entered. Please try a different ZIP code or contact our support team for assistance.
                        </div>

                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="sectionPadding productDetailInfo pt-3">
      <div class="container">
         <!-- Tabs Nav (Desktop) -->
         <ul class="nav nav-tabs d-none d-md-flex" id="myTab" role="tablist">
            <li class="nav-item">
               <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#description">Description</button>
            </li>
            <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#specifications">Specifications</button>
            </li>
            <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button>
            </li>
            <li class="nav-item">
               <button class="nav-link" data-bs-toggle="tab" data-bs-target="#questionsAnswers">Questions &amp; Answers
               </button>
            </li>
         </ul>
         <!-- Tab Content / Accordion -->
         <div class="tab-content accordion" id="accordionProductDetail">
            <!-- Item 1 -->
            <div class="tab-pane fade show active accordion-item" id="description">
               <h2 class="accordion-header d-md-none">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                     Description
                  </button>
               </h2>
               <div id="collapse1" class="accordion-collapse collapse show d-md-block">
                  <div class="accordion-body">
                     {!! $product->description !!}
                  </div>
               </div>
            </div>
            <!-- Item 2 -->
            <!-- <div class="tab-pane fade accordion-item" id="specifications">
               <h2 class="accordion-header d-md-none">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                     data-bs-target="#collapse2">
                     Specifications11
                  </button>
               </h2>
               <div id="collapse2111" class="accordion-collapse collapse d-md-block">
                  <div class="accordion-body">
                     {!! $product->other ?? '<p>No additional details available.</p>' !!}
                  </div>
               </div>
            </div> -->

            <div class="tab-pane fade accordion-item" id="specifications">
               <h2 class="accordion-header d-md-none">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse2">
                        Specifications
                  </button>
               </h2>

               <div id="collapse2" class="accordion-collapse collapse d-md-block">
                  <div class="accordion-body">
                        <!-- <h5 class="text-red">Weights &amp; Dimensions</h5> -->
                        
                        @if($product->attributes->count())
                           <table class="spec-table">
                              <!-- <tbody> -->
                                    @foreach($product->attributes as $attribute)
                                       <tr>
                                          <td>{{ $attribute->name }}</td>
                                          <td>{{ $attribute->value }}</td>
                                       </tr>
                                    @endforeach
                              <!-- </tbody> -->
                           </table>
                        @else
                           <p>No additional details available.</p>
                        @endif
                           
                  </div>
               </div>
            </div>
            <!-- Item 3 -->
            <div class="tab-pane fade accordion-item" id="reviews">

               <h2 class="accordion-header d-md-none">

                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                     data-bs-target="#collapse3">

                     Reviews

                  </button>

               </h2>

               <div id="collapse3" class="accordion-collapse collapse d-md-block">

                  <div class="accordion-body">

                     {{-- NO REVIEWS --}}
                     @if($product->reviews->count() <= 0)

                        <div class="noReview mt-0 mt-md-2">

                           <h6>There are no reviews yet.</h6>

                           <h3 class="mt-0 mt-md-3">
                              Be the first to review "{{ $product->name }}"
                           </h3>

                           <p>
                              Your email address will not be published.
                              Required fields are marked *
                           </p>

                        </div>

                     @endif

                     {{-- REVIEW LIST --}}
                     <div class="reviewListing">

                        @foreach($product->reviews as $review)

                           <div class="productReview {{ !$loop->first ? 'borderTop' : '' }}">

                              <h6 class="reviewUsername">

                                 {{ $review->user->name ?? 'User' }}

                              </h6>

                              <div class="productRating productRatingLarge mb-2">

                                 @for($i = 1; $i <= 5; $i++)

                                    <span class="fa fa-star {{ $i <= $review->rating ? 'checked' : '' }}"></span>

                                 @endfor

                                 <span class="verified">
                                    Verified Purchase
                                 </span>

                              </div>

                              @if($review->title)

                                 <h5 class="reviewSubject mb-1">
                                    {{ $review->title }}
                                 </h5>

                              @endif

                              <p>
                                 {{ $review->review }}
                              </p>

                           </div>

                        @endforeach

                     </div>

                     {{-- REVIEW FORM --}}
                     <div class="reviewForm">

                        @if(session('success'))

                           <div class="alert alert-success">
                              {{ session('success') }}
                           </div>

                        @endif

                        <form action="{{ route('product.review.store') }}" method="POST">

                           @csrf

                           <input type="hidden" name="product_id" value="{{ $product->id }}">

                           <input type="hidden" name="rating" id="selected_rating" value="5">

                           <div class="form-group mb-3">

                              <label>
                                 Your Rating <span>*</span>
                              </label>

                              <div class="productRating productRatingLarge mb-2">

                                 <span class="fa fa-star checked rating-star" data-rating="1"></span>

                                 <span class="fa fa-star checked rating-star" data-rating="2"></span>

                                 <span class="fa fa-star checked rating-star" data-rating="3"></span>

                                 <span class="fa fa-star checked rating-star" data-rating="4"></span>

                                 <span class="fa fa-star checked rating-star" data-rating="5"></span>

                              </div>

                           </div>

                           @guest

                              <div class="alert alert-warning">

                                 Please login to submit review.

                              </div>

                           @else

                              <div class="form-group">

                                 <label>
                                    Review Title
                                 </label>

                                 <input type="text" name="title" class="form-control">

                              </div>

                              <div class="form-group">

                                 <label>
                                    Your Review <span>*</span>
                                 </label>

                                 <textarea name="review" rows="6" class="form-control" required></textarea>

                              </div>

                              <div>

                                 <button type="submit"
                                    class="mt-2 submitBtn btn-lg btn-block customBtn01 redBg d-inline-block">

                                    SUBMIT

                                 </button>

                              </div>

                           @endguest

                        </form>

                     </div>

                  </div>

               </div>

            </div>
            <!-- Item 4 -->
            <div class="tab-pane fade accordion-item" id="questionsAnswers">
               <h2 class="accordion-header d-md-none">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                     data-bs-target="#collapse4">
                     Questions & Answers
                  </button>
               </h2>
               <div id="collapse4" class="accordion-collapse collapse d-md-block">
                  <div class="accordion-body">
                     @if($product->questions->count())

                        <div class="qaList mt-2">

                           @foreach($product->questions as $index => $qa)

                              <div class="qa {{ $index > 0 ? 'borderTop' : '' }}">

                                 <h5 class="mb-1">
                                    {{ $index + 1 }}) {{ $qa->question }}
                                 </h5>

                                 <p>
                                    {!! nl2br(e($qa->answer)) !!}
                                 </p>

                              </div>

                           @endforeach

                        </div>

                     @else

                        <div class="alert alert-light">
                           No questions available for this product.
                        </div>

                     @endif
                     <!-- <div class="qaList mt-2">
                                 <div class="qa">
                                    <h5 class="mb-1">1) What is the shipping cost for this pallet jack?</h5>
                                    <p>Ideal for use in construction, manufacturing, retail, and more, the Global Industrial™
                                       Industrial-Duty Pallet Jack Truck is equipped with a strong & durable reinforced steel frame
                                       and a German-engineered pump that allows users to raise and lower pallets or skids up to
                                       5,500 lbs with ease.</p>
                                 </div>
                                 <div class="qa borderTop">
                                    <h5 class="mb-1">2) Could you please tell me where this pallet jack is made? I need it's point
                                       of origin for my customs paperwork.</h5>
                                    <p>Ideal for use in construction, manufacturing, retail, and more, the Global Industrial™
                                       Industrial-Duty Pallet Jack Truck is equipped with a strong & durable reinforced steel frame.
                                    </p>
                                 </div>
                                 <div class="qa borderTop">
                                    <h5 class="mb-1">3) Do you have a parts diagram for this pallet jacK?</h5>
                                    <p>With over 75 years of experience and hundreds of thousands of products, Global Industrial
                                       continues to be the source for industrial equipment and supplies that keep your business
                                       running efficiently. Serving all of North America, Global Industrial offers a vast selection
                                       of hand-picked and tested industrial-strength products, including material handling, storage
                                       & shelving, safety & security, janitorial & facility maintenance, and HVAC & fans. </p>
                                 </div>
                              </div> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="sectionPadding greyBg">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="headingBlock underLineHeading d-flex align-items-center justify-content-between">
                  <h2>Explore Related Products</h2>
                  <a href="/categories" class="customBtn01 blackBg">View All</a>
               </div>
            </div>
            <div class="productList">
               <div class="row">
                  @if(isset($relatedProducts) && $relatedProducts->count())
                     @foreach($relatedProducts as $rel)
                              <div class="d-flex col-md-3">
                                 <div class="product w-100">

                                    <div class="productThumb positionRelative">
                                       <img class="imgResponsive" src="{{ $rel->mainImage
                        ? asset('storage/' . $rel->mainImage->image)
                        : asset('images/no-product.png') }}">

                                       <div class="actionBtn">
                                          <button onclick="window.location.href='{{ route('products.show', $rel->slug) }}'"
                                             class="customBtn01 mt-2 me-1 bg-white text-blue">
                                             Quick View
                                          </button>

                                          <button class="customBtn01 mt-2 redBg text-white">
                                             Add to Cart
                                          </button>
                                       </div>
                                    </div>

                                    <div class="productInfo">
                                       <h6>{{ $rel->name }}</h6>

                                       <div class="productModel fw-semibold">
                                          Model #: {{ $rel->sku ?? 'N/A' }}
                                       </div>

                                       <div class="productPrice text-red fw-bold">
                                          ${{ number_format($rel->price, 2) }}
                                       </div>
                                    </div>

                                 </div>
                              </div>
                     @endforeach
                  @else
                     <div class="col-12">
                        <p class="text-center">No related products</p>
                     </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="sectionPadding">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="headingBlock underLineHeading d-flex align-items-center justify-content-between">
                  <h2>Recently Viewed</h2>
               </div>
            </div>
         </div>

         <div class="productList">
            <div class="row">

               @if(isset($recentlyViewed) && $recentlyViewed->count())
                  @foreach($recentlyViewed as $recent)
                        <div class="d-flex col-md-3">
                           <div class="product w-100">

                              <div class="productThumb positionRelative">
                                 <img class="imgResponsive" src="{{ $recent->mainImage
                     ? asset('storage/' . $recent->mainImage->image)
                     : asset('images/no-product.png') }}">

                                 <div class="actionBtn">
                                    <button onclick="window.location.href='{{ route('products.show', $recent->slug) }}'"
                                       class="customBtn01 mt-2 me-1 bg-white text-blue">
                                       Quick View
                                    </button>

                                    <button class="customBtn01 mt-2 redBg text-white">
                                       Add to Cart
                                    </button>
                                 </div>
                              </div>

                              <div class="productInfo">
                                 <h6>{{ $recent->name }}</h6>

                                 <div class="productModel fw-semibold">
                                    Model #: {{ $recent->sku ?? 'N/A' }}
                                 </div>

                                 <div class="productPrice text-red fw-bold">
                                    ${{ number_format($recent->price, 2) }}
                                 </div>
                              </div>

                           </div>
                        </div>
                  @endforeach
               @else
                  <div class="col-12">
                     <p class="text-center">No recently viewed products</p>
                  </div>
               @endif

            </div>
         </div>
      </div>
   </section>
   <!-- <section class="newsLetterBlock greyBg sectionPadding">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12 col-lg-6 d-flex align-items-center">
                        <div class="w-100">
                           <h2 class="fw-bold">Be the first to know about our daily sales!</h2>
                           <p class="mb-lg-0 pe-lg-4">Subscribe to our newsletters now and stay up-to-date with new collections, the
                              latest lookbooks.</p>
                        </div>
                     </div>
                     <div class="col-md-12 col-lg-6 d-flex align-items-center">
                        <div class="input-group subscribeNews ps-lg-3">
                           <input type="text" class="form-control form-control-lg text-end-0" id=""
                              placeholder="Enter Email Address">
                           <button class="btn btn-lg customBtn01 redBg" type="submit" id="btnSearch">SubScribe</button>
                        </div>
                     </div>
                  </div>
               </div>
            </section> -->

   @include('frontend.partials.subscribe')

@endsection

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

   $(document).ready(function () {
      const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 3000,
         timerProgressBar: true
      });
      $(document).on('click', '.add-to-wishlist', function (e) {

         e.preventDefault();

         let button = $(this);

         let productId = button.data('product-id');

         console.log(productId);

         $.ajax({

            url: '/favorite/toggle/' + productId,

            type: 'POST',

            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function (response) {

               // console.log(response);
               updateHeaderCounts();
               if (response.status == 'added') {

                  button.text('REMOVE FROM WISHLIST');
                  Toast.fire({
                     icon: 'success',
                     title: 'Added to Wishlist ❤️'
                  });

               } else {

                  button.text('Add to Wishlist');
                  Toast.fire({
                     icon: 'info',
                     title: 'Removed from Wishlist'
                  });

               }

            },

            error: function (xhr) {

               console.log(xhr.responseText);

               alert('AJAX Error');

            }

         });

      });

   });

</script>


<script>

   $(document).on('click', '.add-to-cart-btn', function (e) {

      e.preventDefault();

      let button = $(this);

      let productId = button.data('product-id');
//console.log($('input[name="variant_id"]:checked').val());
      let quantity = $("#quantity").val();

      $.ajax({

         url: '/cart/add/' + productId,

         method: 'POST',

         data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            quantity: quantity,
            product_id: $(this).data('product-id'),
            variant_id: $('input[name="variant_id"]:checked').val(),
         },

         success: function (response) {
            updateHeaderCounts();
            $('#successMessage')
               .html(response.message)
               .fadeIn();

            setTimeout(function () {
               $('#successMessage').fadeOut();
            }, 5000);

         }

      });

   });



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
            updateHeaderCounts();
            button.closest('.cart-item').remove();

            alert(response.message);

         }

      });

   });

   $(document).on('click', '.rating-star', function () {

      let rating = $(this).data('rating');

      $('#selected_rating').val(rating);

      $('.rating-star').removeClass('checked');

      $('.rating-star').each(function () {

         if ($(this).data('rating') <= rating) {

            $(this).addClass('checked');

         }

      });

   });
</script>


<script>
   function minus_cart_quantity() {
      let input = $('#quantity');

      let currentVal = parseInt(input.val());

      if (currentVal > 1) {
         input.val(currentVal - 1);
      }
   }

   function plus_cart_quantity() {
      let input = $('#quantity');

      let currentVal = parseInt(input.val());

      input.val(currentVal + 1);
   }
</script>

<script>
   $(document).ready(function () {

      $('.thumbnailImage').click(function () {

         let imageUrl = $(this).data('image');

         $('#mainProductImage').attr('src', imageUrl);

         $('.thumbImg').removeClass('active');

         $(this).closest('.thumbImg').addClass('active');
      });

   });

   $(document).on('change','.variant-radio',function(){

      $('#productPrice').html('$'+parseFloat($(this).data('price')).toFixed(2));

      $('#productSku').html($(this).data('sku'));

      //$('#productStock').html($(this).data('stock'));

   });
</script>