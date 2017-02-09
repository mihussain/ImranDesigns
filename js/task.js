define(['jquery', 'mixItUp'], function($) {
	
	var task = {
		init: function() {

			//Facebook Share 
			 $('.facebookButton').on('click', function() {
			 	FB.ui({
			 		method: 'share_open_graph',
			 	  	action_type: 'og.shares',
			 	  	action_properties: JSON.stringify({
			 			object:'http://www.imrandesigns.co.uk',
			 	  })

			 	}, function(response){});
			 });

			 //Twitter Share
			$('.twitter_pop_up').on('click', function(){
				    var width  = 575,
			        height = 400,
			        left   = ($(window).width()  - width)  / 2,
			        top    = ($(window).height() - height) / 2,
			        url    = this.href,
			        opts   = 'status=1' +
			                 ',width='  + width  +
			                 ',height=' + height +
			                 ',top='    + top    +
			                 ',left='   + left;
			    
			    window.open(url, 'twitter', opts);
			 
			    return false;
			});
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
		}
	};

	return task;
});
