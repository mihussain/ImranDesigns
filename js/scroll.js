define(['jquery',], function($) {
	
	var scroll = {
		init: function() {
			// shim layer with setTimeout fallback
			window.requestAnimFrame = (function(){
			  	return  window.requestAnimationFrame       ||
			        	window.webkitRequestAnimationFrame ||
			          	window.mozRequestAnimationFrame    ||
			          	function( callback ){
			            	window.setTimeout(callback, 1000 / 60);
			          	};
			})();

			var scrollticker; // - don't need to set this in every scroll

			$(window).scroll(function() {

				// Clear Timeout if one is pending
				if(scrollticker) { window.clearTimeout(scrollticker); scrollticker = null; }
				  
				// Set Timeout
				scrollticker = window.setTimeout(function(){
					requestAnimFrame(scrollEvents);
				}, 15); // Timeout in msec
			});

			 

			function scrollEvents() {

				var windowWidth = $(window).width();

				if ( windowWidth <= 1024) {
			 		$('.single-project .featured-image').css({
			 		   	'transform' : 'translateY(' + ($(this).scrollTop()/-4) + 'px) scale(1.1)'
			 		}); 
			 	}

			 	$('.home .part_1_image').css({
			 	  	'transform' : 'translateY(' + ($(this).scrollTop()/-4)+ 'px)'
			 	});
					
			 	$('.home .part_2_image').css({
			 	  	'transform' : 'translateY(' + ($(this).scrollTop()/-8)+ 'px)'
			 	});	    
			}
		}
	};
	return scroll;
});