<div class="topBar blueBg d-flex">
   <div class="container">
      <div class="row">
         <div class="col-md-6 d-flex align-items-center">
            <p class="mb-0 fw-medium">Summer sale discount 50% off! <a href="{{ route('products.index') }}">Shop Now</a>
            </p>
         </div>
         <div class="col-md-6 d-flex align-items-center justify-content-end">
            <ul class="topInfoList d-flex mb-0 p-0">

               @auth

                  @if(auth()->user()->role == 2)

                     <li class="userAccount">

                        <a href="{{ route('customer.account') }}" 
                           aria-expanded="false">

                           My Account
                        </a>

                        <!-- <ul class="dropdown-menu shadow border-0"> -->
                          <!-- <li>
                              <form method="POST" action="{{ route('customer.logout') }}">
                                 @csrf

                                 <button type="submit" class="dropdown-item">
                                    Logout
                                 </button>
                              </form>
                           </li> -->

                        <!-- </ul> -->

                     </li>

                  @endif

               @else

                  <li>
                     <a href="{{ route('customer.login') }}">
                        Sign In
                     </a>
                  </li>

               @endauth


               <li>
                  <a href="#">
                     Careers
                  </a>
               </li>

               <li>
                  <a href="{{ route('contact') }}">
                     Contact Us
                  </a>
               </li>

            </ul>
         </div>
      </div>
   </div>
</div>
<header>
   <nav class="navbar navbar-expand-lg">
      <div class="container">
         <a class="navbar-brand" href="{{ route('home.index') }}"><img src="{{ asset('images/logo.jpg') }}"
               alt="Global Products Corporation" class="imgResponsive" /></a>
         <button class="navbar-toggler order-1 order-md-1" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
         </button>
         <div class="collapse navbar-collapse order-2 order-md-2 order-lg-0" id="navbarNavDropdown">
            <ul class="navbar-nav m-auto">
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">Products</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <li>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Storage &amp; Shelving</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Safety &amp; Security</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Plumbing &amp; Pumps</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Material Handling</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">HVAC &amp; Fans</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Workbenches &amp; Shop Desks</a>
                     </li>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">Shop By Brands</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <li>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Storage &amp; Shelving</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Safety &amp; Security</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Plumbing &amp; Pumps</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Material Handling</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">HVAC &amp; Fans</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Workbenches &amp; Shop Desks</a>
                     </li>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">Shop By Industry</a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <li>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Storage &amp; Shelving</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Safety &amp; Security</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Plumbing &amp; Pumps</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Material Handling</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">HVAC &amp; Fans</a>
                        <a class="dropdown-item" href="{{ route('products.index') }}">Workbenches &amp; Shop Desks</a>
                     </li>
                  </ul>
               </li>
               <!-- <li class="nav-item">
                        <a class="nav-link" href="#" id="" role="" >Quick Order</a>
                     </li> -->
               <li class="nav-item">
                  <a class="nav-link" href="#" id="" role="">Catalog Request</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#" id="" role="">Special Offers</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#" id="" role="">About Us</a>
               </li>
            </ul>
         </div>
         <div class="headerIcons order-0 order-md-0 order-lg-1 ms-auto me-2 me-sm-4 me-lg-0">
            <ul class="mb-0 ps-0">
               <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i></a></li>
               <li><a href="#"><i class="fa-regular fa-user"></i></a></li>
               <li><a href="#"><i class="fa-regular fa-heart"></i></a></li>
               <li><a href="#"><i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
         </div>
      </div>
   </nav>
</header>