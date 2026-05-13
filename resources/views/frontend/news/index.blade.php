@extends('layouts.frontend')

@section('content')

<section class="mainBanner text-center">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-lg-10 m-auto d-flex align-items-center">
                  <div class="bannerContent mw-100 w-100">
                     <h1>Popular Reads</h1>
                     <p>Stay ahead with the latest insights, expert tips, and breaking updates that matter. Discover fresh ideas, emerging trends, and exciting news shaping the world around you. Your daily dose of inspiration, knowledge, and what’s next.</p>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="blogSection sectionPadding">
         <div class="container">
            <div class="row">
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
               <div class="d-flex col-md-4">
                  <div class="blog bg-white" href="#">
                     <div class="blogThumb"><img alt="" class="imgHeightResponsive" src="images/blog-thumb-01.jpg"></div>
                     <div class="blogInfo">
                        <div class="blogDate">February 12, 2026</div>
                        <h5>A Clean Slate: How to Improve Maintenance of Warehouse & Industrial Floors</h5>
                        <p>Warehouse and industrial floors are under constant stress from heavy machinery and material production.</p>
                        <a href="#" class="customBtn01 blackBg mt-2 mb-1">Read More</a>
                     </div>
                  </div>
               </div>
               <div class="d-flex col-md-4">
                  <div class="blog bg-white" href="#">
                     <div class="blogThumb"><img alt="" class="imgHeightResponsive" src="images/blog-thumb-02.jpg"></div>
                     <div class="blogInfo">
                        <div class="blogDate">February 12, 2026</div>
                        <h5>A Clean Slate: How to Improve Maintenance of Warehouse & Industrial Floors</h5>
                        <p>Warehouse and industrial floors are under constant stress from heavy machinery and material production.</p>
                        <a href="#" class="customBtn01 blackBg mt-2 mb-1">Read More</a>
                     </div>
                  </div>
               </div>

               <div class="col-md-12">
                  <div class="paginationOuter d-flex align-items-center justify-content-between">
                     <div>Showing 1-10 of 45 results</div>
                     <ul class="pagination mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2 <span class="sr-only">(current)</span></a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="newsLetterBlock greyBg sectionPadding">
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
      </section>

@endsection