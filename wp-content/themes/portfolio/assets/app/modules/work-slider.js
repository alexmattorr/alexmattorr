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
        slide     =     $('.work-page-item-wrapper'),
        active    =     'flex-active-slide';

    slide.hide().removeClass(active);
    slide.each(function() {
      var data = $(this).data('work'),
          name = $(this).find('h5').text();

      if (hashUrl == data) {
        var thisIndex = $(this).index();
        $('#work-slider').flexslider(thisIndex -1);

        console.log( "THIS IS SELECTED: " + name + ": " + thisIndex );
      }
    });

    // key left and right
    body.keydown(function(e) {
      if(e.keyCode == 37 || e.keyCode == 39) {
        setTimeout(function() {
          slide.each(function() {
            if ( $(this).hasClass(active) ) {
              clean = $(this).data('work');
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
          clean = $(this).data('work');
          window.location.hash = clean;
        }
      });
    });

    // dot
    dot.click(function() {
      setTimeout(function() {
        slide.each(function() {
          if ( $(this).hasClass(active) ) {
            clean = $(this).data('work');
            window.location.hash = clean;
          }
        });
      }, 500);
    });
  }

  flexSliderInit();
  sliderHash();
}
