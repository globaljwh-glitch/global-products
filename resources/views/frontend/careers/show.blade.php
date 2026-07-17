@extends('layouts.frontend')

@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<section class="sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-10 m-auto">
               </div>
               <div class="d-flex align-items-center col-md-12">

                  <div class="w-100">

                     <div class="blogDate">
                        {{ $career->posted_date ? \Carbon\Carbon::parse($career->posted_date)->format('F d, Y') : $career->created_at->format('F d, Y') }}
                     </div>

                     <h2 class="headingBlock underLineHeading">
                        {{ $career->title }}
                     </h2>

                     <p>
                        <i class="fa-solid fa-location-dot me-1"></i>
                        {{ $career->location }}

                        &nbsp; | &nbsp;

                        <i class="fa-solid fa-briefcase me-1"></i>
                        {{ $career->job_type }}
                     </p>

                     @if($career->overview)
                        <h4 class="mt-4">Role Overview</h4>
                        {!! nl2br(e($career->overview)) !!}
                     @endif

                     @if($career->responsibilities)
                        <h4 class="mt-4">Key Responsibilities</h4>
                        {!! $career->responsibilities !!}
                     @endif

                     @if($career->skills)
                        <h4 class="mt-4">Required Skills</h4>
                        {!! $career->skills !!}
                     @endif

                     @if($career->qualifications)
                        <h4 class="mt-4">Preferred Qualifications</h4>
                        {!! $career->qualifications !!}
                     @endif

                     @if($career->offer)
                        <h4 class="mt-4">What We Offer</h4>
                        {!! $career->offer !!}
                     @endif

                  </div>


                  <!-- <div class="w-100">
                     <div class="blogDate">February 16, 2026</div>
                     <h2 class="headingBlock underLineHeading">Frontend Developer (React / UI Developer)</h2>
                     <p><i class="fa-solid fa-location-dot me-1"></i> Remote / On-site &nbsp; | &nbsp; <i class="fa-solid fa-briefcase me-1"></i> Full-Time</p>
                     <h4 class="mt-4">Role Overview</h4>
                     <p>We are looking for a skilled and detail-oriented Frontend Developer to build modern, high-performance, and visually refined user interfaces. You will collaborate with designers and backend teams to create seamless digital experiences for our Commerce platform.</p>
                     <h4 class="mt-4">Key Responsibilities</h4>
                     <ul>
                        <li>
                           Design and develop scalable, high-performance user interfaces using <strong>React.js</strong>, ensuring a smooth and engaging user experience.
                        </li>
                        <li>
                           Translate UI/UX designs, wireframes, and prototypes into clean, maintainable, and reusable code with pixel-perfect accuracy.
                        </li>
                        <li>
                           Ensure responsive design across all devices and screen sizes, maintaining consistency across modern browsers and platforms.
                        </li>
                        <li>
                           Integrate frontend components with backend services and APIs, ensuring seamless data flow and real-time updates.
                        </li>
                        <li>
                           Optimize application performance by improving load times, reducing unnecessary re-renders, and implementing best practices.
                        </li>
                        <li>
                           Collaborate closely with designers, backend developers, and product teams to deliver features aligned with business goals and user needs.
                        </li>
                        <li>
                           Maintain and improve code quality through proper documentation, version control (Git), and adherence to coding standards.
                        </li>
                        <li>
                           Stay updated with the latest frontend technologies, frameworks,  and UI trends to continuously enhance the product experience.
                        </li>
                        <li>
                           Identify and troubleshoot UI/UX issues, bugs, and performance bottlenecks  to ensure a seamless and reliable application.
                        </li>
                     </ul>
                     <h4 class="mt-4">Required Skills</h4>
                     <ul>
                        <li>HTML, CSS, JavaScript (ES6+)</li>
                        <li>React.js experience</li>
                        <li>Bootstrap / Tailwind CSS</li>
                        <li>REST API integration</li>
                        <li>Git version control</li>
                     </ul>
                     <h4 class="mt-4">Preferred Qualifications</h4>
                     <ul>
                        <li>Experience in eCommerce projects</li>
                        <li>Knowledge of TypeScript</li>
                        <li>Performance optimization techniques</li>
                        <li>Basic SEO understanding</li>
                     </ul>
                     <h4 class="mt-4">What We Offer</h4>
                     <ul>
                        <li>Competitive salary</li>
                        <li>Growth opportunities</li>
                        <li>Collaborative work culture</li>
                        <li>Learning and development support</li>
                     </ul>
                  </div> -->
               </div>
            </div>
         </div>
      </section>
      <section class="blogSection greyBg sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-lg-10 m-auto">
                  <div class="text-center">
                     <h2 class="fw-bold">Apply for this Role</h2>
                     <p>Join a team where ambition meets opportunity.</p>
                  </div>
               </div>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
               {{ session('success') }}
            </div>
            @endif
            <form class="mt-3"
               action="{{ route('careers.apply', $career) }}"
               method="POST"
               enctype="multipart/form-data">

               @csrf

               <div class="row">

                  <div class="col-md-6">
                        <input type="text"
                              name="full_name"
                              class="form-control mb-2 mb-md-3"
                              placeholder="Full Name"
                              required>
                  </div>

                  <div class="col-md-6">
                        <input type="email"
                              name="email"
                              class="form-control mb-2 mb-md-3"
                              placeholder="Email Address"
                              required>
                  </div>

                  <div class="col-md-6">
                        <input type="tel"
                              name="phone_number"
                              class="form-control mb-2 mb-md-3"
                              placeholder="Phone Number"
                              required>
                  </div>

                  <div class="col-md-6">
                        <input type="file"
                              name="resume"
                              class="form-control mb-2 mb-md-3"
                              accept=".pdf,.doc,.docx"
                              required>
                  </div>

                  <div class="col-md-12">
                        <textarea name="cover_letter"
                                 class="form-control"
                                 rows="5"
                                 placeholder="Cover Letter (Optional)"></textarea>
                  </div>

                  <div class="col-md-6">
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>

                        @error('g-recaptcha-response')
                           <small class="text-danger">{{ $message }}</small>
                        @enderror
                  </div>
                  <div class="col-md-6 text-end">
                        <button type="submit"
                              class="mt-2 mt-md-3 submitBtn btn-lg btn-block customBtn01 redBg d-inline-block">
                           <i class="fa-solid fa-paper-plane me-1"></i>
                           Apply Now
                        </button>
                  </div>

               </div>

            </form>

            <!-- <form class="mt-3">
               <div class="row">
                  <div class="col-md-6">
                     <input type="text" class="form-control mb-2 mb-md-3" placeholder="Full Name" required>
                  </div>
                  <div class="col-md-6">
                     <input type="email" class="form-control mb-2 mb-md-3" placeholder="Email Address" required>
                  </div>
                  <div class="col-md-6">
                     <input type="tel" class="form-control mb-2 mb-md-3" placeholder="Phone Number" required>
                  </div>
                  <div class="col-md-6">
                     <input type="file" class="form-control mb-2 mb-md-3">
                  </div>
                  <div class="col-md-12">
                     <textarea class="form-control" rows="3" placeholder="Cover Letter (Optional)"></textarea>
                  </div>
                  <div class="col-md-6">
                     <button type="submit" class="mt-2 mt-md-3 submitBtn btn-lg btn-block customBtn01 redBg d-inline-block">
                     <i class="fa-solid fa-paper-plane me-1"></i> Apply Now
                     </button>
                  </div>
                  \
            </form> -->
            </div>
         </div>
      </section>

@endsection