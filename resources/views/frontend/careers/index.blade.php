@extends('layouts.frontend')

@section('content')

<section class="mainBanner text-center">
         <div class="container">
            <div class="row">
               <div class="col-md-12 d-flex align-items-center">
                  <div class="bannerContent mw-100 w-100">
                     <h1>Build Your Future <span>with Excellence</span></h1>
                     <p>Join a team driven by innovation, quality, and a passion for excellence.</p>
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
                     <h2>Life at <span>Our Company</span></h2>
                     <p>We cultivate an environment where innovation, collaboration, and continuous growth are at the heart of everything we do. Our workplace is designed to empower individuals, encourage new ideas, and foster a sense of ownership in every role.</p>
                     <p>Every team member plays a meaningful part in shaping our journey—contributing not only to business success but also to a culture built on trust, respect, and shared ambition. We believe that when people feel valued and inspired, they naturally deliver their best work.</p>
                     <ul>
                        <li>We encourage honest dialogue and the free exchange of ideas, ensuring every voice is heard and valued.</li>
                        <li>We celebrate achievements—big and small—acknowledging the dedication and impact of our team.</li>
                        <li>With continuous learning opportunities and new challenges, we support your journey toward personal and professional excellence.</li>
                        <li>We work together, support one another, and believe that the best results come from strong teamwork.</li>
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
                  <h2 class="text-white fw-bold">Why Join Us</h2>
                  <p class="text-white mb-0">We foster a culture of innovation, collaboration, and continuous growth.</p>
               </div>
            </div>
            <div class="mt-lg-5 mt-md-4 mt-3">
               <div class="row g-4">
                  <div class="col-md-3">
                     <div class="iconBox w-100">
                        <div class="icon mb-lg-3 mb-2"><i class="fa-solid fa-chart-line"></i></div>
                        <h5>Career Growth</h5>
                        <p>Continuous learning and advancement opportunities.</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="iconBox w-100">
                        <div class="icon mb-lg-3 mb-2"><i class="fa-solid fa-lightbulb"></i></div>
                        <h5>Innovation</h5>
                        <p>Work on ideas that shape the future of eCommerce.</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="iconBox w-100">
                        <div class="icon mb-lg-3 mb-2"><i class="fa-solid fa-users"></i></div>
                        <h5>Team Culture</h5>
                        <p>Collaborative, inclusive, and supportive workplace.</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="iconBox w-100">
                        <div class="icon mb-lg-3 mb-2"><i class="fa-solid fa-heart"></i></div>
                        <h5>Work-Life Balance</h5>
                        <p>We value your well-being and personal time.</p>
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
                  <h2 id="view-opening" class="fw-bold">Let’s Build Together</h2>
                  <p class="mb-0">Join a team where ambition meets opportunity. We seek individuals who bring not only expertise, but also a desire to challenge boundaries and elevate standards.</p>
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