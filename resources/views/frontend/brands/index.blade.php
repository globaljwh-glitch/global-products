@extends('layouts.frontend')

@section('content')

<section class="sectionPadding">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="headingBlock underLineHeading d-flex align-items-center justify-content-between">
                    <h2>Our Brands</h2>
                </div>
            </div>

            <div class="productCategoriesList">
                <div class="row">

                    @forelse($f_brands as $brand)

                        <div class="col-sm-3 col-lg-2 d-flex">

                            <a href="{{route('brands.details',$brand->slug)}}"
                               class="categoriesBox text-center">

                                <div class="categoriesThumb">

                                    <img src="{{ asset('storage/'.$brand->logo) }}"
                                         class="imgResponsive"
                                         alt="{{ $brand->name }}">

                                </div>

                                <h6 class="categoriesName mb-0">
                                    {{ $brand->name }}
                                </h6>

                            </a>

                        </div>

                    @empty

                        <div class="col-12 text-center">
                            <p>No brands found.</p>
                        </div>

                    @endforelse

                </div>
            </div>

        </div>
    </div>
</section>


      
      
      @include('frontend.partials.explore')

      @include('frontend.partials.login')

      @include('frontend.partials.subscribe')

@endsection