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


                     <!-- <div class="d-flex col-md-3">
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
                    </div> -->
                  </div>
               </div>
            </div>
         </div>
      </section>