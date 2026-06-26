@extends('layouts.frontend')

@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<section class="sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="text-center">
                     <h2 class="">Get in Touch With Our Team</h2>
                     <p>We’re here to assist you. Fill out the inquiry form below, or reach out via phone, email, post, or our live chat support for quick assistance.</p>
                  </div>
               </div>
            </div>
            <div class="formBlockOuter mt-5">
               @if ($errors->any())
                  <div class="alert alert-danger">
                     <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                     </ul>
                  </div>
               @endif

               @if(session('success'))
                  <div class="alert alert-success">
                     {{ session('success') }}
                  </div>
               @endif
               <form action="{{ route('contact.store') }}" method="POST">
                  @csrf
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group"><label>First Name <span>*</span></label><input class="form-control" type="text" value="{{ old('first_name') }}" name="first_name"></div>
                        <div class="form-group"><label>Email Address <span>*</span></label><input class="form-control" type="email" value="{{ old('email') }}" name="email"></div>
                        <div class="form-group"><label>Company Name <span>*</span></label><input class="form-control" type="text" value="{{ old('company_name') }}" name="company_name"></div>
                        <div class="form-group"><label>City <span>*</span></label><input class="form-control" type="text" value="{{ old('city') }}" name="city"></div>
                        <div class="form-group"><label>Zip Code <span>*</span></label><input class="form-control" type="text" value="{{ old('zip_code') }}" name="zip_code"></div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group"><label>Last Name <span>*</span></label><input class="form-control" type="text" value="{{ old('last_name') }}" name="last_name"></div>
                        <div class="form-group"><label>Phone Number <span>*</span></label><input class="form-control" type="text" value="{{ old('phone') }}" name="phone"></div>
                        <div class="form-group"><label>Street Address <span>*</span></label><input class="form-control" type="text" value="{{ old('street_address') }}" name="street_address"></div>
                        <div class="form-group"><label>State <span>*</span></label><input class="form-control" type="text" value="{{ old('state') }}" name="state"></div>
                        <div class="form-group"><label>Country <span>*</span></label><input class="form-control" type="text" value="{{ old('country') }}" name="country"></div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group"><label>What products are you interested in? <span>*</span></label><textarea rows="9" class="form-control" name="message">{{ old('message') }}</textarea></div>
                        <div class="form-group">
                           <div class="mt-4">
                              <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>

                              @error('g-recaptcha-response')
                                 <small class="text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                        </div>
                        <div class="form-group">
                           <div><button type="submit" class="mt-2 submitBtn btn-lg btn-block customBtn01 redBg d-inline-block">SUBMIT</button></div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!-- <section class="newsLetterBlock greyBg sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-lg-6 d-flex align-items-center">
                  <div class="w-100">
                     <h2 class="fw-bold">Be the first to know about our daily sales!</h2>
                     <p class="mb-lg-0 pe-lg-4">Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks.</p>
                  </div>
               </div>
               <div class="col-md-12 col-lg-6 d-flex align-items-center">
                  <div class="input-group subscribeNews ps-lg-3">
                     <input type="text" class="form-control form-control-lg text-end-0" id="" placeholder="Enter Email Address" >
                     <button class="btn btn-lg customBtn01 redBg" type="submit" id="btnSearch">SubScribe</button>
                  </div>
               </div>
            </div>
         </div>
      </section> -->
      @include('frontend.partials.subscribe')


<!-- <div class="container py-5">
    <h2>Contact Us</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Message</label>
            <textarea name="message" class="form-control"></textarea>
            @error('message') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-primary">Send Message</button>
    </form>
</div> -->

@endsection