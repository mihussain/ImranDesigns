define(['jquery'], function($) {
	
	var header = {
		init: function() {

			var windowWidth = $(window).width();

			if ( windowWidth >= 768) {
				$(window).on('scroll', function() {

					if ($(this).scrollTop() > 190 ) {
						$('header').addClass('fixed');
						$('.single-project header').addClass('solid');
						$('.page-content').addClass('padding');
					} else {
						$('header').removeClass('fixed');
						$('.single-project header').removeClass('solid');
						$('.page-content').removeClass('padding');
					}
				});
			}
		}
	};

	return header;
});