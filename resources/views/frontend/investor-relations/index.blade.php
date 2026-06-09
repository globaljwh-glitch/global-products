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
                     <h2>Corporate Overview</h2>
                     <p class="pe-0 pe-lg-3">Global Products is a leading distributor of high-quality, industrial-strength equipment and supplies, serving organizations of all sizes across a wide range of industries. With <span class="text-red fw-bold">more than 75 years of experience</span>, customers rely on Global Products for its broad portfolio of national and private brands, trusted service, and focus on value. We help customers keep their operations <span class="text-red fw-bold">running by delivering the right products</span> when they need them, because We Can Supply ThatTM.</p>
                     <p class="pe-0 pe-lg-3">Global Products supplies businesses across North America, offering a vast selection of industrial-strength <span class="text-red fw-bold">products across 21 prime categories</span>, including material handling, storage & shelving, safety & security, janitorial & facility maintenance, and HVAC & fans. Headquartered in Port Washington, New York, Global Products traces its origins back to 1949, when it was founded as Global Equipment Company.</p>
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
                  <h2 class="text-white fw-bold">Why Invest</h2>
                  <p class="text-white mb-0">We focus on delivering value, quality, and trust in every order.</p>
               </div>
            </div>
            <div class="mt-lg-5 mt-md-4 mt-3">
               <div class="row">
                  <div class="col-lg-3 col-sm-6 d-flex">
                     <div class="iconBox w-100 ps-4 pe-4">
                        <div class="icon mb-lg-3 mt-1 mb-2"><i class="fa-solid fa-star"></i></div>
                        <h5>Leading player in fragmented industry</h5>
                        <p>We provide you with all the tools you need as an affiliate. </p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 d-flex">
                     <div class="iconBox w-100 ps-4 pe-4">
                        <div class="icon mb-lg-3 mt-1 mb-2"><i class="fa-solid fa-users"></i></div>
                        <h5>Powerful customer growth model</h5>
                        <p>We provide you with all the tools you need as an affiliate. </p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 d-flex">
                     <div class="iconBox w-100 ps-4 pe-4">
                        <div class="icon mb-lg-3 mt-1 mb-2"><i class="fa-solid fa-cart-shopping"></i></div>
                        <h5>Robust e-commerce functionality</h5>
                        <p>We provide you with all the tools you need as an affiliate. </p>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 d-flex">
                     <div class="iconBox w-100 ps-4 pe-4">
                        <div class="icon mb-lg-3 mt-1 mb-2"><i class="fa-solid fa-dollar-sign"></i></div>
                        <h5>Strong financial profile</h5>
                        <p>We provide you with all the tools you need as an affiliate. </p>
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