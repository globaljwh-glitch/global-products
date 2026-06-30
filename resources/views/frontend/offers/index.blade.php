@extends('layouts.frontend')

@section('content')

<section class="mainBanner text-center">
         <div class="container">
            <div class="row">
               <div class="col-md-12 d-flex align-items-center">
                  <div class="bannerContent mw-100 w-100">
                     <h1>Special <span class="text-red">Offers</span></h1>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="sectionPadding">
         <div class="container">
            <div class="row">
                @foreach($offers as $offer)

                    <div class="col-sm-6">

                        <!-- <a href="{{ route('offers.show', $offer->slug) }}"> -->
                        <div class="smallBannerOffers">
                            <img
                                src="{{ asset('storage/'.$offer->image) }}"
                                alt="{{ $offer->title }}"
                                class="imgResponsive" />
                        </div>

                    </div>

                @endforeach
            </div>
            <div class="discountOfferLists mt-lg-5 mt-md-4 mt-3">
                <div class="row">
                    @foreach($offers as $offer)
                        <div class="col-md-4 col-sm-6 d-flex">
                            <div class="coupon shadow {{ $loop->odd ? 'imageBackground01' : 'imageBackground02' }} w-100">
                                <div class="coupon-top">
                                    
                                    <div class="sale-badge text-red">
                                        {{ $offer->title ?? 'LIMITED TIME OFFER' }}
                                    </div>

                                    <div class="discount {{ $loop->odd ? '' : 'text-blue' }}">
                                        {{ $offer->discount_value }}<span>{{ $offer->discount_type == 'percentage' ? '%' : '$' }}</span>
                                    </div>

                                    <div class="off-text {{ $loop->odd ? '' : 'text-blue' }}">
                                        OFF
                                    </div>

                                    <div class="description {{ $loop->odd ? '' : 'text-blue' }}">
                                        {{ $offer->description }}
                                    </div>
                                </div>

                                <div class="divider"></div>

                                <div class="coupon-bottom">
                                    
                                    <div class="coupon-code">
                                        {{ $offer->offer_code }}
                                    </div>

                                    <div class="validity {{ $loop->odd ? '' : 'text-blue' }}">
                                        Valid till {{ \Carbon\Carbon::parse($offer->offer_end)->format('d M Y') }}
                                    </div>

                                    <a href="{{ $offer->button_url ?? '#' }}" 
                                    class="customBtn01 mt-2 mb-1 {{ $loop->odd ? 'redBg' : 'blackBg' }}">
                                        {{ $offer->button_text }}
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- <div class="col-md-4 col-sm-6 d-flex">
                        <div class="coupon shadow blueBg w-100">
                            <div class="coupon-top">
                                <div class="sale-badge text-red">LIMITED TIME OFFER</div>
                                    <div class="discount">
                                        50<span>%</span>
                                    </div>
                                <div class="off-text">OFF</div>
                                <div class="description">
                                    Get 50% discount on all Storage &amp; Shelving.
                                    Minimum purchase ₹1999.
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="coupon-bottom">
                                <div class="coupon-code">SAVE50</div>
                                <div class="validity">
                                    Valid till 31 Dec 2026
                                </div>
                                <a href="#" class="customBtn01 mt-2 mb-1 text-white redBg">
                                    SHOP NOW
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 d-flex">
                        <div class="coupon shadow imageBackground02 w-100">
                            <div class="coupon-top">
                                <div class="sale-badge text-red">LIMITED TIME OFFER</div>
                                <div class="discount text-blue">
                                    30<span>%</span>
                                </div>
                                <div class="off-text  text-blue">OFF</div>
                                <div class="description  text-blue">
                                    Get 50% discount on all Storage &amp; Shelving.
                                    Minimum purchase ₹999.
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="coupon-bottom">
                                <div class="coupon-code">SAVE30</div>
                                <div class="validity text-blue">
                                    Valid till 31 Dec 2026
                                </div>
                                <a href="#" class="customBtn01 mt-2 mb-1 blackBg">
                                    SHOP NOW
                                </a>
                            </div>
                        </div>
                    </div> -->
               </div>
            </div>
         </div>
      </section>

      @include('frontend.partials.subscribe')

@endsection