
/*--------------------------------- banner Slider -------------------------*/
$(document).ready(function(){
 $('.bannerSliderHome').slick({
   slidesToShow: 1,
   infinite: true,
   arrows: true,
   speed: 300,
   autoplay: true,
   nextArrow: '<button type="button" class="slick-prev custom-arrow"></button>',
   prevArrow: '<button type="button" class="slick-next custom-arrow"></button>',
   autoplaySpeed: 4000
 });
 $(".prev-btn").click(function () {
   $(".bannerSliderHome").slick("slickPrev");
 });

 $(".next-btn").click(function () {
   $(".bannerSliderHome").slick("slickNext");
 });
 $(".prev-btn").addClass("slick-disabled");
});
   
/*--------------------------------- Product Slider -------------------------*/

$('.productSlider').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: true,
  dots: false,
  infinite: true,
  speed: 500,
  autoplay: true,
  nextArrow: '<button type="button" class="slick-prev custom-arrow"></button>',
  prevArrow: '<button type="button" class="slick-next custom-arrow"></button>',
  autoplaySpeed: 4000,

  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});
/*--------------------------------- Tab/Accordion -------------------------*/



