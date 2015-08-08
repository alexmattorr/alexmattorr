function work_slider() {
  function flexSliderInit() {
    $('#work-slider').flexslider({
      animation: "slide",
      animationLoop: true,
      slideshow: false,
      keyboard: true
    });
  }

  function sliderHash() {
    var hashUrl   =     location.hash,
        hashUrl   =     hashUrl.replace("#", ''),
        body      =     $('body'),
        arrow     =     $('.flex-direction-nav'),
        dot       =     $('.flex-control-nav li'),
        slide     =     $('.work-page-item'),
        active    =     'flex-active-slide';

    // key left and right
    body.keydown(function(e) {
      if(e.keyCode == 37 || e.keyCode == 39) {
        setTimeout(function() {
          slide.each(function() {
            if ( $(this).hasClass(active) ) {
              clean = $(this).data('work').slice(1);
              window.location.hash = clean;
            }
          });
        }, 250);
      }
    });

    // arrow
    arrow.click(function() {
      slide.each(function() {
        if ( $(this).hasClass(active) ) {
          clean = $(this).data('work').slice(1);
          window.location.hash = clean;
        }
      });
    });

    // dot
    dot.click(function() {
      setTimeout(function() {
        slide.each(function() {
          if ( $(this).hasClass(active) ) {
            clean = $(this).data('work').slice(1);
            window.location.hash = clean;
          }
        });
      }, 500);
    });
  }

  flexSliderInit();
  sliderHash();
}
