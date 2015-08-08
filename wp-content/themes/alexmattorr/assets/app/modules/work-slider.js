function work_slider() {
  $('#work-slider').flexslider({
    animation: "slide",
    animationLoop: true,
    slideshow: false,
    keyboard: true
  });
/*
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    after: function() {
    	var  val = $('.flex-active-slide').data('cat'),
  				 selector = ".item-"+val;
    	$('.filter').removeClass('is-active');
  		$(selector).addClass('is-active');
    },//Fires after each slider animation completes
    slideshow: false,
    sync: "#thumbs"
  });

  $('#thumbs').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: width,
    maxItems: 5,
    asNavFor: '#carousel'
  });
*/  
}
