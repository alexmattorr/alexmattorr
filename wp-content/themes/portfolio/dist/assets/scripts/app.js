var app = (function() {
	var defaults = [];
	return { 

	}
})();

$(function() {
	new app.base();
})
function aboutToggle() {
	var item = $('.about-skill'),
			itemIcon = $('.about-skill-icon'),
			itemIconClose = $('.skill-icon-close'),
			itemIconOpen = $('.skill-icon-open'),
			subItems = $('.about-skill ul'),
			active = 'is-active';
/*
	item.each(function() {
		var stuff = $(this).find('li').length;
		if ( stuff == 0 ) {
			$(this).find('span').hide();
			$(this).find('ul').hide();
		}
	});
*/
	item.on('click', function() {
		if ( $(this).hasClass(active) ) {
			$(this).removeClass(active);
			$(this).find('ul').slideUp('fast');

			itemIconClose.removeClass(active);
			itemIconOpen.addClass(active);
		} else {
			item.removeClass(active);
			$(this).addClass(active);
			subItems.slideUp('fast');
			$(this).find('ul').slideDown('fast');

			itemIconClose.removeClass(active);
			itemIconOpen.addClass(active);
			$(this).find('span').toggleClass(active);
		}
	});
}
// base functions
app.base = (function($, _ , app) {

	var def = function() {
		app.options = {};

		// setup touch for mobile
		app.options.uAgent = navigator.userAgent;
    app.options.interaction = app.options.uAgent.match(/(iPad|iPhone|iPod)/g) ? "touchstart" : "click";

		init.call(this);
	};

	var init = function(){
		this.navScroller();
		this.sideBar();
		this.about();
		this.work();
	};

	def.prototype = {
		gruntIcon: function() {
			grunticon(["../assets/svg/icons.data.svg.css", "../assets/svg/icons.data.png.css", "../assets/svg/icons.fallback.css"]);
				setTimeout(function(){
					$('.icon').hide();
					$('.icon').show();
				}, 1200);
		},

		navScroller: function() {
			navScroll();
		},

		sideBar: function() {
			sideToggle();
		},

		about: function() {
			aboutToggle();
		},

		work: function() {
			work_slider();
		}
	};

	return def;
}).call(this, jQuery, _, app);
function navScroll() {
	$(window).scroll(function() {
    var windscroll = $(window).scrollTop();
    if (windscroll >= 100) {
			$('aside li').removeClass();
      $('.wrapper').each(function(i) {
        if ($(this).position().top <= windscroll + 350) {
          $('aside li.is-active').removeClass('is-active');
          $('aside li').eq(i).addClass('is-active');
        }
      });
    } else {
      $('aside li.is-active').removeClass('is-active');
    }
	}).scroll();
  $('aside li:first-child').addClass('is-active');
}


function sideToggle() {
	var content 	= $('.container'),
			side 			= $('aside'),
			names 		= $('aside ul li a span'),
			btn 			= $('#side-toggle'),
			menuIcon 	= $('#menu'),
			closeIcon = $('#close'),
			open 			= 'is-open',
			active 		= 'is-active';

	function closeSide() {
		menuIcon.show();
		closeIcon.hide();
		side.removeClass(open);
		names.hide();
		setTimeout(function() {
			side.animate({"width": "65px"});
			content.animate({"left": 0})
		}, 100);
	}

	btn.on("click", function() {
		menuIcon.toggle();
		closeIcon.toggle();
		side.toggleClass(open);
		if ( side.hasClass(open) ) {
			content.animate({"left": 100});
			side.animate({"width": "150px"});
			setTimeout(function() {
				names.show();
			}, 500);
		} else {
			names.hide();
			setTimeout(function() {
				side.animate({"width": "65px"});
				content.animate({"left": 0})
			}, 100);
		}
	});

	content.on("click", function() {
		if ( side.hasClass(open) ) {
			closeSide();
		}
	});
}
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
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

//# sourceMappingURL=app.js.map