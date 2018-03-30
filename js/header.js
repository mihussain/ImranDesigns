define(['jquery'], function($) {
	
	var header = {
		init: function() {

			var windowWidth = $(window).width(),
				headerHeight = $('header').height();

				console.log(headerHeight);

			if ( windowWidth >= 768) {
			 	$(window).on('scroll', function() {

			 		if ($(this).scrollTop() > 100 ) {
						 $('header').addClass('shrink');
						 $('.hero').removeClass('grow');
						 console.log('shrink on');
					} else {
						$('header').removeClass('shrink');
						$('.hero').addClass('grow');
						console.log('shrink off');
					}
			 	});
		 	}
		}
	};

	return header;
});