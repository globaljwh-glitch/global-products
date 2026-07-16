@extends('layouts.frontend')

@section('content')

<section class="mainBanner text-center">
         <div class="container">
            <div class="row">
               <div class="col-md-12 d-flex align-items-center">
                  <div class="bannerContent mw-100 w-100">
                     <h1>Join a Team <span>That Builds Excellence</span></h1>
                     <p>Where talent, innovation, and growth come together.</p>
                     <a href="#view-opening" class="customBtn01 blackBg mt-2">View Openings</a>
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
                     <h2>Life at <span>Global Products Corporation</span></h2>
                     <p>We believe that great businesses are built by great people. We foster a workplace where collaboration, innovation, and professional development are part of our everyday culture. Every individual is empowered to contribute fresh ideas, solve real-world industrial challenges, and make a meaningful impact.</p>
                     <p>Our people are at the center of everything we do. Whether you're supporting customers, driving operations, developing new solutions, or strengthening supply chains, your work helps deliver reliable products and exceptional service to businesses worldwide.</p>
                     <ul>
                        <li>We encourage open communication, teamwork, and the exchange of ideas that inspire continuous improvement.</li>
                        <li>We recognize dedication and celebrate achievements that contribute to individual and organizational success.</li>
                        <li>We provide opportunities for learning, skill development, and career advancement to help you reach your full potential.</li>
                        <li>We believe strong collaboration, mutual respect, and shared goals create a workplace where everyone can succeed.</li>
                     </ul>
                  </div>
               </div>
               <div class="d-flex col-md-6 order-0 order-md-1">
                  <div class=""><img alt="" class="imgHeightResponsive" src="images/image-thumb-03.jpg"></div>
               </div>
            </div>
         </div>
      </section>
      <section class="sectionPadding imageBackground01">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <h2 class="text-white fw-bold">Discover the Benefits</h2>
                  <p class="text-white mb-0">Build a rewarding career with a company committed to innovation, quality, and professional excellence.</p>
               </div>
            </div>
            <div class="mt-lg-5 mt-md-4 mt-3">
               <div class="row g-4">
                  <div class="col-md-3">
                     <div class="iconBox w-100">
                        <div class="icon mb-lg-3 mb-2"><i class="fa-solid fa-chart-line"></i></div>
                        <h5>Development</h5>
                        <p>Expand your knowledge through continuous learning.</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="iconBox w-100">
                        <div class="icon mb-lg-3 mb-2"><i class="fa-solid fa-lightbulb"></i></div>
                        <h5>Innovation</h5>
                        <p>Work with industry professionals to develop solutions.</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="iconBox w-100">
                        <div class="icon mb-lg-3 mb-2"><i class="fa-solid fa-users"></i></div>
                        <h5>Collaboration</h5>
                        <p>Shared success across every department.</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="iconBox w-100">
                        <div class="icon mb-lg-3 mb-2"><i class="fa-solid fa-heart"></i></div>
                        <h5>Growth & Well-Being</h5>
                        <p>We promote a healthy work environment.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-lg-10 m-auto text-center">
                  <h2 id="view-opening" class="fw-bold">Let's Build the Future Together</h2>
                  <p class="mb-0">At Global Products Corporation, we welcome passionate professionals who are ready to grow their careers, embrace new challenges, and help deliver excellence to customers across industries.</p>
               </div>
            </div>
            <div class="mt-lg-5 mt-md-4 mt-3">

            <div class="jobListing">

                @forelse($careers as $career)

                    <div class="jobCard d-flex justify-content-between align-items-center greyBg">
                        <div>
                            <h5>{{ $career->title }}</h5>

                            <p class="mb-2 mb-md-0">
                                <i class="fa-solid fa-briefcase"></i>
                                {{ $career->job_type }}

                                &nbsp;

                                <i class="fa-solid fa-location-dot"></i>
                                {{ $career->location }}
                            </p>
                        </div>

                        <a href="{{ route('careers.show', $career->id) }}"
                        class="customBtn01 text-white redBg">
                            Apply
                        </a>
                    </div>

                @empty

                    <div class="alert alert-info">
                        No job openings available at the moment.
                    </div>

                @endforelse

            </div>
               <!-- <div class="jobListing">
                  <div class="jobCard d-flex justify-content-between align-items-center greyBg">
                     <div>
                        <h5>Frontend Developer (React / UI Developer)</h5>
                        <p class="mb-2 mb-md-0"><i class="fa-solid fa-briefcase"></i> Full Time &nbsp;<i class="fa-solid fa-location-dot"></i> Remote</p>
                     </div>
                     <a href="#" class="customBtn01 text-white redBg">Apply</a>
                  </div>
                  <div class="jobCard d-flex justify-content-between align-items-center greyBg">
                     <div>
                        <h5>Digital Marketing Specialist</h5>
                        <p class="mb-2 mb-md-0"><i class="fa-solid fa-briefcase"></i> Full Time  &nbsp;<i class="fa-solid fa-location-dot"></i> On-site</p>
                     </div>
                     <a href="#" class="customBtn01 text-white redBg">Apply</a>
                  </div>
                  <div class="jobCard d-flex justify-content-between align-items-center greyBg">
                     <div>
                        <h5>Inventory & Supply Chain Executive</h5>
                        <p class="mb-2 mb-md-0"><i class="fa-solid fa-briefcase"></i> Full Time  &nbsp;<i class="fa-solid fa-location-dot"></i> On-site</p>
                     </div>
                     <a href="#" class="customBtn01 text-white redBg">Apply</a>
                  </div>
                  <div class="jobCard d-flex justify-content-between align-items-center greyBg">
                     <div>
                        <h5>Business Development Executive</h5>
                        <p class="mb-2 mb-md-0"><i class="fa-solid fa-briefcase"></i> Full Time  &nbsp;<i class="fa-solid fa-location-dot"></i> On-site</p>
                     </div>
                     <a href="#" class="customBtn01 text-white redBg">Apply</a>
                  </div>
               </div> -->
            </div>
         </div>
      </section>

      @endsection