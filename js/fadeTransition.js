define(['jquery'], function ($) {

    var fadeTransition = {
        init: function () {

            $(window).on("load", function () {
                $(window).scroll(function () {

                    var windowTop = $(this).scrollTop();
                    var windowBottom = windowTop + $(this).innerHeight();

                    $(".fade").each(function () {

                        /* Check the location of each desired element */
                        var objectTop = $(this).offset().top;
                        var objectBottom = objectTop + $(this).outerHeight();

                        /* If the element is completely within bounds of the window, fade it in */
                        if (objectTop < (windowBottom - 100)) { //object comes into view (scrolling down)
                                
         
                                $(this).addClass('fade-in'); 
                            
                        
                        } else { //object goes out of view (scrolling up)
                   
                                $(this).removeClass('fade-in'); 
                     
                        }
                    });
                }).scroll(); //invoke scroll-handler on page-load
            });

            $('a').hover(
                function () {
                    $(this).attr("org_title", $(this).attr('title'));
                    $(this).attr('title', '');
                }, function () {
                    $(this).attr('title', $(this).attr("org_title"));
                }
            )

        }
    };

    return fadeTransition;
});
