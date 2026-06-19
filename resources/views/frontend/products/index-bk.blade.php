@extends('layouts.frontend')

@section('content')

   <!-- @include('frontend.partials.banner') -->

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
                                                <button class="customBtn01 mt-2 redBg text-white add-to-cart-btn" data-product-id="{{ $product->id }}">Add to Cart</button>
                                             </div>
                                          </div>

                                          <div class="productInfo">
                                             <h6>{{ $product->name }}</h6>

                                             <div class="productModel fw-semibold">
                                                Model #: {{ $product->sku ?? 'N/A' }}
                                             </div>
                                             <div class="productRating">
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-solid fa-star text-warning"></i>
                                                <i class="fa-regular fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
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