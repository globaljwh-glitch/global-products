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
                     <select class="form-control" onchange="window.location.href='?sort='+this.value">
                        <option value="">Best Sellers</option>
                        <option value="new" {{ request('sort') == 'new' ? 'selected' : '' }}>Newest Arrivals</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High
                        </option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low
                        </option>
                     </select>
                  </div>
               </div>
            </div>
            @include('frontend.partials.sidebar')
            <!-- <div class="col-md-4 col-lg-3">
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
               </div> -->
            <div class="col-md-8 col-lg-9">
               <div class="productList">
                  <div class="row">
                     @forelse($products as $product)
                                    <div class="d-flex col-lg-4 col-sm-6">
                                       <a href="#" class="product w-100">
                                          <div class="productThumb positionRelative">

                                             <img alt="" class="imgResponsive" src="{{ $product->mainImage
                        ? asset('storage/' . $product->mainImage->image)
                        : asset('images/no-product.png') }}">

                                             <div class="actionBtn">
                                                <button onclick="window.location.href='{{ route('products.show', $product->slug) }}'"
                                                   class="customBtn01 mt-2 me-1 bg-white text-blue">
                                                   Quick View
                                                </button>
                                                <button class="customBtn01 mt-2 redBg text-white">Add to Cart</button>
                                             </div>
                                          </div>

                                          <div class="productInfo">
                                             <h6>{{ $product->name }}</h6>

                                             <div class="productModel fw-semibold">
                                                Model #: {{ $product->sku ?? 'N/A' }}
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
                                                ${{ $product->price ?? '0.00' }}
                                             </div>

                                             <div class="actionBtnMob d-md-none">
                                                <button class="customBtn01 mt-2 me-1 bg-white text-blue">Quick View</button>
                                                <button class="customBtn01 mt-2 redBg text-white">Add to Cart</button>
                                             </div>
                                          </div>
                                       </a>
                                    </div>
                     @empty
                        <div class="col-12">
                           <p>No products found.</p>
                        </div>
                     @endforelse
                  </div>
               </div>
               <div class="paginationOuter d-flex align-items-center justify-content-between">

                  <div>
                     Showing {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }}
                     of {{ $products->total() }} results
                  </div>

                  <ul class="pagination mb-0">

                     {{-- Previous --}}
                     @if ($products->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                     @else
                        <li class="page-item">
                           <a class="page-link" href="{{ $products->previousPageUrl() }}">Previous</a>
                        </li>
                     @endif

                     {{-- Pages --}}
                     @for ($i = 1; $i <= $products->lastPage(); $i++)
                        <li class="page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                           <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                        </li>
                     @endfor

                     {{-- Next --}}
                     @if ($products->hasMorePages())
                        <li class="page-item">
                           <a class="page-link" href="{{ $products->nextPageUrl() }}">Next</a>
                        </li>
                     @else
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                     @endif

                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>

   @include('frontend.partials.subscribe')
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