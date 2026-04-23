@extends('layouts.frontend')

@section('title', 'Home')

@section('content')

    <!-- Paste your homepage HTML here -->
    <section class="sectionPadding pb-0">
         <div class="container">
            <div class="row">
               <div class="col-sm-6">
                  <div class="smallBannerOffers"><img src="images/small-banner-01.jpg" class="imgResponsive"></div>
               </div>
               <div class="col-sm-6">
                  <div class="smallBannerOffers"><img src="images/small-banner-02.jpg" class="imgResponsive"></div>
               </div>
            </div>
         </div>
      </section>
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
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-01.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">Storage &amp; Shelving</h6></a>
                        </a>
                     </div>
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-02.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">Safety &amp; Security</h6></a>
                        </a>
                     </div>
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-03.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">Carts &amp; Trucks</h6></a>
                        </a>
                     </div>
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-04.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">Furniture &amp; Decor</h6></a>
                        </a>
                     </div>
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-05.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">Material Handling</h6></a>
                        </a>
                     </div>
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-06.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">HVAC &amp; Fans</h6></a>
                        </a>
                     </div>
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-07.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">Workbenches &amp; Shop Desks</h6></a>
                        </a>
                     </div>
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-08.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">Tools &amp; Instruments</h6></a>
                        </a>
                     </div>
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-09.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">Plumbing &amp; Pumps</h6></a>
                        </a>
                     </div>
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-10.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">Foodservice &amp; Retail</h6></a>
                        </a>
                     </div>
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-11.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">Janitorial &amp; Facility Maintenance</h6></a>
                        </a>
                     </div>
                     <div class="col-sm-3 col-lg-2 d-flex">
                        <a href="#" class="categoriesBox text-center">
                           <div class="categoriesThumb"><img src="images/categories-icon/cat-icon-12.jpg" class="imgResponsive"></div>
                           <h6 class="categoriesName mb-0">Office &amp; School Supplies</h6></a>
                        </a>
                     </div>
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
                     <!-- Item 1 -->
                     <div>
                       <a href="#" class="product">
                         <div class="productThumb positionRelative">
                           <img alt="" class="imgResponsive" src="images/products/product-thumb-01.jpg">
                           <div class="actionBtn">
                             <button class="customBtn01 mt-2 me-1 bg-white text-blue">Quick View</button> 
                             <button class="customBtn01 mt-2 redBg text-white">Add to Cart</button>
                           </div>
                         </div>
                         <div class="productInfo">
                           <h6>Industrial Duty Manual Pallet Jack...</h6>
                           <div class="productModel fw-semibold">Model #: WB761215PF</div>
                           <div class="productRating">
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star"></span>
                             <span class="fa fa-star"></span>
                           </div>
                           <div class="productPrice text-red fw-bold">$335.95</div>
                         </div>
                       </a>
                     </div>

                     <!-- Item 2 -->
                     <div>
                       <a href="#" class="product">
                         <div class="productThumb positionRelative">
                           <img alt="" class="imgResponsive" src="images/products/product-thumb-02.jpg">
                           <div class="actionBtn">
                             <button class="customBtn01 mt-2 me-1 bg-white text-blue">Quick View</button> 
                             <button class="customBtn01 mt-2 redBg text-white">Add to Cart</button>
                           </div>
                         </div>
                         <div class="productInfo">
                           <h6>Nexel® Stem Casters Set...</h6>
                           <div class="productModel fw-semibold">Model #: WB500592</div>
                           <div class="productRating">
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star"></span>
                             <span class="fa fa-star"></span>
                           </div>
                           <div class="productPrice text-red fw-bold">$30.95</div>
                         </div>
                       </a>
                     </div>

                     <!-- Item 3 -->
                     <div>
                       <a href="#" class="product">
                         <div class="productThumb positionRelative">
                           <img alt="" class="imgResponsive" src="images/products/product-thumb-03.jpg">
                           <div class="actionBtn">
                             <button class="customBtn01 mt-2 me-1 bg-white text-blue">Quick View</button> 
                             <button class="customBtn01 mt-2 redBg text-white">Add to Cart</button>
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
                         </div>
                       </a>
                     </div>

                     <!-- Item 4 -->
                     <div>
                       <a href="#" class="product">
                         <div class="productThumb positionRelative">
                           <img alt="" class="imgResponsive" src="images/products/product-thumb-04.jpg">
                           <div class="actionBtn">
                             <button class="customBtn01 mt-2 me-1 bg-white text-blue">Quick View</button> 
                             <button class="customBtn01 mt-2 redBg text-white">Add to Cart</button>
                           </div>
                         </div>
                         <div class="productInfo">
                           <h6>Pure Flow 1000® Eyewash Station...</h6>
                           <div class="productModel fw-semibold">Model #: WB761215PF</div>
                           <div class="productRating">
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                           </div>
                           <div class="productPrice text-red fw-bold">$675.00</div>
                         </div>
                       </a>
                     </div>

                     <!-- Item 5 -->
                     <div>
                       <a href="#" class="product">
                         <div class="productThumb positionRelative">
                           <img alt="" class="imgResponsive" src="images/products/product-thumb-05.jpg">
                           <div class="actionBtn">
                             <button class="customBtn01 mt-2 me-1 bg-white text-blue">Quick View</button> 
                             <button class="customBtn01 mt-2 redBg text-white">Add to Cart</button>
                           </div>
                         </div>
                         <div class="productInfo">
                           <h6>Interion® 5-Way Adjustable Ergonomic Stool, Black</h6>
                           <div class="productModel fw-semibold">Model #: WB250626</div>
                           <div class="productRating">
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                             <span class="fa fa-star checked"></span>
                           </div>
                           <div class="productPrice text-red fw-bold">$161.46</div>
                         </div>
                       </a>
                     </div>
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
                     <p class="pe-0 pe-lg-3">With over 75 years of experience and hundreds of thousands of products, Global Industrial continues to be the source for industrial equipment and supplies that keep your business running efficiently. Serving all of North America, Global Industrial offers a vast selection of hand-picked and tested industrial-strength products, including material handling, storage & shelving, safety & security, janitorial & facility maintenance, and HVAC & fans. Our combination of innovative experts and extensive product knowledge allows us to deliver customized solutions to the public sector and businesses of all sizes—prioritizing efficiency, value, and a customer-first approach. We know your business & its unique needs and we develop, manufacture, and distribute products that meet your needs and exceed your expectations.</p>
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
      </section>

      <section class="ctaBlock imageBackground01 sectionPadding">
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
                        <p>Seasonal revenue windows are short. When execution slips, retailers do not get a second chance in the same quarter.</p>
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
                        <p>In industrial facilities, floor space disappears quickly. Equipment grows, inventory expands, and temporary</p>
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
                        <p>Warehouse and industrial floors are under constant stress from heavy machinery and material production.</p>
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
      </section>

@endsection