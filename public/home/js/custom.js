$(".image-popup").magnificPopup({
  type: "image",
  removalDelay: 300,
  mainClass: "mfp-with-zoom",
  gallery: {
    enabled: true,
  },
  zoom: {
    enabled: true, // By default it's false, so don't forget to enable it

    duration: 300, // duration of the effect, in milliseconds
    easing: "ease-in-out", // CSS transition easing function

    opener: function (openerElement) {
      return openerElement.is("img")
        ? openerElement
        : openerElement.find("img");
    },
  },
});

$(".banner-slider").owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    smartSpeed: 1000,
    autoplay: true,
    nav: false,
    dots: true,
});

$(".discount-slider").owlCarousel({
    loop: true,
    margin: 24,
    smartSpeed: 1400,
    autoplay: true,
    nav: false,
    dots: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        922:{
            items:3
        },
        1000:{
            items:5
        }
    }
});

$(".new-arrival").owlCarousel({
    loop: true,
    margin: 30,
    smartSpeed: 1000,
    autoplay: true,
    nav: true,
    dots: false,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        922:{
            items:3
        },
        1000:{
            items:4
        }
    }
});


$(".new-featured").owlCarousel({
    loop: true,
    margin: 24,
    smartSpeed: 1000,
    nav: true,
    dots: false,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        922:{
            items:4
        },
        1000:{
            items:4
        }
    }
});

$(".compare-vehicles").owlCarousel({
    loop: true,
    margin: 24,
    smartSpeed: 1000,
    nav: true,
    dots: false,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        922:{
            items:2
        },
        1000:{
            items:2
        }
    }
});

$(".stock-clearance").owlCarousel({
    loop: true,
    items: 1,
    margin: 30,
    smartSpeed: 1000,
    autoplay: true,
    nav: true,
    dots: false,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
});

$(".trending-products").owlCarousel({
    loop: true,
    margin: 30,
    smartSpeed: 1000,
    autoplay: true,
    nav: true,
    dots: false,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        922:{
            items:4
        },
        1000:{
            items:4
        }
    }
});

$(window).scroll(function () {
  var scroll = $(window).scrollTop();
  if (scroll >= 80) {
    $(".top-header").addClass("sticky");
  } else {
    $(".top-header").removeClass("sticky");
  }
});

$("#myForm input").on("click", function () {
  var clk = $("input:checked", "#myForm").val();
  $(".color-radio").find("label").removeClass("new-border");
  $(this).parent("label").addClass("new-border");
  $("#test").html("clciked on " + clk);
});

$("#write-review").on("click", function () {
  $(".r-box").slideToggle();
});

$("#emi-otpn").click(function (e) {
  e.preventDefault();
  e.stopPropagation();
  $(".emi-box").toggle();
});

$("#list").on("click", function () {
  $(".ecm-list").show();
  $(".ecm-grid").hide();
  $("#list").addClass("toggle-color");
  $("#grid").removeClass("toggle-color");
});

$("#grid").on("click", function () {
  $(".ecm-grid").show();
  $(".ecm-list").hide();
  $("#grid").addClass("toggle-color");
  $("#list").removeClass("toggle-color");
});

$(".cart-close img").on("click", function () {
  $(this).parents(".ecm-cartpage__content").remove();
});

$("#qty_input").prop("disabled", true);
$("#plus-btn").click(function () {
  $("#qty_input").val(parseInt($("#qty_input").val()) + 1);
});
$("#minus-btn").click(function () {
  $("#qty_input").val(parseInt($("#qty_input").val()) - 1);
  if ($("#qty_input").val() == 0) {
    $("#qty_input").val(1);
  }
});

$("#searchtrigger").click(function (e) {
  e.preventDefault();
  e.stopPropagation();
  $(".search-box").toggle();
});
$("#s-close").click(function (e) {
  $(".search-box").fadeOut();
});

// mobile-menu

jQuery("#mobile-trigger").click(function () {
  jQuery(".sidenav").toggleClass("active");
});

jQuery(".sidenav .cancel").on("click", function () {
  jQuery(".sidenav").removeClass("active");
});

jQuery("#mobile-trigger").on("click", function () {
  jQuery(".body-overlay").fadeIn();
});

jQuery(".body-overlay").on("click", function () {
  jQuery(".body-overlay").fadeOut();
  jQuery(".sidenav").removeClass("active");
});

jQuery("#ecm-fav").on("click", function () {
  jQuery("#ecm-fav").hide();
  jQuery("#ecm-fav2").show();
});

jQuery("#ecm-fav2").on("click", function () {
  jQuery("#ecm-fav2").hide();
  jQuery("#ecm-fav").show();
});

/**
 * Back to top
 */
