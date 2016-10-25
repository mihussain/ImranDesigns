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

	var windowWidth = $(window).width();

	function scrollEvents() {

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
		


	// MODAL

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


	//FIXED HEADER SCRIPT

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

	//Facebook Share 
	// $('.facebookButton').on('click', function() {
	// 	FB.ui({
	// 		method: 'share_open_graph',
	// 	  	action_type: 'og.shares',
	// 	  	action_properties: JSON.stringify({
	// 			object:'http://www.imrandesigns.co.uk',
	// 	  })

	// 	}, function(response){});
	// });

	/*
	COLOUR THEIF

	$(window).load(function() {
		var myImage = $('img.featured-image');
		var colorThief = new ColorThief();
		var color = colorThief.getColor(myImage[0]);
		
		$('.sidebar a.project_link').css('background-color','rgb(' + color[0] + ',' + color[1] + ',' + color[2] + ')');

		function invert(rgb) {
		  	rgb = Array.prototype.join.call(arguments).match(/(-?[0-9\.]+)/g);
		  	for (var i = 0; i < rgb.length; i++) {
		    	rgb[i] = (i === 3 ? 1 : 255) - rgb[i];
		  	}
		  return rgb;
		}

		invertedColor = invert( color[0] + ',' + color[1] + ',' + color[2] );

		$('.sidebar a.project_link').css('color','rgb(' + invertedColor + ')');
	});
*/
});	
