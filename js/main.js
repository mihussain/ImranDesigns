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

		console.log(body);

		body.on('scroll', function(e) {
	    	
	    	console.log(body.scrollTop());
			console.log();

	    	console.log('yo');
	  		if (body.scrollTop() > 157) {
	  			console.log('yes');
	    		$('header').addClass('small_header');
	    		$('.page-content').css('margin-top','215px');
	  		} else {
	  			console.log('no');
	    		$('header').removeClass('small_header');
	    		$('.page-content').css('margin-top','0');
	  		}
	  
		});
	}


	if ($(window).width() >= 768) {
		fixHeader();
	} else {
		$('header').addClass('small_header');
		$('.page-content').css('margin-top','60px');
	}

	$('#nav-icon').click(function(){
		$(this).toggleClass('open');
		$('nav').slideToggle(500);
		$('nav').toggleClass('open');
	});
});
