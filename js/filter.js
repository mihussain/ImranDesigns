define(['jquery', 'mixItUp'], function($) {
	
	var filter = {
		init: function() {

			var filterList = {
			 	init: function () {
			 		
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

			filterList.init();

			$( window ).resize(function() {
				filterList.init();
			});
		}
	};

	return filter;
});