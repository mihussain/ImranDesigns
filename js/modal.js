define(['jquery'], function($) {
	
	var modal = {
		init: function() {
			$('.image_section').on('click','a', function(e) {
				e.preventDefault();
				var img = $(this).attr('href');
				
				$('#modal_img').attr('src', img);
				$('body').addClass('no-scroll');
				$('.modal').css({'display': 'block'});
			});

			$('.modal').on('click', function() {
				$('#modal_img').attr('src', '');
				$('body').removeClass('no-scroll');
				$('.modal').css({'display': 'none'});
			}).children().on('click', function (event) {
				event.stopPropagation();
			});

			$('.modal_window').on('click', function() {
				$('#modal_img').attr('src', '');
				$('body').removeClass('no-scroll');
				$('.modal').css({'display': 'none'});
			}).children().on('click', function (event) {
				event.stopPropagation();
			});
		}
	};
	return modal;
});