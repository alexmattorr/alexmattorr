function aboutToggle() {
	var item = $('.about-skill'),
			subItems = $('.about-skill ul'),
			active = 'is-active';

	item.on('click', function() {
		if ($(this).hasClass(active)) return false;

		item.removeClass(active);
		$(this).addClass(active);

		subItems.slideUp('fast');
		$(this).find('ul').slideDown('fast');
	});
}