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