@extends('layouts.frontend')

@section('content')

   <section class="mainBanner text-center">
      <div class="container">
         <div class="row">
            <div class="col-md-12 d-flex align-items-center">
               <div class="bannerContent mw-100 w-100">
                  <h1>{{$industry->name}}</h1>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="sectionPadding">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="headingBlock pb-3 text-center">
                  <h2 class="fw-bold">Reliable Industrial <span>Solutions to Keep {{$industry->name}}</span> Moving</h2>
               </div>
            </div>
            <div class="productCategoriesList text-center">
               <div class="row d-flex justify-content-center">
                  @if(isset($industry->categories) && !empty($industry->categories))
                     @foreach($industry->categories as $category)
                        <div class="col-sm-3 col-lg-2 d-flex">
                           <a href="{{ url('category/' . $category->slug) }}" class="categoriesBox text-center">
                              <div class="categoriesThumb">
                                 <img src="{{ asset('storage/' . $category->image) }}" class="imgResponsive">
                              </div>
                              <h6 class="categoriesName mb-0">{{$category->name}}</h6>
                           </a>
                           </a>
                        </div>
                     @endforeach
                  @else
                     <div class="col-12">

                        <div class="alert alert-light text-center py-5 border">
                           <p class="mb-0">
                              Sorry, We couldn't find any Category in this Industry.
                           </p>
                           <a class="customBtn01 mt-2 redBg text-white" href="{{route('industries.index')}}">Browse Other
                              Industries</a>
                        </div>

                     </div>


                  @endif

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
                  <h2>Top Selling In {{$industry->name}} Industry</h2>
                  <a href="{{ route('products.index', ['type' => 'industry', 'slug' => $industry->slug]) }}"
                     class="customBtn01 blackBg">View All</a>
               </div>
            </div>
            <div class="productList">
               <div class="row">

                  @forelse($products as $product)
                     <div class="d-flex col-lg-3 col-sm-6">
                        <a href="{{route('products.show', $product->slug)}}" class="product w-100">
                           <div class="productThumb positionRelative">
                              <img alt="" class="imgResponsive"
                                 src="{{ $product->primaryImage ? asset('storage/' . $product->primaryImage->image) : asset('images/no-image.png') }}"
                                 alt="{{ $product->name }}">
                              <div class="actionBtn">
                                 <button class="customBtn01 mt-2 me-1 bg-white text-blue"
                                    href="{{route('products.show', $product->slug)}}">Quick View</button>
                                 <button class="customBtn01 mt-2 redBg text-white add-to-cart-btn"
                                    data-product-id="{{ $product->id }}">Add to Cart</button>
                              </div>
                           </div>

                           <div class="productInfo">
                              <h6>{{ $product->name }}</h6>
                              <div class="productModel fw-semibold">Model #: {{ $product->model_number }}</div>
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

                              <div class="productPrice text-red fw-bold">${{ $product->price }}</div>
                              <div class="actionBtnMob d-md-none">
                                 <button class="customBtn01 mt-2 me-1 bg-white text-blue"
                                    href="{{route('products.show', $product->slug)}}">Quick View</button>
                                 <button class="customBtn01 mt-2 redBg text-white" href="#">Add to Cart</button>
                              </div>
                           </div>
                        </a>
                     </div>
                  @empty

                     <div class="col-12">

                        <div class="alert alert-light text-center py-5 border">
                           <img src="{{ asset('images/no-product.png') }}" width="300">
                           <h4>No products found</h4>

                           <p class="mb-0">
                              Sorry, We couldn't find any products in this Industry.
                           </p>
                           <a class="customBtn01 mt-2 redBg text-white" href="{{route('industries.index')}}">Browse Other
                              Industries</a>
                        </div>

                     </div>
                  @endforelse
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
                  <h2>Our Brands</h2>
                  <a href="{{route('brands.all')}}" class="customBtn01 blackBg">View All</a>
               </div>
            </div>

            @if(isset($industry->brands) && !empty($industry->brands))
               @foreach($industry->brands as $brand)

                  <div class="col-lg-2 col-md-3 col-sm-4 d-flex align-items-center">
                     <a href="{{route('brands.details', $brand->slug)}}" class="partner">
                        <div class="partnerLogo"><img src="{{ asset('storage/' . $brand->logo) }}" alt="" target="_blank"
                              class="imgResponsive" /></div>
                     </a>
                  </div>
               @endforeach
            @else
               <div class="col-12">

                  <div class="alert alert-light text-center py-5 border">
                     <p class="mb-0">
                        Sorry, We couldn't find any Brand in this Industry.
                     </p>
                     <a class="customBtn01 mt-2 redBg text-white" href="{{route('industries.index')}}">Browse Other
                        Industries</a>
                  </div>

               </div>


            @endif


         </div>
      </div>
   </section>

@endsection