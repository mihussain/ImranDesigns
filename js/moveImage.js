define(['jquery'], function($) {
	
	var moveImage = {
		init: function() {

			// var movementStrength = 25;
			// var height = movementStrength / $(window).height();
			// var width = movementStrength / $(window).width();
			
			// $('.bg_image').mousemove(function(e){
			//           var pageX = e.pageX - ($(window).width() / 2);
			//           var pageY = e.pageY - ($(window).height() / 2);
			//           var newvalueX = width * pageX * -1 - 25;
			//           var newvalueY = height * pageY * -1 - 50;
			//           $('.bg_image').css("background-position", newvalueX+"px     "+newvalueY+"px");
			// });

			var lFollowX = 0,
			    lFollowY = 0,
			    x = 0,
			    y = 0,
			    friction = 2 / 30;

			function moveBackground() {
				x += (lFollowX - x) * friction;
			  	y += (lFollowY - y) * friction;
			  
			  	translate = 'translate(' + x + 'px, ' + y + 'px) scale(1.5)';

			  	$('.move_image').css({
			    	'-webit-transform': translate,
			    	'-moz-transform': translate,
			    	'transform': translate
			  	});

			  	window.requestAnimationFrame(moveBackground);
			}

			$('header, .part_1').on('mousemove', function(e) {
			  	var lMouseX = Math.max(-100, Math.min(100, $(window).width() / 2 - e.clientX));
			  	var lMouseY = Math.max(-100, Math.min(100, $(window).height() / 2 - e.clientY));
			  	lFollowX = (20 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
			  	lFollowY = (10 * lMouseY) / 100;
			});

			moveBackground();
		}
	};

	return moveImage;
});