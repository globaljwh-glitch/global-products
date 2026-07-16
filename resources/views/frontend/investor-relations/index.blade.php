@extends('layouts.frontend')

@section('content')

<section class="mainBanner text-center">
         <div class="container">
            <div class="row">
               <div class="col-md-12 d-flex align-items-center">
                  <div class="bannerContent mw-100 w-100">
                     <h1><span>INVESTOR</span> RELATIONS</h1>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="sectionPadding">
         <div class="container">
            <div class="row">
               <div class="d-flex align-items-center col-md-6 order-1 order-md-0">
                  <div class="w-100 pe-0 pe-lg-4 pt-3 pt-lg-0">
                     <h2>Our Organization</h2>
                     <p class="pe-0 pe-lg-3">Global Products Corporation is a trusted supplier of industrial products, equipment, and business solutions, <span class="text-red fw-bold">serving customers across diverse industries with a commitment to quality, reliability, and operational excellence</span>. Our comprehensive portfolio <span class="text-red fw-bold">includes premium industrial supplies, facility maintenance products, material handling equipment, safety solutions, storage systems</span>, and other essential business products designed to support efficient operations.</p>
                     <p class="pe-0 pe-lg-3">Built on strong customer relationships and industry expertise, we help businesses streamline procurement through dependable service, competitive pricing, and consistent product availability. By combining innovative sourcing strategies with a customer-first approach, <span class="text-red fw-bold">Global Products Corporation continues to deliver solutions that improve productivity</span> and support long-term business success.</p>
                  </div>
               </div>
               <div class="d-flex col-md-6 order-0 order-md-1">
                  <div class=""><img alt="" class="imgHeightResponsive" src="images/image-thumb-04.jpg"></div>
               </div>
            </div>
         </div>
      </section>
      <section class="sectionPadding imageBackground01">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <h2 class="text-white fw-bold">Reasons to Invest</h2>
                  <p class="text-white mb-0">Strengthened by industry expertise, trusted partnerships, and a customer-first approach.</p>
               </div>
            </div>
            <div class="mt-lg-5 mt-md-4 mt-3">
               <div class="row">
                  <div class="col-lg-3 col-sm-6 d-flex">
                     <div class="iconBox w-100 ps-4 pe-4">
                        <div class="icon mb-lg-3 mt-1 mb-2"><i class="fa-solid fa-star"></i></div>
                        <h5>Strong Industry Position</h5>
                        <p>Diversified product portfolio and deep industry expertise.</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 d-flex">
                     <div class="iconBox w-100 ps-4 pe-4">
                        <div class="icon mb-lg-3 mt-1 mb-2"><i class="fa-solid fa-users"></i></div>
                        <h5>Customer-Centric Growth</h5>
                        <p>We build lasting customer relationships and loyalty.</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 d-flex">
                     <div class="iconBox w-100 ps-4 pe-4">
                        <div class="icon mb-lg-3 mt-1 mb-2"><i class="fa-solid fa-cart-shopping"></i></div>
                        <h5>Efficient Digital Operations</h5>
                        <p>Technology-enabled processes and streamlined procurement.</p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 d-flex">
                     <div class="iconBox w-100 ps-4 pe-4">
                        <div class="icon mb-lg-3 mt-1 mb-2"><i class="fa-solid fa-dollar-sign"></i></div>
                        <h5>Long-Term Performance</h5>
                        <p>We remain committed to creating sustainable value.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- <section class="blogSection sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="text-center">
                     <h2 class="">Popular Reads</h2>
                     <p>Explore the latest insights, tips, freshest and most exciting news</p>
                  </div>
               </div>
               <div class="d-flex col-md-4">
                  <div class="blog bg-white" href="#">
                     <div class="blogThumb"><img alt="" class="imgHeightResponsive" src="images/blog-thumb-01.jpg"></div>
                     <div class="blogInfo">
                        <div class="blogDate">March 20, 2026</div>
                        <h5>The Retail Refresh Playbook: How Procurement Builds Seasonal Readiness at Scale</h5>
                        <p>Seasonal revenue windows are short. When execution slips, retailers do not get a second chance in the same quarter.</p>
                        <a href="#" class="customBtn01 blackBg mt-2 mb-1">Read More</a>
                     </div>
                  </div>
               </div>
               <div class="d-flex col-md-4">
                  <div class="blog bg-white" href="#">
                     <div class="blogThumb"><img alt="" class="imgHeightResponsive" src="images/blog-thumb-02.jpg"></div>
                     <div class="blogInfo">
                        <div class="blogDate">February 16, 2026</div>
                        <h5>Your Guide to Industrial Wall-Mounted Storage</h5>
                        <p>In industrial facilities, floor space disappears quickly. Equipment grows, inventory expands, and temporary</p>
                        <a href="#" class="customBtn01 blackBg mt-2 mb-1">Read More</a>
                     </div>
                  </div>
               </div>
               <div class="d-flex col-md-4">
                  <div class="blog bg-white" href="#">
                     <div class="blogThumb"><img alt="" class="imgHeightResponsive" src="images/blog-thumb-03.jpg"></div>
                     <div class="blogInfo">
                        <div class="blogDate">February 12, 2026</div>
                        <h5>A Clean Slate: How to Improve Maintenance of Warehouse & Industrial Floors</h5>
                        <p>Warehouse and industrial floors are under constant stress from heavy machinery and material production.</p>
                        <a href="#" class="customBtn01 blackBg mt-2 mb-1">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section> -->
      @include('frontend.partials.news')
       @include('frontend.partials.subscribe')

@endsection