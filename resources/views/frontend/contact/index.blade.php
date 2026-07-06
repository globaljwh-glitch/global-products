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

               <div class="validation-errors"></div>
               <!-- <form id="contactForm" action="{{ route('contact.store') }}" method="POST"> -->
               <form id="contactForm">
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
                        <!-- <div class="form-group">
                           <div class="mt-4">
                              <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>

                              @error('g-recaptcha-response')
                                 <small class="text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                        </div> -->
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

      <div class="modal fade" id="otpModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
         <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                     <h5>Verify OTP</h5>
                  </div>
                  <div class="modal-body">
                     <input type="text" id="otp" class="form-control" placeholder="Enter OTP">
                     <button id="verifyOtpBtn" class="btn btn-primary mt-3">
                        Verify OTP
                     </button>
                  </div>
            </div>
         </div>
      </div>

<script src="https://code.jquery.com/jquery-4.0.0.min.js"
        integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
<script>
// $('#contactForm').submit(function(e){
//     e.preventDefault();
// console.log($(this).serialize());
//     $.ajax({
//         url: "{{ route('contact.sendOtp') }}",
//         type: "POST",
//         data: $(this).serialize(),
//         success: function(response){
//             if(response.status){
//                 $('#otpModal').modal('show');
//             }
//         }
//     });
// });

$('#contactForm').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: "{{ route('contact.sendOtp') }}",
        type: "POST",
        data: $(this).serialize(),

        success: function(response) {
            $('#otpModal').modal('show');
        },

        error: function(xhr) {

            if (xhr.status == 422) {

                let errors = xhr.responseJSON.errors;

                $('.validation-errors').html('');

                $.each(errors, function(key, value) {
                    $('.validation-errors').append(
                        '<div class="alert alert-danger">'+value[0]+'</div>'
                    );
                });

            }

        }
    });
});

$('#verifyOtpBtn').click(function(){
    $.ajax({
        url: "{{ route('contact.verifyOtp') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            otp: $('#otp').val()
        },
        success: function(response){
            if(response.status){
               $('#otpModal').modal('hide');
               //alert('Form submitted successfully');
               $('.validation-errors').html(`
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     Form submitted successfully.
                     <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  </div>`);
               location.reload();
            } else {
                //alert('Invalid OTP');
                $('.validation-errors').html(`
                  <div class="alert alert-danger">
                  Invalid OTP
                  </div>
                `);
            }
        }
    });
});
</script>
@endsection