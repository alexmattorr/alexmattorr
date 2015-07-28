var app = (function() {
	var defaults = [];
	return { 

	}
})();

$(function() {
	new app.base();
})
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
        if ($(this).position().top <= windscroll + 50) {
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
//# sourceMappingURL=app.js.map