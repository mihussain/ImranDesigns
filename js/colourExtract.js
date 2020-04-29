define(['jquery'], function($) {
	
	var colourExtract = {
		init: function() {

			$(document).ready(function() {
				// console.log('rgbaster');

				// if($('body').hasClass('single-project')) {

				// 	var sourceImage = $('.move-image').css('background-image');
				// 	var img = sourceImage.replace('url(','').replace(')','').replace(/\"/gi, "");
				// 	var dominantColor;
					
				// 	RGBaster.colors(img, {
				// 	success: function(payload) {
				// 		// You now have the payload.
				// 		console.log(payload.dominant);
				// 		console.log(payload.secondary);
				// 		console.log(payload.palette);

				// 		dominantColor = payload.dominant;
				// 		$('.menu-item:hover').css('background-color',payload.dominant);
				// 		$('.bar').css({'background-color' : payload.dominant, 'color' : payload.secondary});
				

				// 		console.log('done');
				// 	console.log(dominantColor);
				// 	}
				// 	});

					
					
				// }
			});
		}
	};
	return colourExtract;
});