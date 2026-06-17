@extends('layouts.frontend')

@section('content')
<section class="sectionPadding">
    <div class="container">
        <div class="row">

            <div class="col-md-10 m-auto">

                @if($news_detail)

                    <div class="blogDate mb-3">
                        {{ \Carbon\Carbon::parse($news_detail->created_at)->format('F d, Y') }}
                    </div>

                    <h2 class="mb-4">
                        {{ $news_detail->title }}
                    </h2>

                    @if($news_detail->excerpt)
                        <p class="mb-4">
                            {{ strip_tags($news_detail->excerpt) }}
                        </p>
                    @endif


                    @if($news_detail->image)
                        <div class="mb-3 mb-md-4 mb-lg-5">
                            <img 
                                alt="{{ $news_detail->title }}"
                                class="imgResponsive"
                                src="{{ asset('storage/'.$news_detail->image) }}">
                        </div>
                    @endif


                    <div class="newsContent">
@php
    $description = html_entity_decode($news_detail->description);

    $description = preg_replace('/<p>(&nbsp;|\s|<br\s*\/?>)*<\/p>/i', '', $description);

    $description = preg_replace('/(&nbsp;)+/i', ' ', $description);
@endphp
                        {!! str_replace('&nbsp;', '', html_entity_decode($description)) !!}

                    </div>

                @else

                    <div class="alert alert-danger">
                        News not found.
                    </div>

                @endif

            </div>

        </div>
    </div>
</section>


