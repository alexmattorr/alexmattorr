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

