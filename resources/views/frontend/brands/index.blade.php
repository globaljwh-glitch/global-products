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

            <div class="ourBrandList">
                <div class="row">

                    @forelse($f_brands as $brand)

                        <div class="col-lg-2 col-md-3 col-sm-4 d-flex">

                            <a href="{{route('brands.details',$brand->slug)}}"
                               class="partner d-flex align-items-center justify-content-end">

                                <div class="partnerLogo w-100 text-center">

                                    <img src="{{ asset('storage/'.$brand->logo) }}"
                                         class="imgResponsive"
                                         alt="{{ $brand->name }}">

                                </div>
                                
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