function aboutToggle() {
	var item = $('.about-skill'),
			itemIcon = $('.about-skill-icon'),
			itemIconClose = $('.skill-icon-close'),
			itemIconOpen = $('.skill-icon-open'),
			subItems = $('.about-skill ul'),
			active = 'is-active';

	item.on('click', function() {
		// stops active item from being clicked
		if ($(this).hasClass(active)) return false;

		// removes the active class and adds to one clicked
		item.removeClass(active);
		$(this).addClass(active);

		itemIconClose.removeClass(active);
		itemIconOpen.addClass(active);
		$(this).find('span').toggleClass(active);

		// slides items
		subItems.slideUp('fast');
		$(this).find('ul').slideDown('fast');
	});
}