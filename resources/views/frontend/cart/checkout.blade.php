@extends('layouts.frontend')

@section('content')

<section class="sectionPadding imageBackground02">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="text-center">
                     <h2 class="fw-bold welcomeUser"><span class="text-red">Welcome</span> User Name</h2>
                  </div>
                  <div class="userProfileImage">
                     <a href="#" class="d-block shadow"><img src="images/user-image.jpg" alt="User" class="imgResponsive"></a>
                     <div class="memberSince fw-bold">Member Since 2026</div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="sectionPadding profileInfoOuter">
         <div class="container">
            <div class="row ">
               <div class="col-lg-8">
                  <!-- Contact -->
                  <div class="checkout-box">
                     <h5 class="section-title">Contact Information</h5>
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="col-md-6">
                           <input type="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="col-md-6">
                           <input type="text" class="form-control" placeholder="Phone Number">
                        </div>
                     </div>
                  </div>
                  <!-- Address -->
                  <div class="checkout-box">
                     <h5 class="section-title">Shipping Address</h5>
                     <div class="">
                        <input type="text" class="form-control" placeholder="Address Line 1">
                     </div>
                     <div class="">
                        <input type="text" class="form-control" placeholder="Address Line 2">
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <input type="text" class="form-control" placeholder="City">
                        </div>
                        <div class="col-md-4">
                           <input type="text" class="form-control" placeholder="State">
                        </div>
                        <div class="col-md-4">
                           <input type="text" class="form-control" placeholder="Pincode">
                        </div>
                     </div>
                     <div class="">
                        <select class="form-control">
                           <option>India</option>
                        </select>
                     </div>
                  </div>
                  <!-- Shipping -->
                  <div class="checkout-box">
                     <h5 class="section-title">Shipping Method</h5>
                     <div class="payment-option active mb-2">
                        <input type="radio" checked> Standard Delivery (3-5 days) - ₹50
                     </div>
                     <div class="payment-option">
                        <input type="radio"> Express Delivery (1-2 days) - ₹150
                     </div>
                  </div>
                  <!-- Payment -->
                  <div class="checkout-box">
                     <h5 class="section-title">Payment Method</h5>
                     <div class="payment-option active mb-2">
                        <input type="radio" checked> UPI / Google Pay / PhonePe
                     </div>
                     <div class="payment-option mb-2">
                        <input type="radio"> Credit / Debit Card
                     </div>
                     <div class="payment-option mb-2">
                        <input type="radio"> Net Banking
                     </div>
                     <div class="payment-option">
                        <input type="radio"> Cash on Delivery
                     </div>
                  </div>
               </div>
               <!-- RIGHT SECTION -->
               <div class="col-lg-4">
                  <div class="checkout-box sticky-summary greyBg">
                     <h5 class="section-title">Order Summary</h5>
                     <!-- Product -->
                     <div class="d-flex align-items-center">
                        <img src="images/products/product-thumb-02.jpg" class="product-img me-2">
                        <div class="flex-grow-1 pe-2">
                           <h6 class="mb-1">Nexel® Stem Casters Set (4), 5" Polyurethane Wheel, 2 with Brakes, 1200 Lb Capacity</h6>
                           <small  class="text-red fw-bold">Qty: 2</small>
                        </div>
                        <strong>$61.90</strong>
                     </div>
                     <div class="d-flex align-items-center">
                        <img src="images/products/product-thumb-03.jpg" class="product-img me-2">
                        <div class="flex-grow-1 pe-2">
                           <h6 class="mb-1">L-Desks with Adjustable Height Return</h6>
                           <small class="text-red fw-bold">Qty: 1</small>
                        </div>
                        <strong>$45.75</strong>
                     </div>
                     <div class="d-flex align-items-center">
                        <img src="images/products/product-thumb-03.jpg" class="product-img me-2">
                        <div class="flex-grow-1 pe-2">
                           <h6 class="mb-1">L-Desks with Adjustable Height Return</h6>
                           <small class="text-red fw-bold">Qty: 1</small>
                        </div>
                        <strong>$45.75</strong>
                     </div>
                     <hr>
                     <!-- Price -->
                     <div class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span class="fw-bold">$153.40</span>
                     </div>
                     <div class="d-flex justify-content-between">
                        <span>Discount</span>
                        <span class="fw-bold text-success">-$20</span>
                     </div>
                     <div class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span class="fw-bold">$25</span>
                     </div>
                     <div class="d-flex justify-content-between">
                        <span>Tax (GST)</span>
                        <span class="fw-bold">$25</span>
                     </div>
                     <hr>
                     <div class="d-flex justify-content-between fw-bold">
                        <span>Total Paid</span>
                        <span class="text-red productPrice">$183.40</span>
                     </div>
                     <button class="btn btn-primary w-100 mt-2 mt-md-3 customBtn01 redBg text-white">
                     Place Order
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </section>

@endsection