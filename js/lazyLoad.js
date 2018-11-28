define([], function($) {
	
	var lazyLoad = {
		init: function() {
			
			window.addEventListener('load', function(){
				var allimages= document.getElementsByTagName('img');
				for (var i=0; i<allimages.length; i++) {
						if (allimages[i].getAttribute('data-src')) {
								allimages[i].setAttribute('src', allimages[i].getAttribute('data-src'));
						}

						if (allimages[i].getAttribute('data-srcset')) {
							allimages[i].setAttribute('srcset', allimages[i].getAttribute('data-srcset'));
					}
				}
			}, false)

		}
	};

	return lazyLoad;
});
