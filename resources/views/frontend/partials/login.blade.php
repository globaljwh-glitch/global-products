<section class="ctaBlock imageBackground01 sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-5 col-lg-6 d-flex align-items-center">
                  <div class="text-center w-100">
                     <h2 class="text-white text-uppercase fw-bold">New customer? Create Account. <br> Quick. Secure. Convenient.</h2>
                     <h5 class="text-white">Sign in to enjoy a personalized shopping experience</h5>
                     @auth

                        @if(auth()->user()->role == 2)

                            <a class="customBtn01 mt-2 me-1 text-white redBg" href="{{ route('customer.account') }}">My Account</a>

                        @endif

                        @else

                            <a class="customBtn01 mt-2 me-1 text-white redBg" href="{{ route('customer.login') }}">Sign IN</a> <a class="customBtn01 mt-2 bg-white text-blue" href="{{ route('customer.register') }}">Register</a>

                    @endauth
                     
                  </div>
               </div>
               <div class="col-md-7 col-lg-6 d-flex align-items-center">
                  <ul class="mb-0 w-100 text-white fw-semibold">
                     <li>Fast and secure online ordering</li>
                     <li>Quick checkout with saved payment preferences</li>
                     <li>Easily manage orders, returns, and cancellations</li>
                     <li>View complete order history with real-time tracking</li>
                     <li>Create multiple product lists for faster reordering</li>
                     <li>Save time with recurring purchases and repeat orders</li>
                     <li>Receive personalized product recommendations</li>
                     <li>Manage email notifications and account preferences</li>
                     <li>Request quotes and convert them into orders with ease</li>
                  </ul>
               </div>
            </div>
         </div>
      </section>