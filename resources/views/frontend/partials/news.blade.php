@if($news_data)
<section class="blogSection sectionPadding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="text-center">
                     <h2 class="fw-bold">Popular Reads</h2>
                     <p>Explore the latest insights, tips, freshest and most exciting news</p>
                  </div>
               </div>

               @if($news_data->count())

                  @foreach($news_data as $news)

                     <div class="d-flex col-md-4">
                           <div class="blog bg-white">

                              <div class="blogThumb">
                                 <img 
                                       alt="{{ $news->title }}" 
                                       class="imgHeightResponsive"
                                       src="{{ asset('storage/'.$news->image) }}">
                              </div>

                              <div class="blogInfo">

                                 <div class="blogDate">
                                       {{ \Carbon\Carbon::parse($news->created_at)->format('F d, Y') }}
                                 </div>

                                 <h5>
                                       {{ $news->title }}
                                 </h5>

                                 <p>
                                       {{ Str::limit(strip_tags($news->description), 120) }}
                                 </p>

                                 <a href="{{ route('news.details', $news->slug) }}" 
                                    class="customBtn01 blackBg mt-2 mb-1">
                                       Read More
                                 </a>

                              </div>

                           </div>
                     </div>

                  @endforeach

               @endif


               <!-- <div class="d-flex col-md-4">
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
               </div> -->
            </div>
         </div>
      </section>
@endif