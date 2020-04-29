define(['jquery'], function($) {
	
	var fadeTransition = {
		init: function() {
        
            console.log('Hello! Fade v2');

            $(window).on("load",function() {
                $(window).scroll(function() {
                  
                    var windowTop = $(this).scrollTop();
                    var windowBottom = windowTop + $(this).innerHeight();
                  
                  $(".fade").each(function() {
                    
                    /* Check the location of each desired element */
                    var objectTop = $(this).offset().top;
                    var objectBottom = objectTop + $(this).outerHeight();

                    console.log( objectBottom + ' > ' + windowTop);
                    console.log( objectTop + ' < ' + windowBottom);
                    
                    /* If the element is completely within bounds of the window, fade it in */
                    if (objectBottom > windowTop && objectTop < windowBottom) { //object comes into view (scrolling down)
                      if ($(this).css("opacity")==0) {$(this).fadeTo(300,1);}
                    } else { //object goes out of view (scrolling up)
                      //if ($(this).css("opacity")==1) {$(this).fadeTo(300,0);}
                    }
                  });
                }).scroll(); //invoke scroll-handler on page-load
            });

		}
	};

	return fadeTransition;
});