$(window).scroll(function () {
  var height = $(window).scrollTop();
  if (height > 100) {
    $("#back2Top").fadeIn();
  } else {
    $("#back2Top").fadeOut();
  }
});
$(document).ready(function () {
  $("#back2Top").click(function (event) {
    event.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });
});

$(document).ready(function () {
  var item = $(".cart-wrap .cart-box").size();

  if (item > 1) {
    $(".cart-wrap").css({ height: "150px", "overflow-x": "hidden" });
  }
});

$(".my-rating").starRating({
    initialRating: 4,
    strokeColor: '#EB9638',
    strokeWidth: 10,
    starSize: 20,
    useGradient: false,
    activeColor: '#EB9638',
    callback: function(currentRating, $el){
        // make a server call here
    }
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

// Can also be used with $(document).ready()
$(window).load(function () {
    $('.product-flexslider').flexslider({
        slideshowSpeed: 1400,
        slideshow: false,
        initDelay: 0,
        useCSS: false,
        animation: "slide",
        animationLoop: false,
        pauseOnHover: false,
        controlNav: true,
        directionNav: false,
        start: function(slider) {
            slider.pause();
            slider.manualPause = true;
            slider.mouseover(function() {
                slider.manualPause = false;
                slider.play();
            });
            slider.mouseout(function() {
                slider.manualPause = true;
                slider.pause();
            });
        },
        keyboard: false
    });

});


$('#pills-tab a').click(function (e) {
    var targeted_tab = $('#pills-'+$(this).data('cat-id'));
    if(targeted_tab.hasClass('active')){
        targeted_tab.removeClass('active');
    }
    else (
        targeted_tab.addClass('active')
    )

});


//Step Form
;(function($) {
  "use strict";

  //* Form js
  function verificationForm(){
      //jQuery time
      var current_fs, next_fs, previous_fs; //fieldsets
      var left, opacity, scale; //fieldset properties which we will animate
      var animating; //flag to prevent quick multi-click glitches

      $(".next").click(function () {
          if (animating) return false;
          animating = true;

          current_fs = $(this).parent();
          next_fs = $(this).parent().next();

          //activate next step on progressbar using the index of next_fs
          $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

          //show the next fieldset
          next_fs.show();
          //hide the current fieldset with style
          current_fs.animate({
              opacity: 0
          }, {
              step: function (now, mx) {
                  //as the opacity of current_fs reduces to 0 - stored in "now"
                  //1. scale current_fs down to 80%
                  scale = 1 - (1 - now) * 0.2;
                  //2. bring next_fs from the right(50%)
                  left = (now * 50) + "%";
                  //3. increase opacity of next_fs to 1 as it moves in
                  opacity = 1 - now;
                  current_fs.css({
                      'transform': 'scale(' + scale + ')',
                      'position': 'absolute'
                  });
                  next_fs.css({
                      'left': left,
                      'opacity': opacity
                  });
              },
              duration: 800,
              complete: function () {
                  current_fs.hide();
                  animating = false;
              },
              //this comes from the custom easing plugin
              easing: 'easeInOutBack'
          });
      });

      $(".previous").click(function () {
          if (animating) return false;
          animating = true;

          current_fs = $(this).parent();
          previous_fs = $(this).parent().prev();

          //de-activate current step on progressbar
          $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

          //show the previous fieldset
          previous_fs.show();
          //hide the current fieldset with style
          current_fs.animate({
              opacity: 0
          }, {
              step: function (now, mx) {
                  //as the opacity of current_fs reduces to 0 - stored in "now"
                  //1. scale previous_fs from 80% to 100%
                  scale = 0.8 + (1 - now) * 0.2;
                  //2. take current_fs to the right(50%) - from 0%
                  left = ((1 - now) * 50) + "%";
                  //3. increase opacity of previous_fs to 1 as it moves in
                  opacity = 1 - now;
                  current_fs.css({
                      'left': left
                  });
                  previous_fs.css({
                      'transform': 'scale(' + scale + ')',
                      'opacity': opacity
                  });
              },
              duration: 800,
              complete: function () {
                  current_fs.hide();
                  animating = false;
              },
              //this comes from the custom easing plugin
              easing: 'easeInOutBack'
          });
      });

      $(".submit").click(function () {
          return false;
      })
  };

  //* Add Phone no select
  function phoneNoselect(){
      if ( $('#msform').length ){
          $("#phone").intlTelInput();
          $("#phone").intlTelInput("setNumber", "+880");
      };
  };
  //* Select js
  function nice_Select(){
      if ( $('.product_select').length ){
          $('select').niceSelect();
      };
  };
  /*Function Calls*/
  verificationForm ();
  phoneNoselect ();
  nice_Select ();

})(jQuery);

