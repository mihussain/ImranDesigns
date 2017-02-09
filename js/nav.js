define(['jquery'], function($) {
	
	var nav = {
		init: function() {
							
			$('#nav-icon').click(function(){

				var menuHeight = $(window).height();
				var headerHeight = $('header').height();

				$('header nav').height(menuHeight - headerHeight);

				
				$(this).toggleClass('open');
				$('header nav').toggleClass('open');

				if( $('header nav').hasClass('open')){
					$('body').css('overflow','hidden');

					if ( $('header nav').height() >= 500 ){
						$('header nav .dynamic_posts').css('display','block');
					}
				} else {
					$('body').css('overflow','auto');
				}
			});
		}

	};
	return nav;
});