<!-- <section class="sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-10 m-auto">
               </div>
               <div class="d-flex align-items-center col-md-12">
                  <div class="w-100">
                     <div class="blogDate">February 16, 2026</div>
                     <h2>Your Guide to Industrial Wall-Mounted Storage</h2>
                     <p>With over 75 years of experience and hundreds of thousands of products, Global Industrial continues to be the source for industrial equipment and supplies that keep your business running efficiently. Serving all of North America, Global Industrial offers a vast selection of hand-picked and tested industrial-strength products, including material handling, storage &amp; shelving, safety &amp; security, janitorial &amp; facility maintenance, and HVAC &amp; fans. Our combination of innovative experts and extensive product knowledge allows us to deliver customized solutions to the public sector and businesses of all sizes—prioritizing efficiency, value, and a customer-first approach.</p>
                     <div class="mb-3 mb-md-4 mb-lg-5"><img alt="" class="imgResponsive" src="images/blogs/blog-thumb-02.jpg"></div>
                     <h3>Where Quality Meets Excellence</h3>
                     <p>We bring together thoughtful curation, precision, and an unwavering attention to detail to deliver an experience that reflects true quality. From the moment you explore our collection to the final delivery at your doorstep, very touchpoint is carefully designed to feel seamless, refined, and dependable. Our approach goes beyond simply offering products—we focus on creating a sense of trust, consistency, and lasting value. By continuously refining our processes and elevating our standards, we ensure that every interaction embodies excellence and leaves a lasting impression.</p>
                     <p>Our experience and hand-picked & tested product selection have positioned us to be the source for industrial equipment and supplies, with teams of experts who know your business & your unique needs.</p>
                     <ul>
                        <li>Extensive account management tools</li>
                        <li>Selection of hundreds of thousands of products</li>
                        <li>Same-day shipments on most orders</li>
                        <li>Competitive, budget-friendly pricing</li>
                        <li>Extended service plans</li>
                     </ul>
                     <h3>Green Opportunities Outside the Office</h3>
                     <p>We bring together thoughtful curation, precision, and an unwavering attention to detail to deliver an experience that reflects true quality. From the moment you explore our collection to the final delivery at your doorstep, very touchpoint is carefully designed to feel seamless, refined, and dependable. Our approach goes beyond simply offering products—we focus on creating a sense of trust, consistency, and lasting value. By continuously refining our processes and elevating our standards, we ensure that every interaction embodies excellence and leaves a lasting impression.</p>
                     <h3>Daily and Weekly Warehouse Safety Inspection</h3>
                     <p>Daily and weekly checks focus on immediate risks and early signs of wear that can disrupt operations or create safety hazards.</p>
                     <div class="detailTable">
                        <table class="table table-striped mt-4 w-100">
                           <thead>
                              <tr class="tableHeading redBg">
                                 <th>Area</th>
                                 <th>Frequency</th>
                                 <th>Check</th>
                                 <th>Readiness Goal</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Aisles &amp; Exits</td>
                                 <td>Daily</td>
                                 <td>Ensure walkways and emergency exits are clear</td>
                                 <td>Maintain safe egress and compliance</td>
                              </tr>
                              <tr>
                                 <td>Floors</td>
                                 <td>Daily</td>
                                 <td>Clean spills, remove debris, check for damage</td>
                                 <td>Prevent slips and equipment disruption</td>
                              </tr>
                              <tr>
                                 <td>Material Handling Equipment</td>
                                 <td>Daily</td>
                                 <td>Inspect forklifts, pallet jacks, and carts before use</td>
                                 <td>Ensure safe operation</td>
                              </tr>
                              <tr>
                                 <td>Safety Signage</td>
                                 <td>Daily</td>
                                 <td>Confirm labels, markings, and warnings are visible</td>
                                 <td>Support hazard awareness</td>
                              </tr>
                              <tr>
                                 <td>Hazard Communication</td>
                                 <td>Daily</td>
                                 <td>Verify labels and SDS accessibility</td>
                                 <td>Align with OSHA HazCom expectations</td>
                              </tr>
                              <tr>
                                 <td>Guardrails &amp; Safety Barriers</td>
                                 <td>Weekly</td>
                                 <td>Inspect for damage, loose anchors, or misalignment in high-traffic areas</td>
                                 <td>Maintain effective warehouse impact protection&nbsp;</td>
                              </tr>
                              <tr>
                                 <td>Racking Systems</td>
                                 <td>Weekly</td>
                                 <td>Inspect for damage, loose anchors, overloading</td>
                                 <td>Prevent structural failure</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <p>We bring together thoughtful curation, precision, and an unwavering attention to detail to deliver an experience that reflects true quality. From the moment you explore our collection to the final delivery at your doorstep, very touchpoint is carefully designed to feel seamless, refined, and dependable. Our approach goes beyond simply offering products—we focus on creating a sense of trust, consistency, and lasting value. By continuously refining our processes and elevating our standards, we ensure that every interaction embodies excellence and leaves a lasting impression.</p>
                     <h3>Material Handling Equipment: A Critical Focus Area</h3>
                     <p>Material handling systems are central to warehouse operations and one of the most common sources of safety risk when not properly maintained.</p>
                     <p>Forklifts, pallet jacks, carts, and storage systems experience constant use, making regular inspection essential. Worn components, inconsistent performance, or improper usage can lead to downtime, product damage, or workplace incidents.</p>
                     <p>Modern equipment solutions, including Global Industrial’s expanded Cat® product offerings are designed to support reliability, durability, and consistent performance in high-demand environments. When paired with a structured maintenance program, these tools help reduce risk while improving operational efficiency.</p>
                     <p>In high-traffic areas where forklifts and pallet jacks operate continuously, facility safety barriers such as guardrails play a critical role in protecting racking, equipment, and pedestrian zones. Modern impact-resistant systems are designed to absorb and disperse force, helping reduce damage and improve long-term safety outcomes. For a deeper look at material options and performance considerations, see our article on plastic guardrails vs. traditional systems.</p>
                     <p>We bring together thoughtful curation, precision, and an unwavering attention to detail to deliver an experience that reflects true quality. From the moment you explore our collection to the final delivery at your doorstep, very touchpoint is carefully designed to feel seamless, refined, and dependable. Our approach goes beyond simply offering products—we focus on creating a sense of trust, consistency, and lasting value. By continuously refining our processes and elevating our standards, we ensure that every interaction embodies excellence and leaves a lasting impression.</p>
                  </div>

               </div>
            </div>
         </div>
      </section> -->
      <!-- <section class="blogSection greyBg sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="text-center">
                     <h2 class="fw-bold">Related Articles</h2>
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

@endsection