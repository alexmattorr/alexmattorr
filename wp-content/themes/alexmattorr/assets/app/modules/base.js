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