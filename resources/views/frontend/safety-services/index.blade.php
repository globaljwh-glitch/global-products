@extends('layouts.frontend')

@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<section class="mainBanner text-center">
         <div class="container">
            <div class="row">
               <div class="col-md-12 d-flex align-items-center">
                  <div class="bannerContent mw-100 w-100">
                     <h1><span>SAFETY</span> SERVICES</h1>
                     <p>Offering greater value with a fast, simple, and effective portfolio of safety industry leaders.</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p class="fw-bold">Complete the Form Below to Receive a Call From Our Certified Safety Professional to Discuss Your Specific Safety Needs and Customized Solutions.</p>
               </div>
            </div>
            <div class="formBlockOuter mt-3">
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
                <form action="{{ route('safety-services.store') }}" method="POST">
                  @csrf
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group"><label>Company Name <span>*</span></label><input class="form-control" type="text" name="company_name" required></div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group"><label>Business Type <span>*</span></label><input class="form-control" type="text" name="business_type" required></div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group"><label>Street Address <span>*</span></label><input class="form-control" type="text" name="street_address" required></div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group"><label>City <span>*</span></label><input class="form-control" type="text" name="city" required></div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group"><label>State / Providence <span>*</span></label><input class="form-control" type="text" name="state" required></div>
                     </div>
                     <div class="col-md-6">   
                        <div class="form-group"><label>Zip Code <span>*</span></label><input class="form-control" type="text" name="zip_code" required></div>
                     </div>
                     <div class="col-md-6">   
                        <div class="form-group"><label>Name <span>*</span></label><input class="form-control" type="text" name="name" required></div>
                     </div>
                     <div class="col-md-6">   
                        <div class="form-group"><label>Title <span>*</span></label><input class="form-control" type="text" name="title" required></div>
                     </div>
                     <div class="col-md-6">   
                        <div class="form-group"><label>Phone <span>*</span></label><input class="form-control" type="text" name="phone" required></div>
                     </div>
                     <div class="col-md-6">   
                        <div class="form-group"><label>Email <span>*</span></label><input class="form-control" type="email" name="email" required></div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group"><label>What Service Are You Interested In Scheduling? <span>*</span></label><textarea name="service_required" rows="9" class="form-control" required></textarea></div>
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

       @include('frontend.partials.subscribe')

@endsection