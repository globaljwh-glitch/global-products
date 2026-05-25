@extends('layouts.frontend')

@section('content')


<section class="sectionPadding">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="headingBlock underLineHeading d-flex align-items-center justify-content-between">
                    <h2>Our Product Categories</h2>
                </div>
            </div>

            <div class="productCategoriesList">
                <div class="row">

                    @forelse($f_categories as $category)

                        <div class="col-sm-3 col-lg-2 d-flex">

                            <a href="{{ url('category/'.$category->slug) }}"
                               class="categoriesBox text-center">

                                <div class="categoriesThumb">

                                    <img src="{{ asset('uploads/categories/'.$category->image) }}"
                                         class="imgResponsive"
                                         alt="{{ $category->name }}">

                                </div>

                                <h6 class="categoriesName mb-0">
                                    {{ $category->name }}
                                </h6>

                            </a>

                        </div>

                    @empty

                        <div class="col-12 text-center">
                            <p>No categories found.</p>
                        </div>

                    @endforelse

                </div>
            </div>

        </div>
    </div>
</section>


      
      
      @include('frontend.partials.explore')

      <!-- <section class="sectionPadding greyBg">
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
                     <div class="d-flex col-md-3">
                        <a href="#" class="product w-100">
                           <div class="productThumb positionRelative">
                              <img alt="" class="imgResponsive" src="images/products/product-thumb-01.jpg">
                              <div class="actionBtn">
                                 <button class="customBtn01 mt-2 me-1 bg-white text-blue" href="#">Quick View</button> 
                                 <button class="customBtn01 mt-2 redBg text-white" href="#">Add to Cart</button>
                              </div>
                           </div>
                           <div class="productInfo">
                              <h6>Industrial Duty Manual Pallet Jack, 5500 lb. Capacity, 27"W x 48"L Forks</h6>
                              <div class="productModel fw-semibold">Model #: WB761215PF</div>
                              <div class="productRating">
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star"></span>
                                 <span class="fa fa-star"></span>
                              </div>
                              <div class="productPrice text-red fw-bold">$335.95</div>
                              <div class="actionBtnMob d-md-none">
                                 <button class="customBtn01 mt-2 me-1 bg-white text-blue" href="#">Quick View</button> 
                                 <button class="customBtn01 mt-2 redBg text-white" href="#">Add to Cart</button>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="d-flex col-md-3">
                        <a href="#" class="product w-100">
                           <div class="productThumb positionRelative">
                              <img alt="" class="imgResponsive" src="images/products/product-thumb-02.jpg">
                              <div class="actionBtn">
                                 <button class="customBtn01 mt-2 me-1 bg-white text-blue" href="#">Quick View</button> 
                                 <button class="customBtn01 mt-2 redBg text-white" href="#">Add to Cart</button>
                              </div>
                           </div>
                           <div class="productInfo">
                              <h6>Nexel® Stem Casters Set (4), 5" Polyurethane Wheel, 2 with Brakes, 1200 Lb Capacity</h6>
                              <div class="productModel fw-semibold">Model #: WB500592</div>
                              <div class="productRating">
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star"></span>
                                 <span class="fa fa-star"></span>
                              </div>
                              <div class="productPrice text-red fw-bold">$30.95</div>
                              <div class="actionBtnMob d-md-none">
                                 <button class="customBtn01 mt-2 me-1 bg-white text-blue" href="#">Quick View</button> 
                                 <button class="customBtn01 mt-2 redBg text-white" href="#">Add to Cart</button>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="d-flex col-md-3">
                        <a href="#" class="product w-100">
                           <div class="productThumb positionRelative">
                              <img alt="" class="imgResponsive" src="images/products/product-thumb-03.jpg">
                              <div class="actionBtn">
                                 <button class="customBtn01 mt-2 me-1 bg-white text-blue" href="#">Quick View</button> 
                                 <button class="customBtn01 mt-2 redBg text-white" href="#">Add to Cart</button>
                              </div>
                           </div>
                           <div class="productInfo">
                              <h6>L-Desks with Adjustable Height Return</h6>
                              <div class="productModel fw-semibold">Model #: WB761215PF</div>
                              <div class="productRating">
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star"></span>
                                 <span class="fa fa-star"></span>
                              </div>
                              <div class="productPrice text-red fw-bold">$45.75</div>
                              <div class="actionBtnMob d-md-none">
                                 <button class="customBtn01 mt-2 me-1 bg-white text-blue" href="#">Quick View</button> 
                                 <button class="customBtn01 mt-2 redBg text-white" href="#">Add to Cart</button>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="d-flex col-md-3">
                        <a href="#" class="product w-100">
                           <div class="productThumb positionRelative">
                              <img alt="" class="imgResponsive" src="images/products/product-thumb-04.jpg">
                              <div class="actionBtn">
                                 <button class="customBtn01 mt-2 me-1 bg-white text-blue" href="#">Quick View</button> 
                                 <button class="customBtn01 mt-2 redBg text-white" href="#">Add to Cart</button>
                              </div>
                           </div>
                           <div class="productInfo">
                              <h6>Pure Flow 1000® Eyewash Station Self-contained unit collects used eyewash solution</h6>
                              <div class="productModel fw-semibold">Model #: WB761215PF</div>
                              <div class="productRating">
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                              </div>
                              <div class="productPrice text-red fw-bold">$675.00</div>
                              <div class="actionBtnMob d-md-none">
                                 <button class="customBtn01 mt-2 me-1 bg-white text-blue" href="#">Quick View</button> 
                                 <button class="customBtn01 mt-2 redBg text-white" href="#">Add to Cart</button>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section> -->

      @include('frontend.partials.login')

      <!-- <section class="ctaBlock imageBackground01 sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-5 col-lg-6 d-flex align-items-center">
                  <div class="text-center w-100">
                     <h2 class="text-white text-uppercase fw-bold">New customer? Register now. <br> It is fast and easy.</h2>
                     <h5 class="text-white">Sign in for a personalized experience</h5>
                     <a class="customBtn01 mt-2 me-1 text-white redBg" href="#">Sign IN</a> <a class="customBtn01 mt-2 bg-white text-blue" href="#">Register</a>
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
      </section> -->

      @include('frontend.partials.subscribe')

      <!-- <section class="newsLetterBlock greyBg sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-lg-6 d-flex align-items-center">
                  <div class="w-100">
                     <h2 class="fw-bold">Be the first to know about our daily sales!</h2>
                     <p class="mb-lg-0 pe-lg-4">Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks.</p>
                  </div>
               </div>
               <div class="col-md-12 col-lg-6 d-flex align-items-center">
                  <div class="input-group subscribeNews ps-lg-3">
                     <input type="text" class="form-control form-control-lg text-end-0" id="" placeholder="Enter Email Address" >
                     <button class="btn btn-lg customBtn01 redBg" type="submit" id="btnSearch">SubScribe</button>
                  </div>
               </div>
            </div>
         </div>
      </section> -->

@endsection