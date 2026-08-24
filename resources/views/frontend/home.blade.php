@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
   <style>
      .productSlider .product {
         padding: 15px;
      }

      .productSlider .slick-slide {
         margin: 0 10px;
      }

      .productSlider .slick-list {
         margin: 0 -10px;
      }

      .slick-prev:before,
      .slick-next:before {
         color: #000;
         font-size: 22px;
      }
   </style>

   @include('frontend.partials.banner')

   <!-- Paste your homepage HTML here -->
   @if($offer_featured->count())
      <section class="sectionPadding pb-0">
         <div class="container">
            <div class="row">

               @foreach($offer_featured as $offer)

                  <div class="col-sm-6">
                     <div class="smallBannerOffers">
                        <img src="{{ asset('storage/' . $offer->image) }}" class="imgResponsive" alt="">
                     </div>
                  </div>

               @endforeach
            </div>
         </div>
      </section>
   @endif
   <section class="sectionPadding">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="headingBlock underLineHeading d-flex align-items-center justify-content-between">
                  <h2>Explore Our Product Categories</h2>
                  <a href="/categories" class="customBtn01 blackBg">View All</a>
               </div>
            </div>
            <div class="productCategoriesList">
               <div class="row">
                  @foreach($categories as $category)
                     <div class="col-sm-3 col-lg-2 d-flex">

                        <a href="{{ url('category/' . $category->slug) }}" class="categoriesBox text-center">

                           <div class="categoriesThumb">
                              <img src="{{ asset('storage/' . $category->image) }}" class="imgResponsive">
                           </div>

                           <h6 class="categoriesName mb-0">
                              {{ $category->name }}
                           </h6>

                        </a>

                     </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="sectionPadding blueBg">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="headingBlock underLineHeading d-flex align-items-center justify-content-between">
                  <h2>Explore Our Best Sellers</h2>
                  <a href="/categories" class="customBtn01 redBg">View All</a>
               </div>
            </div>
            <div class="col-md-12">
               <div class="productSliderOuter bg-white">
                  <div class="productSlider">
                     @foreach($bestSellers as $product)
                                    <div>
                                       <a href="{{ route('products.show', $product->slug) }}" class="product">

                                          <div class="productThumb positionRelative">

                                             <img class="imgResponsive" src="{{ $product->mainImage
                        ? asset('storage/' . $product->mainImage->image)
                        : asset('images/no-product.png') }}">

                                             <div class="actionBtn">
                                                <button onclick="window.location.href='{{ route('products.show', $product->slug) }}'"
                                                   class="customBtn01 mt-2 me-1 bg-white text-blue">
                                                   Quick View
                                                </button>

                                                <button class="customBtn01 mt-2 redBg text-white add-to-cart-btn"
                                                   data-product-id="{{ $product->id }}">
                                                   Add to Cart
                                                </button>
                                             </div>
                                          </div>

                                          <div class="productInfo">

                                             <h6>{{ Str::limit($product->name, 40) }}</h6>

                                             <div class="productModel fw-semibold">
                                                Model #: {{ $product->model_number ?? 'N/A' }}
                                             </div>

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
                                                   ({{ $product->reviews_count ?? 0 }}
                                                   {{ Str::plural('Review', $product->reviews_count ?? 0) }})
                                                </small>
                                             </div>

                                             <div class="productPrice text-red fw-bold">
                                                ${{ number_format($product->price, 2) }}
                                             </div>

                                          </div>

                                       </a>
                                    </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="sectionPadding">
      <div class="container">
         <div class="row">
            <div class="d-flex col-md-6">
               <div class="imgThumbBorder"><img alt="" class="imgHeightResponsive" src="images/image-thumb-01.jpg"></div>
            </div>
            <div class="d-flex align-items-center col-md-6">
               <div class="w-100 pe-0 ps-lg-4 pt-3 pt-lg-0"> 
                  <h2>Industrial <span>Equipment</span> & <span>Business Supplies</span></h2>
                  <p class="pe-0 pe-lg-3">Global Products Corporation is your reliable source for high-quality industrial equipment, material handling solutions, warehouse storage systems, safety products, facility maintenance supplies, and workplace essentials. We help businesses across multiple industries streamline operations with durable, performance-driven products that meet demanding workplace requirements. Our carefully selected product range is built to support warehouses, manufacturing facilities, distribution centers, commercial buildings, educational institutions, healthcare organizations, and government sectors. Whether you need material handling equipment, storage & shelving solutions, industrial safety products, janitorial supplies, packaging materials, or facility maintenance equipment, we deliver dependable solutions that combine quality, efficiency, and long-term value.</p>
                  <a href="{{ route('about') }}" class="customBtn01 blackBg mt-2">Know More</a>
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
                  <h2>Explore Our New Products</h2>
                  <a href="/categories" class="customBtn01 blackBg">View All</a>
               </div>
            </div>

            <div class="productList">
               <div class="row">

                  @foreach($latestProducts as $product)
                              <div class="d-flex col-md-3 mb-4">
                                 <a href="{{ route('products.show', $product->slug) }}" class="product w-100">

                                    <div class="productThumb positionRelative">

                                       <img class="imgResponsive" src="{{ $product->mainImage
                     ? asset('storage/' . $product->mainImage->image)
                     : asset('images/no-product.png') }}">

                                       <div class="actionBtn">
                                          <button onclick="window.location.href='{{ route('products.show', $product->slug) }}'"
                                             class="customBtn01 mt-2 me-1 bg-white text-blue">
                                             Quick View
                                          </button>

                                          <button class="customBtn01 mt-2 redBg text-white add-to-cart-btn"
                                             data-product-id="{{ $product->id }}">
                                             Add to Cart
                                          </button>
                                       </div>

                                    </div>

                                    <div class="productInfo">

                                       <h6>
                                          {{ \Illuminate\Support\Str::limit($product->name, 60) }}
                                       </h6>

                                       <div class="productModel fw-semibold">
                                          Model #:
                                          {{ $product->model_number ?? 'N/A' }}
                                       </div>

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
                                             ({{ $product->reviews_count ?? 0 }}
                                             {{ Str::plural('Review', $product->reviews_count ?? 0) }})
                                          </small>
                                       </div>

                                       <div class="productPrice text-red fw-bold">
                                          ${{ number_format($product->price, 2) }}
                                       </div>

                                       <div class="actionBtnMob d-md-none">
                                          <button class="customBtn01 mt-2 me-1 bg-white text-blue">
                                             Quick View
                                          </button>

                                          <button class="customBtn01 mt-2 redBg text-white add-to-cart-btn"
                                             data-product-id="{{ $product->id }}">
                                             Add to Cart
                                          </button>
                                       </div>

                                    </div>

                                 </a>
                              </div>
                  @endforeach

               </div>
            </div>

         </div>
      </div>
   </section>
   @include('frontend.partials.login')

   @include('frontend.partials.news')

   @include('frontend.partials.subscribe')


   <div id="successToast" style="display:none; position:fixed; top:20px; right:20px; z-index:9999; min-width:320px;"
      class="shadow-lg">

      <div style="
              background:linear-gradient(135deg,#16a34a,#22c55e);
              color:#fff;
              padding:16px 20px;
              border-radius:12px;
              display:flex;
              align-items:center;
              gap:12px;
              box-shadow:0 10px 25px rgba(0,0,0,.15);
          ">
         <div style="font-size:24px;">✓</div>

         <div>
            <div style="font-weight:700;">
               Success
            </div>

            <div id="successToastMessage">
            </div>
         </div>
      </div>
   </div>

   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
   <script>
      $(document).ready(function () {

         $('.productSlider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: true,
            dots: false,
            infinite: true,

            responsive: [
               {
                  breakpoint: 1200,
                  settings: { slidesToShow: 4 }
               },
               {
                  breakpoint: 992,
                  settings: { slidesToShow: 3 }
               },
               {
                  breakpoint: 768,
                  settings: { slidesToShow: 2 }
               },
               {
                  breakpoint: 576,
                  settings: { slidesToShow: 1 }
               }
            ]
         });

      });
   </script>

   <script>

      $(document).on('click', '.add-to-cart-btn', function (e) {

         e.preventDefault();

         let button = $(this);

         let productId = button.data('product-id');

         let quantity = 1; //$("#quantity").val();

         $.ajax({

            url: '/cart/add/' + productId,

            method: 'POST',

            data: {
               _token: $('meta[name="csrf-token"]').attr('content'),
               quantity: quantity
            },

            success: function (response) {

               // $('#successMessage')
               //    .html(response.message)
               //    .fadeIn();

               // setTimeout(function () {
               //    $('#successMessage').fadeOut();
               // }, 5000);
               updateHeaderCounts();
               $('#successToastMessage').html(response.message);

               $('#successToast')
                  .stop(true, true)
                  .fadeIn(300);

               setTimeout(function () {

                  $('#successToast').fadeOut(400);

               }, 3000);

            }

         });

      });

   </script>

@endsection