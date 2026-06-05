@extends('layouts.frontend')

@section('content')

<section class="sectionPadding">

    <div class="container">

        <div class="text-center mb-5">
            <h2 class="headingBlock">
                Special Offers
            </h2>
        </div>

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

</section>

@endsection