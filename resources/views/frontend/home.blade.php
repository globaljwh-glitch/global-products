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
                        <img src="{{ asset($offer->image) }}" 
                             class="imgResponsive"
                             alt="">
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
                  <a href="#" class="customBtn01 blackBg">View All</a>
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
                  <a href="#" class="customBtn01 redBg">View All</a>
               </div>
            </div>
            <div class="col-md-12">
               <div class="productSliderOuter bg-white">
                  <div class="productSlider">
                     @foreach($bestSellers as $product)
                                    <div>
                                       <a href="#" class="product">

                                          <div class="productThumb positionRelative">

                                             <img class="imgResponsive" src="{{ $product->mainImage
                        ? asset('storage/' . $product->mainImage->image)
                        : asset('images/no-product.png') }}">

                                             <div class="actionBtn">
                                                <button class="customBtn01 mt-2 me-1 bg-white text-blue">
                                                   Quick View
                                                </button>

                                                <button class="customBtn01 mt-2 redBg text-white">
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
                                                ⭐⭐⭐⭐⭐
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
                  <h2>The Source for <span>Industrial Equipment</span> and <span>Supplies</span></h2>
                  <p class="pe-0 pe-lg-3">With over 75 years of experience and hundreds of thousands of products, Global
                     Industrial continues to be the source for industrial equipment and supplies that keep your business
                     running efficiently. Serving all of North America, Global Industrial offers a vast selection of
                     hand-picked and tested industrial-strength products, including material handling, storage & shelving,
                     safety & security, janitorial & facility maintenance, and HVAC & fans. Our combination of innovative
                     experts and extensive product knowledge allows us to deliver customized solutions to the public sector
                     and businesses of all sizes—prioritizing efficiency, value, and a customer-first approach. We know
                     your business & its unique needs and we develop, manufacture, and distribute products that meet your
                     needs and exceed your expectations.</p>
                  <a href="#" class="customBtn01 blackBg mt-2">Know More</a>
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
                  <a href="#" class="customBtn01 blackBg">View All</a>
               </div>
            </div>

            <div class="productList">
               <div class="row">

                  @foreach($latestProducts as $product)
                              <div class="d-flex col-md-3 mb-4">
                                 <a href="#" class="product w-100">

                                    <div class="productThumb positionRelative">

                                       <img class="imgResponsive" src="{{ $product->mainImage
                     ? asset('storage/' . $product->mainImage->image)
                     : asset('images/no-product.png') }}">

                                       <div class="actionBtn">
                                          <button class="customBtn01 mt-2 me-1 bg-white text-blue">
                                             Quick View
                                          </button>

                                          <button class="customBtn01 mt-2 redBg text-white">
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
                                          ⭐⭐⭐⭐⭐
                                       </div>

                                       <div class="productPrice text-red fw-bold">
                                          ${{ number_format($product->price, 2) }}
                                       </div>

                                       <div class="actionBtnMob d-md-none">
                                          <button class="customBtn01 mt-2 me-1 bg-white text-blue">
                                             Quick View
                                          </button>

                                          <button class="customBtn01 mt-2 redBg text-white">
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
   <!-- <section class="ctaBlock imageBackground01 sectionPadding">
      <div class="container">
         <div class="row">
            <div class="col-md-5 col-lg-6 d-flex align-items-center">
               <div class="text-center w-100">
                  <h2 class="text-white text-uppercase fw-bold">New customer? Register now. <br> It is fast and easy.</h2>
                  <h5 class="text-white">Sign in for a personalized experience</h5>
                  <a class="customBtn01 mt-2 me-1 text-white redBg" href="#">Sign IN</a> <a
                     class="customBtn01 mt-2 bg-white text-blue" href="#">Register</a>
               </div>
            </div>
            <div class="col-md-7 col-lg-6 d-flex align-items-center">
               <ul class="mb-0 w-100 text-white fw-semibold">
                  <li>Enjoy a faster and more personalized checkout</li>
                  <li>Manage your payment preferences, returns, & cancellations</li>
                  <li>View your order history with easy order tracking</li>
                  <li>Create and manage multiple order lists, auto re-orders, & subscriptions</li>
                  <li>Get insights into savings and spending anytime</li>
                  <li>Receive more personalized product recommendations </li>
                  <li>Manage your communication preferences</li>
                  <li>Convert your quote to an order</li>
               </ul>
            </div>
         </div>
      </div>
   </section>
   <section class="blogSection sectionPadding">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="text-center">
                  <h2 class="">Popular Reads</h2>
                  <p>Explore the latest insights, tips, freshest and most exciting news</p>
               </div>
            </div>
            <div class="d-flex col-md-4">
               <div class="blog bg-white" href="#">
                  <div class="blogThumb"><img alt="" class="imgHeightResponsive" src="images/blog-thumb-01.jpg"></div>
                  <div class="blogInfo">
                     <div class="blogDate">March 20, 2026</div>
                     <h5>The Retail Refresh Playbook: How Procurement Builds Seasonal Readiness at Scale</h5>
                     <p>Seasonal revenue windows are short. When execution slips, retailers do not get a second chance in
                        the same quarter.</p>
                     <a href="#" class="customBtn01 blackBg mt-2 mb-1">Read More</a>
                  </div>
               </div>
            </div>
            <div class="d-flex col-md-4">
               <div class="blog bg-white" href="#">
                  <div class="blogThumb"><img alt="" class="imgHeightResponsive" src="images/blog-thumb-02.jpg"></div>
                  <div class="blogInfo">
                     <div class="blogDate">February 16, 2026</div>
                     <h5>Your Guide to Industrial Wall-Mounted Storage</h5>
                     <p>In industrial facilities, floor space disappears quickly. Equipment grows, inventory expands, and
                        temporary</p>
                     <a href="#" class="customBtn01 blackBg mt-2 mb-1">Read More</a>
                  </div>
               </div>
            </div>
            <div class="d-flex col-md-4">
               <div class="blog bg-white" href="#">
                  <div class="blogThumb"><img alt="" class="imgHeightResponsive" src="images/blog-thumb-03.jpg"></div>
                  <div class="blogInfo">
                     <div class="blogDate">February 12, 2026</div>
                     <h5>A Clean Slate: How to Improve Maintenance of Warehouse & Industrial Floors</h5>
                     <p>Warehouse and industrial floors are under constant stress from heavy machinery and material
                        production.</p>
                     <a href="#" class="customBtn01 blackBg mt-2 mb-1">Read More</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="newsLetterBlock greyBg sectionPadding">
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

@endsection