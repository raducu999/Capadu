(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle").on('click',function(e) {
    e.preventDefault();
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll',function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    event.preventDefault();
  });

  // hide fields

  $( document ).ready(function() {

    var ckbox2 = $('#checkbox2');

    $('.hiddenfields1').hide();
    ckbox2.prop('checked', true)
  
  });

  var ckbox1 = $('#checkbox1');

  var val1, val2, val3 = "";
  val1 = $('#input1').val();
  val2 = $('#input2').val();
  val3 = $('#input3').val();

  $('input').on('click',function () {

      if (ckbox1.is(':checked')) {
        $('.hiddenfields1').show();
        $('.hiddenfields2').hide(); 
        $('#input1').val(val1);
        val2 = $('#input2').val();
        val3 = $('#input3').val();
        $('#input2').val("");
        $('#input3').val("");
      } 
      else {  
        $('.hiddenfields1').hide();
        $('.hiddenfields2').show(); 
        $('#input2').val(val2);
        $('#input3').val(val3);
        val1 = $('#input1').val();
        $('#input1').val("");  
      }
  });

})(jQuery); // End of use strict
