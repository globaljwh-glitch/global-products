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
                  <img
                     id="mainProductImage"
                     class="imgResponsive"
                     src="{{ $product->mainImage
                           ? asset('storage/' . $product->mainImage->image)
                           : asset('images/no-product.png') }}">
               </div>
               <div class="productThumbnailList mb-4 mb-md-2">

                  @foreach($product->images as $img)
                     <div class="thumbImg {{ $loop->first ? 'active' : '' }}">
                        <img
                              src="{{ asset('storage/' . $img->image) }}"
                              data-image="{{ asset('storage/' . $img->image) }}"
                              class="imgResponsive thumbnailImage">
                     </div>
                  @endforeach

               </div>
            </div>
            <div class="col-md-8 col-lg-7">
               <div class="productDetail">
                  <h2>{{ $product->name }}</h2>
                  <div class="productModel fw-semibold">
                     Model #: {{ $product->sku ?? 'N/A' }}
                  </div>
                  <div class="productRating">
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star checked"></span>
                     <span class="fa fa-star"></span>
                     <span class="fa fa-star"></span>
                  </div>

                  <div class="productPrice text-red fw-bold">
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
                     <button 
                        type="button"
                        class="customBtn01 redBg text-white add-to-cart-btn"
                        data-product-id="{{ $product->id }}">

                        ADD TO CART

                     </button>
                     <button class="customBtn01 blueBg add-to-wishlist"
                        data-product-id="{{ $product->id }}">
                        {{ auth()->check() && auth()->user()->favoriteProducts->contains($product->id)
        ? 'Remove from Wishlist'
        : 'Add to Wishlist' }}
                        
                     </button>
                  </div>
                  <div class="shipBy w-100 borderTop">
                     <h6>Ships Same Day</h6>
                     <div class="d-flex mb-2">
                        <input type="text" id="" value="Enter Zip Code">
                        <button class="customBtn01 redBg">Save</button>
                     </div>
                     <p class="d-none mb-2">Ship to 16001 | <a href="#">Change zipcode</a></p>
                     <p>Estimated delivery to <strong>16001</strong> by <strong>23rd Apr 2026</strong></p>
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
            <div class="tab-pane fade accordion-item" id="specifications">
               <h2 class="accordion-header d-md-none">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                     data-bs-target="#collapse2">
                     Specifications
                  </button>
               </h2>
               <div id="collapse2" class="accordion-collapse collapse d-md-block">
                  <div class="accordion-body">
                     {!! $product->other ?? '<p>No additional details available.</p>' !!}
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
                     <div class="noReview mt-0 mt-md-2">
                        <h6>There are no reviews yet.</h6>
                        <h3 class="mt-0 mt-md-3">Be the first to review “Product Name”</h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                     </div>
                     <div class="reviewListing">
                        <div class="productReview">
                           <h6 class="reviewUsername">Ramankant Vashisht</h6>
                           <div class="productRating productRatingLarge mb-2">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="verified">Verified Purchase</span>
                           </div>
                           <h5 class="reviewSubject mb-1">Great Service</h5>
                           <p>Very well packed and tied down to a pallet for safe travel. Exactly as described and works
                              very well. I could have used shorter forks (as short as 24”) but anything shorter was higher
                              cost. </p>
                        </div>
                        <div class="productReview borderTop">
                           <h6 class="reviewUsername">Tony</h6>
                           <div class="productRating productRatingLarge mb-2">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star "></span>
                           </div>
                           <h5 class="reviewSubject mb-1">Very please with pallet jack!!</h5>
                           <p>Very pleased with this purchase. Pallet jack has a very smooth operation, was packaged very
                              well and delivered very promptly.</p>
                        </div>
                        <div class="productReview borderTop">
                           <h6 class="reviewUsername">Pavani</h6>
                           <div class="productRating productRatingLarge mb-2">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star "></span>
                              <span class="fa fa-star "></span>
                              <span class="verified">Verified Purchase</span>
                           </div>
                           <h5 class="reviewSubject mb-1">Quick Delivery</h5>
                           <p>The Pallet jack is very well made, the welds are nearly perfect and I believe it will give us
                              many years of service.</p>
                        </div>
                     </div>
                     <div class="reviewForm">
                        <div class="form-group mb-3">
                           <label>Your Rating <span>*</span></label>
                           <div class="productRating productRatingLarge mb-2">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star "></span>
                              <span class="fa fa-star "></span>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Your Name <span>*</span></label>
                                 <input class="form-control" type="text" value="" name="name">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Your Email <span>*</span></label>
                                 <input class="form-control" type="text" value="" name="name">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label>Your Review <span>*</span></label>
                           <textarea name="interests" rows="9" class="form-control"></textarea>
                        </div>
                        <div>
                           <button type="submit"
                              class="mt-2 submitBtn btn-lg btn-block customBtn01 redBg d-inline-block">SUBMIT</button>
                        </div>
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
                  <a href="/products" class="customBtn01 blackBg">View All</a>
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
<script>

$(document).ready(function(){

    $(document).on('click', '.add-to-wishlist', function(e){

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

            success: function(response){

                console.log(response);

                if(response.status == 'added'){

                    button.text('REMOVE FROM WISHLIST');

                }else{

                    button.text('Add to Wishlist');

                }

            },

            error: function(xhr){

                console.log(xhr.responseText);

                alert('AJAX Error');

            }

        });

    });

});

</script>


<script>

$(document).on('click', '.add-to-cart-btn', function(e){

    e.preventDefault();

    let button = $(this);

    let productId = button.data('product-id');

    let quantity = $("#quantity").val();

    $.ajax({

        url: '/cart/add/' + productId,

        method: 'POST',

        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            quantity: quantity
        },

        success: function(response){

            $('#successMessage')
               .html(response.message)
               .fadeIn();

            setTimeout(function () {
               $('#successMessage').fadeOut();
            }, 5000);

        }

    });

});



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
function minus_cart_quantity() {
   let input = $('#quantity');

   let currentVal = parseInt(input.val());

   if(currentVal > 1) {
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
$(document).ready(function() {

    $('.thumbnailImage').click(function() {

        let imageUrl = $(this).data('image');

        $('#mainProductImage').attr('src', imageUrl);

        $('.thumbImg').removeClass('active');

        $(this).closest('.thumbImg').addClass('active');
    });

});
</script>