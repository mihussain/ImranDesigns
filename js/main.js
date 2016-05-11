jQuery(document).ready(function($) {

	$('body').addClass('js');

	function detectIE() {
	    var ua = window.navigator.userAgent;
	    var msie = ua.indexOf('MSIE ');
	    
	    if (msie > 0) {
	        // IE 10 or older => return version number
	        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
	    }
	    
	    var trident = ua.indexOf('Trident/');
	    if (trident > 0) {
	        // IE 11 => return version number
	        var rv = ua.indexOf('rv:');
	        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
	    }
	    var edge = ua.indexOf('Edge/');
	    if (edge > 0) {
	       // IE 12 => return version number
	       return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
	    }
	    // other browser
	    return false;
	}

	if ( detectIE() != false ) {$('html').addClass('ie' + detectIE());}
	
	// var store,
	// 	dataStore;

	// //Get JSON Data and Store it in local storage 
	// $.getJSON('../json_data.json', function(data) {
	// 	dataStore = JSON.stringify(data);
	// 	localStorage.setItem('storage', dataStore);
	// 	store = JSON.parse(localStorage.getItem('storage'));

	// });

	function fixHeader() {
		
		var body = $(document);

		body.on('scroll', function(e) {
	    	
	  		if (body.scrollTop() > 123) {
	  			$('header').addClass('small_header');
	    		$('.page-content').css('top','185px');
	  		} else {
	  			$('header').removeClass('small_header');
	    		$('.page-content').css('top','0');
	  		}
	  
	  		if (body.scrollTop() >= 425) {
	  			$('.sidebar > div').addClass('fixed_test');
	  			
	  			var new_width = $('.sidebar').width();
				$('.fixed_test').width(new_width); 

	  		} else {
	  			$('.sidebar > div').removeClass('fixed_test');
	  		}
		});
	}
	
	$(window).on("resize", function () {
		if ($(window).width() >= 768) {
			fixHeader();
		} else {
			$('header').addClass('small_header');
			$('.page-content').css('top','60px');
		}
	}).resize();

	$('#nav-icon').click(function(){
	
		var menuHeight = $(window).height();

		$('.menu > ul').height(menuHeight);
		$(this).toggleClass('open');
		$('nav').toggleClass('open');
	});

	//Scroll effects

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

	 	$('.single-project .featured-image').css({
	 	   	'transform' : 'translateY(' + ($(this).scrollTop()/-4) + 'px)'
	 	}); 

	 	$('.home .part_1_image').css({
	 	  	'transform' : 'translateY(' + ($(this).scrollTop()/-4)+ 'px)'
	 	});
			
	 	$('.home .part_2_image').css({
	 	  	'transform' : 'translateY(' + ($(this).scrollTop()/-8)+ 'px)'
	 	});	    
	 }

	// portfolio filter
	var filterList = {
		init: function () {
			// MixItUp plugin
			$('.portfolio').mixItUp({
				selectors: {
					target: '.project',
					filter: '.filter'
				},
				load: {
					sort: 'random'
				},
				animation: {
					enable: true,
					effects: 'fade',
					easing: 'easeInOutCubic'
				},
				controls: {
					activeClass: 'active'
				}
			});				
		},
	};
	
	// Run the show!
	filterList.init();
	
});		