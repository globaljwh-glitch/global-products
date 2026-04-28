@extends('layouts.frontend')

@section('content')

<section class="sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-4 col-lg-5">
                  <div class="productLargeThumb positionRelative">
                     <img alt="" class="imgResponsive" src="{{ asset('images/products/product-thumb-01.jpg') }}">
                  </div>
                  <div class="productThumbnailList mb-4 mb-md-2">
                     <div class="thumbImg"><a href="#"><img src="{{ asset('images/products/product-thumb-01.jpg') }}" alt="" class="imgResponsive"></a></div>
                     <div class="thumbImg"><a href="#"><img src="{{ asset('images/products/product-thumb-01.jpg') }}" alt="" class="imgResponsive"></a></div>
                     <div class="thumbImg"><a href="#"><img src="{{ asset('images/products/product-thumb-01.jpg') }}" alt="" class="imgResponsive"></a></div>
                     <div class="thumbImg"><a href="#"><img src="{{ asset('images/products/product-thumb-01.jpg') }}" alt="" class="imgResponsive"></a></div>
                  </div>
               </div>
               <div class="col-md-8 col-lg-7">
                  <div class="productDetail">
                     <h2>Industrial Duty Manual Pallet Jack, 5500 lb. Capacity, 27"W x 48"L Forks</h2>
                     <div class="productModel fw-semibold">Model #: WB761215PF</div>
                     <div class="productRating">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                     </div>
                     <div class="productPrice text-red fw-bold">$335.95</div>
                     <div class="smallDesc">
                        <p>Ideal for use in construction, manufacturing, retail, and more, the Global Industrial™ Industrial-Duty Pallet Jack Truck is equipped with a strong & durable reinforced steel frame and a German-engineered pump that allows users to raise and lower pallets or skids up to 5,500 lbs with ease.</p>
                        <ul class="listing01 mt-3">
                           <li>5500 lb. weight capacity</li>
                           <li>Reinforced steel construction with powder coat finish</li>
                           <li>3-function hand control: Raise, Neutral, Lower</li>
                        </ul>
                     </div>
                     <div class="cart-box">
                        <!-- Quantity Box -->
                        <div class="qty-box">
                           <button onclick="decreaseQty()">-</button>
                           <input type="number" id="qty" value="1" min="1">
                           <button onclick="increaseQty()">+</button>
                        </div>
                        <!-- Add to Cart -->
                        <button class="customBtn01 redBg text-white">Add to Cart</button>
                        <button class="customBtn01 blueBg">Add to Wishlist</button>
                     </div>
                     <div class="shipBy w-100 borderTop">
                        <h6>Ships Same Day</h6>
                        <div class="d-flex mb-2">
                           <input type="text" id="" value="Enter Zip Code" >
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
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#questionsAnswers">Questions &amp; Answers </button>
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
                        <p>Ideal for use in construction, manufacturing, retail, and more, the Global Industrial™ Industrial-Duty Pallet Jack Truck is equipped with a strong & durable reinforced steel frame and a German-engineered pump that allows users to raise and lower pallets or skids up to 5,500 lbs with ease. The total width of the truck is 27", making it ideal for larger pallets and skids while still being able to fit through most single doorways. </p>
                        <p>Its manual control for the hydraulic system & mobility improves reliability, reduces required maintenance, and eliminates the need for daily recharging. The smooth-rolling polyurethane steer and load wheels ensure floors remain unmarked and the spring-loaded, self-righting handle enhances comfort and ease-of-use. The reinforced steel forks are tapered to make entry onto pallets & skids easier and have a protective bright high-visibility yellow powder coat finish with a contrasting black finish on the handle. Limited 1-Year Warranty.</p>
                        <ul>
                           <li>Ideal for 3 shift (24 hours) use per day</li>
                           <li>190° steering arc</li>
                           <li>Tapered 6"W x 48"L forks with entry rollers</li>
                           <li>3" load wheels & 7" steer wheels</li>
                           <li>No assembly required</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <!-- Item 2 -->
               <div class="tab-pane fade accordion-item" id="specifications">
                  <h2 class="accordion-header d-md-none">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                     Specifications
                     </button>
                  </h2>
                  <div id="collapse2" class="accordion-collapse collapse d-md-block">
                     <div class="accordion-body">
                        <h5 class="text-red">Weights &amp; Dimensions</h5>
                        <table class="spec-table">
                           <tr>
                              <td>Length</td>
                              <td>63-3/8 in</td>
                           </tr>
                           <tr>
                              <td>Width</td>
                              <td>27 in</td>
                           </tr>
                           <tr>
                              <td>Lowered Height</td>
                              <td>3 in</td>
                           </tr>
                           <tr>
                              <td>Raised Height</td>
                              <td>7-3/4 in</td>
                           </tr>
                           <tr>
                              <td>Weight Capacity</td>
                              <td>5500 lbs</td>
                           </tr>
                        </table>
                        <h5 class="text-red">Product Details</h5>
                        <table class="spec-table">
                           <tr>
                              <td>Weight</td>
                              <td>159 lbs</td>
                           </tr>
                           <tr>
                              <td>Fork Length</td>
                              <td>48 in</td>
                           </tr>
                           <tr>
                              <td>Fork Width</td>
                              <td>6 in</td>
                           </tr>
                           <tr>
                              <td>Distance Between Forks</td>
                              <td>15 in</td>
                           </tr>
                           <tr>
                              <td>Distance Across Forks</td>
                              <td>27 in</td>
                           </tr>
                        </table>
                        <h5 class="text-red">Warranty</h5>
                        <table class="spec-table">
                           <tr>
                              <td>Warranty</td>
                              <td>1 yr</td>
                           </tr>
                        </table>
                     </div>
                  </div>
               </div>
               <!-- Item 3 -->
               <div class="tab-pane fade accordion-item" id="reviews">
                  <h2 class="accordion-header d-md-none">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
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
                              <p>Very well packed and tied down to a pallet for safe travel. Exactly as described and works very well. I could have used shorter forks (as short as 24”) but anything shorter was higher cost. </p>
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
                              <p>Very pleased with this purchase. Pallet jack has a very smooth operation, was packaged very well and delivered very promptly.</p>
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
                              <p>The Pallet jack is very well made, the welds are nearly perfect and I believe it will give us many years of service.</p>
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
                              <button type="submit" class="mt-2 submitBtn btn-lg btn-block customBtn01 redBg d-inline-block">SUBMIT</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Item 4 -->
               <div class="tab-pane fade accordion-item" id="questionsAnswers">
                  <h2 class="accordion-header d-md-none">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                     Questions & Answers
                     </button>
                  </h2>
                  <div id="collapse4" class="accordion-collapse collapse d-md-block">
                     <div class="accordion-body">
                        <div class="qaList mt-2">
                           <div class="qa">
                              <h5 class="mb-1">1) What is the shipping cost for this pallet jack?</h5>
                              <p>Ideal for use in construction, manufacturing, retail, and more, the Global Industrial™ Industrial-Duty Pallet Jack Truck is equipped with a strong & durable reinforced steel frame and a German-engineered pump that allows users to raise and lower pallets or skids up to 5,500 lbs with ease.</p>
                           </div>
                           <div class="qa borderTop">
                              <h5 class="mb-1">2) Could you please tell me where this pallet jack is made?  I need it's point of origin for my customs paperwork.</h5>
                              <p>Ideal for use in construction, manufacturing, retail, and more, the Global Industrial™ Industrial-Duty Pallet Jack Truck is equipped with a strong & durable reinforced steel frame.</p>
                           </div>
                           <div class="qa borderTop">
                              <h5 class="mb-1">3) Do you have a parts diagram for this pallet jacK?</h5>
                              <p>With over 75 years of experience and hundreds of thousands of products, Global Industrial continues to be the source for industrial equipment and supplies that keep your business running efficiently. Serving all of North America, Global Industrial offers a vast selection of hand-picked and tested industrial-strength products, including material handling, storage & shelving, safety & security, janitorial & facility maintenance, and HVAC & fans. </p>
                           </div>
                        </div>
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
                     <a href="#" class="customBtn01 blackBg">View All</a>
                  </div>
               </div>
               <div class="productList">
                  <div class="row">
                     <div class="d-flex col-md-3">
                        <a href="#" class="product w-100">
                           <div class="productThumb positionRelative">
                              <img alt="" class="imgResponsive" src="{{ asset('images/products/product-thumb-01.jpg') }}">
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
                              <img alt="" class="imgResponsive" src="{{ asset('images/products/product-thumb-02.jpg') }}">
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
                              <img alt="" class="imgResponsive" src="{{ asset('images/products/product-thumb-03.jpg') }}">
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
                              <img alt="" class="imgResponsive" src="{{ asset('images/products/product-thumb-04.jpg') }}">
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
      <section class="sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="headingBlock underLineHeading d-flex align-items-center justify-content-between">
                     <h2>Recently Viewed</h2>
                  </div>
               </div>
               <div class="productList">
                  <div class="row">
                     <div class="d-flex col-md-3">
                        <a href="#" class="product w-100">
                           <div class="productThumb positionRelative">
                              <img alt="" class="imgResponsive" src="{{ asset('images/products/product-thumb-01.jpg') }}">
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
                              <img alt="" class="imgResponsive" src="{{ asset('images/products/product-thumb-02.jpg') }}">
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