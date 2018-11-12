define(['jquery'], function($) {
	
	 var portfolio = {
	 	init: function() {
			
	 		$('.portfolio .project').on('click', function(e){
	 			//e.preventDefault();

	 			// if($(this).find('.label').hasClass('open')) {
	 			// 	$(this).find('.label').removeClass('open'); 
	 			// } else {
	 			// 	$(this).find('.label').addClass('open'); 
	 			// }
	 		});			
		
	 		// $('.label .take_a_look').on('click', function(e) {
	 		// 	e.stopPropagation();
	 		// });
	 	}

	 };
	return portfolio;
});