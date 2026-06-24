@extends('layouts.frontend')

@section('content')

      <section class="imageBackground02 py-3 py-xl-4">
         <div class="container">
            <div class="row">
               <div class="col-md-12 align-items-center">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                           <a href="{{ url('/') }}" class="text-red">Home</a>
                        </li>
                        
                         @foreach($breadcrumbs as $crumb)

                           @if($loop->last)

                               <li class="breadcrumb-item active" aria-current="page">
                                   {{ $crumb->name }}
                               </li>

                           @else

                               <li class="breadcrumb-item">
                                   <a href="{{ url('category/'.$crumb->slug) }}" class="text-blue">
                                       {{ $crumb->name }}
                                   </a>
                               </li>

                           @endif

                       @endforeach
                       <!--  <li class="breadcrumb-item">
                           <a href="#" class="text-blue">Storage & Shelving</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                           Industrial Duty Manual Pallet Jack, 5500 lb. Capacity, 27"W x 48"L Forks
                        </li> -->
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </section>
      <section class="sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="headingBlock underLineHeading d-flex align-items-center justify-content-between">
                     <h2>@if($type == 'category')
                           {{$category->name}}
                        @elseif($type == 'industry')
                           {{$industry->name}}
                        @elseif($type == 'brand')
                           {{$brand->name}}
                        @endif
                     </h2>
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
               
               <div class="col-md-4 col-lg-3">
                  <div class="filterByList mt-lg-4 mt-2">

                     @if($type == 'category')

                         @include('frontend.categories.categories')
                         @include('frontend.categories.industries')
                         @include('frontend.categories.brands')

                     @elseif($type == 'industry')

                         @include('frontend.categories.industries')
                         @include('frontend.categories.categories')
                         @include('frontend.categories.brands')

                     @elseif($type == 'brand')

                         @include('frontend.categories.brands')
                         @include('frontend.categories.categories')
                         @include('frontend.categories.industries')

                     @endif

                     
                     
                     
                  </div>
               </div>
               
               <div class="col-md-8 col-lg-9">
                  <div class="productList">
                     <div class="row">
                        @forelse($products as $product)
                        <div class="d-flex col-lg-4 col-sm-6">
                           <a href="{{route('products.show',$product->slug)}}" class="product w-100">
                              <div class="productThumb positionRelative">
                                 <img alt="" class="imgResponsive" src="{{ $product->primaryImage? asset('storage/'.$product->primaryImage->image): asset('images/no-image.png') }}"  alt="{{ $product->name }}">
                                 <div class="actionBtn">
                                    <button class="customBtn01 mt-2 me-1 bg-white text-blue" href="{{route('products.show',$product->slug)}}">Quick View</button> 
                                    <button class="customBtn01 mt-2 redBg text-white add-to-cart-btn" data-product-id="{{ $product->id }}">Add to Cart</button>
                                 </div>
                              </div>
                              <div class="productInfo">
                                 <h6>{{ $product->name }}</h6>
                                 <div class="productModel fw-semibold">Model #: {{ $product->model_number }}</div>
                                 <div class="productRating">
                                    @php
                                        $rating = $product->reviews_avg_rating ?? 0;
                                    @endphp

                                    @for($i = 1; $i <= 5; $i++)

                                       @if($rating >= $i)
                                       <span class="fa fa-star checked"></span>
                                       @else
                                       <span class="fa fa-star"></span>
                                       @endif
                                    @endfor
                                 </div>
                                 <div class="productPrice text-red fw-bold">${{ $product->price }}</div>
                                 <div class="actionBtnMob d-md-none">
                                    <button class="customBtn01 mt-2 me-1 bg-white text-blue" href="{{route('products.show',$product->slug)}}">Quick View</button> 
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
                                      Sorry, We couldn't find any products in this category.
                                  </p>
                                  <a class="customBtn01 mt-2 redBg text-white" href="{{url('categories')}}">Browse Other Categories</a>
                              </div>

                          </div>

                      @endforelse

                        
                     </div>
                  </div>
                  <div class="paginationOuter">
                      {{ $products->links() }}
                  </div>
               </div>
            </div>
         </div>
      </section>
      
   
   <div id="successToast"
    style="display:none; position:fixed; top:20px; right:20px; z-index:9999; min-width:320px;"
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

   @include('frontend.partials.subscribe')

   <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

$(document).on('click', '.add-to-cart-btn', function(e){

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

        success: function(response){

            // $('#successMessage')
            //    .html(response.message)
            //    .fadeIn();

            // setTimeout(function () {
            //    $('#successMessage').fadeOut();
            // }, 5000);

            $('#successToastMessage').html(response.message);

               $('#successToast')
                  .stop(true,true)
                  .fadeIn(300);

               setTimeout(function(){

                  $('#successToast').fadeOut(400);

               }, 3000);


        }

    });

});

</script>

@endsection