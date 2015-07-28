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