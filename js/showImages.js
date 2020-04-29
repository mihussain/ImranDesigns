define(['jquery'], function($) {
	
	var showImages = {
		init: function() {
        
      $('.show_more').on('click', function() {
        $('.image_section').removeClass('limited');
        $('.image_section .show_more').css('display','none');

        $('.image_section').addClass('unlimited');
        $('.image_section .show_less').css('display','block');
        
      });

      $('.show_less').on('click', function() {
        $('.image_section').addClass('limited');
        $('.image_section .show_more').css('display','block');

        $('.image_section').removeClass('unlimited');
        $('.image_section .show_less').css('display','none');
        
      });

		}
	};

	return showImages;
});