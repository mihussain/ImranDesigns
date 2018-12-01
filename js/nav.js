define(['jquery'], function($) {
	
	var nav = {
		init: function() {
							
			$('#nav-icon').click(function(){
				
				$(this).toggleClass('open');
				$('nav.nav--mobile').toggleClass('open');
				$('.nav_bar').toggleClass('open');

				if( $('nav.nav--mobile').hasClass('open')){
					$('body').css('overflow','hidden');

					if ( $(window).height() >= 525 ){
					 	$('nav.nav--mobile .dynamic_posts').css('display','block');
					} 
					
					if ($(window).height() >= 640) {
						 $('nav.nav--mobile .dynamic__blog').css('display','block');
					}

				} else {
					$('body').css('overflow','auto');
				}
			});

			//helper 
			$(function() {
				$('a[href*="#"]').on('click', function(e) {
				  e.preventDefault();
				  $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top - $('header').height()}, 500, 'linear');
				});
			});

			$(function() {
				$('.scroll-up-arrow').on('click', function(e) {
					e.preventDefault();
					$('html, body').animate({ scrollTop: 0}, 500, 'linear');
				});
			});
		}

	};
	return nav;
});