@extends('layouts.frontend')

@section('content')

@include('frontend.partials.banner')

<section class="sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="headingBlock underLineHeading d-flex align-items-center justify-content-between">
                     <h2>Explore Our Products</h2>
                     <div class="sortBy d-flex align-items-center">
                        <label for="sortProducts" class="">Sort by:</label>
                        <select class="form-control ">
                           <option value="">Best Sellers</option>
                           <option value="">Newest Arrivals</option>
                           <option value="">Price: Low to High</option>
                           <option value="">Price: High to Low</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-lg-3">
                  <div class="filterByList mt-lg-4 mt-2">
                     <div class="productCategoriesFilter">
                        <h4 class="text-uppercase">Categories</h4>
                        <ul class="ps-0">
                           <li><a href="#">Storage & Shelving</a></li>
                           <li><a href="#">Safety & Security</a></li>
                           <li><a href="#">Carts & Trucks</a></li>
                           <li><a href="#">Furniture & Decor</a></li>
                           <li><a href="#">Material Handling</a></li>
                           <li><a href="#">HVAC & Fans</a></li>
                           <li class="fw-bold"><a href="#">See More +</a></li>
                        </ul>
                     </div>

                     <div class="productCategoriesFilter mt-lg-5 mt-md-4 mt-2">
                        <h4 class="text-uppercase">Shop By Industry</h4>
                        <ul class="ps-0">
                           <li><a href="#">Warehouse</a></li>
                           <li><a href="#">Manufacturing</a></li>
                           <li><a href="#">Construction</a></li>
                           <li><a href="#">Retail</a></li>
                           <li><a href="#">Education</a></li>
                           <li><a href="#">Public Sector</a></li>
                           <li><a href="#">Healthcare</a></li>
                           <li><a href="#">Hospitality</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-8 col-lg-9">
                  <div class="productList">
                     <div class="row">
                        <div class="d-flex col-lg-4 col-sm-6">
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
                        <div class="d-flex col-lg-4 col-sm-6">
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
                        <div class="d-flex col-lg-4 col-sm-6">
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
                        <div class="d-flex col-lg-4 col-sm-6">
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
                        <div class="d-flex col-lg-4 col-sm-6">
                           <a href="#" class="product w-100">
                              <div class="productThumb positionRelative">
                                 <img alt="" class="imgResponsive" src="images/products/product-thumb-05.jpg">
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
                        <div class="d-flex col-lg-4 col-sm-6">
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
                        <div class="d-flex col-lg-4 col-sm-6">
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
                        <div class="d-flex col-lg-4 col-sm-6">
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
                        <div class="d-flex col-lg-4 col-sm-6">
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
                  <div class="paginationOuter d-flex align-items-center justify-content-between">
                     <div>Showing 1-10 of 45 results</div>
                     <ul class="pagination mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                     </ul>
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




<!-- <div class="container py-5">
    <h2 class="mb-4">Products</h2>

    <div class="row">
        @forelse($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100">

                    {{-- Product Image --}}
                    <img 
                        src="{{ $product->images->first()->image ?? asset('placeholder.jpg') }}" 
                        class="card-img-top"
                        alt="{{ $product->name }}"
                    >

                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $product->name }}
                        </h5>

                        <p class="card-text">
                            ₹{{ $product->price ?? 'N/A' }}
                        </p>

                        <a href="#" class="btn btn-primary btn-sm">
                            View Details
                        </a>
                    </div>

                </div>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div> -->

@endsection