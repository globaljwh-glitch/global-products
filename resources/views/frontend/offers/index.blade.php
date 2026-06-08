@extends('layouts.frontend')

@section('content')

<section class="sectionPadding policyTextBlock">
         <div class="container">
            <div class="row">
               <div class="col-md-10 m-auto">
               </div>
               <div class="d-flex align-items-center col-md-12">
                  <div class="w-100">
                     <h2 class="headingBlock underLineHeading">Special Offers</h2>

                    <div class="row">

                        @foreach($offers as $offer)

                            <div class="col-md-6 mb-4">

                                <!-- <a href="{{ route('offers.show', $offer->slug) }}"> -->
                                <a href="#">

                                    <img
                                        src="{{ asset('storage/'.$offer->image) }}"
                                        alt="{{ $offer->title }}"
                                        class="img-fluid rounded shadow">

                                </a>

                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection