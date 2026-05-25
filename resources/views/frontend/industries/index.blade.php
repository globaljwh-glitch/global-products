@extends('layouts.frontend')

@section('content')

<section class="sectionPadding">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="headingBlock underLineHeading d-flex align-items-center justify-content-between">
                    <h2>Our Industeries</h2>
                </div>
            </div>

            <div class="productCategoriesList">
                <div class="row">

                    @forelse($f_industries as $category)

                        <div class="col-sm-3 col-lg-2 d-flex">

                            <a href="{{ url('category/'.$category->slug) }}"
                               class="categoriesBox text-center">

                                <div class="categoriesThumb">

                                    <img src="{{ asset('uploads/categories/'.$category->image) }}"
                                         class="imgResponsive"
                                         alt="{{ $category->name }}">

                                </div>

                                <h6 class="categoriesName mb-0">
                                    {{ $category->name }}
                                </h6>

                            </a>

                        </div>

                    @empty

                        <div class="col-12 text-center">
                            <p>No industries found.</p>
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