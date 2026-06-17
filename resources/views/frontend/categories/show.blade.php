@extends('layouts.frontend')

@section('content')

<section class="sectionPadding">

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="headingBlock underLineHeading d-flex align-items-center justify-content-between">

                    <h2>
                        {{ $category->name }}
                    </h2>

                </div>

            </div>

            <div class="productCategoriesList">

                <div class="row">

                    @forelse($subCategories as $subCategory)

                        <div class="col-sm-3 col-lg-2 d-flex">

                            <a href="{{ url('/products/category/'.$subCategory->slug) }}"
                               class="categoriesBox text-center">

                                <div class="categoriesThumb">

                                    <img src="{{ asset('storage/'.$subCategory->image) }}"
                                         class="imgResponsive"
                                         alt="{{ $subCategory->name }}">

                                </div>

                                <h6 class="categoriesName mb-0">

                                    {{ $subCategory->name }}

                                </h6>

                            </a>

                        </div>

                    @empty

                        <div class="col-md-12 text-center">

                            <p>
                                No sub categories found.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</section>

@endsection