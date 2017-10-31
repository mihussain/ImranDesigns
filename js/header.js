define(['jquery'], function($) {
	
	var header = {
		init: function() {

			var windowWidth = $(window).width(),
				headerHeight = $('.part_1').height();

				console.log(headerHeight);

			// if ( windowWidth >= 768) {
			// 	$(window).on('scroll', function() {

			// 		if ($(this).scrollTop() > (headerHeight - 60) ) {
			// 			$('header').addClass('fixed');
			// 			$('.single-project header').addClass('solid');

			// 			//$('.page-content').css('padding-top', headerHeight)
			// 		} else {
			// 			$('header').removeClass('fixed');
			// 			$('.single-project header').removeClass('solid');
			// 			//$('.page-content').css('padding-top', '0');
			// 		}
			// 	});
			// }
		}
	};

	return header;
});