
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

$(document).ready(function () {

  // Tab → Accordion
  $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
    let target = $(e.target).data("bs-target");
    let collapseId = tabToCollapse[target];

    // Close all
    $('.accordion-collapse').removeClass('show');
    $('.accordion-button').addClass('collapsed');

    // Open current
    $(collapseId).addClass('show');

    // Remove collapsed from active button
    $('.accordion-button[data-bs-target="' + collapseId + '"]')
      .removeClass('collapsed');
  });

  // Accordion → Tab
  $('.accordion-button').on('click', function () {
    let collapseId = $(this).attr('data-bs-target');

    // Close all
    $('.accordion-collapse').removeClass('show');
    $('.accordion-button').addClass('collapsed');

    // Open current
    $(collapseId).addClass('show');
    $(this).removeClass('collapsed');

    // Activate tab
    $('button[data-bs-target="' + collapseToTab[collapseId] + '"]').tab('show');
  });

});


/*--------------------------------- UserProfile Tabs -------------------------*/

$(document).ready(function () {

  // Desktop Tabs Click
  $(".userProfileTabs-links .nav-link").click(function () {
    var target = $(this).data("target");

    $(".userProfileTabs-links .nav-link").removeClass("active");
    $(this).addClass("active");

    $(".userProfileTabs-content").removeClass("active");
    $(target).addClass("active");
  });

  // Mobile Accordion Click
  $(".userProfileTabs-content h2").click(function () {
    if ($(window).width() <= 767) {
      var parent = $(this).parent();

      $(".userProfileTabs-content").not(parent).removeClass("active");
      parent.toggleClass("active");
    }
  });

});


/*--------------------------------- Search Header -------------------------*/

$(document).ready(function () {

    $(".searchToggle").click(function (e) {
        e.preventDefault();
        $(".searchBarHeader").toggleClass("active");
    });

    $(document).click(function (e) {
        if (!$(e.target).closest('.searchBarHeader, .searchToggle').length) {
            $(".searchBarHeader").removeClass("active");
        }
    });

});