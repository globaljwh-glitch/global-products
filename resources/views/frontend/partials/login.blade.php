<section class="ctaBlock imageBackground01 sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-5 col-lg-6 d-flex align-items-center">
                  <div class="text-center w-100">
                     <h2 class="text-white text-uppercase fw-bold">New customer? Register now. <br> It is fast and easy.</h2>
                     <h5 class="text-white">Sign in for a personalized experience</h5>
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
                     <li>Enjoy a faster and more personalized checkout</li>
                     <li>Manage your payment preferences, returns, & cancellations</li>
                     <li>View your order history with easy order tracking</li>
                     <li>Create and manage multiple order lists, auto re-orders, & subscriptions</li>
                     <li>Get insights into savings and spending anytime</li>
                     <li>Receive more personalized product recommendations </li>
                     <li>Manage your communication preferences</li>
                     <li>Convert your quote to an order</li>
                  </ul>
               </div>
            </div>
         </div>
      </section>