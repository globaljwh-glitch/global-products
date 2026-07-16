@if($banner)
<section class="mainBanner">
   <div class="container">
      <div class="row">
         <div class="col-md-5 d-flex align-items-center">
            <div class="bannerContent">
               <h5 class="text-uppercase text-red">{{ $banner->page }}</h5>
               <h1>{{ $banner->title }} <span>{{ $banner->position }}</span></h1>
               <p>{!! $banner->description !!}</p>
               <a href="{{ $banner->button_link }}" class="customBtn01 blackBg mt-2">{{ $banner->button_text }}</a>
            </div>
         </div>
         <div class="col-md-7 text-center d-flex align-items-center">
            <div><img src="{{ asset('storage/'.$banner->image) }}" class="imgResponsive"></div>
         </div>
      </div>
   </div>
</section>
@endif