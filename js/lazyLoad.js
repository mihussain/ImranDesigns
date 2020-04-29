define(['jquery'], function($) {
	
	var lazyLoad = {
		init: function() {
					
			lazy_load();
	
			$(window).on('scroll', function()
			{	
				lazy_load();
			});


			function lazy_load()
			{

				if ( ($('.lazy').length == 0) && ($('.lazy_bg').length == 0) ) {
					return;
					
				}
			
				var currOffset 	= 0,
					smargin = 50,
					win_scroll 	= $(window).scrollTop();
			
				if ( $(window).width() < 767 ) smargin = 150;
			
				if ( $('.lazy').length != 0 )
				{
					$('.lazy').each(function(index)
					{
						currOffset = ( $(this).offset().top - ( $(window).height() + smargin ) );
			
						if ( win_scroll > currOffset )
						{
							var img = $(this).attr('data-src');
			
							if (img != '')
							{
								$(this).attr('src',img);
							}
						}
					});
				}
			
				if ( $('.lazy_bg').length != 0 )
				{
					$('.lazy_bg').each(function(index)
					{
						currOffset = ( $(this).offset().top - ( $(window).height() + smargin ) );
			
						if ( win_scroll > currOffset )
						{
							var bg = $(this).attr('data-src');
			
							if (bg != '')
							{
								$(this).css('background-image','url('+bg+')');
							}
						}
					});
				}
			}
			
		}
	};

	return lazyLoad;
});
