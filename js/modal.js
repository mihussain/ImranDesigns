define(['jquery'], function($) {
	
	var modal = {
		init: function() {
			
			var currentImage;
			var totalImages;
			var currentImageNo = 0;

			
			$('.image_section').on('click','a', function(e) {
				e.preventDefault();
				var img = $(this).attr('href');
				currentImage = $(this);
				totalImages = currentImage.nextAll().length + currentImage.prevAll().length;
				currentImageNo = $(this).index();
				$('#modal_img').attr('src', img);
				updateButtons(currentImageNo);
				$('body').addClass('no-scroll');
				$('.modal').css({'display': 'block'});
			});

			//Next 
			$('.modal_next').on('click', function() {
				var nextImage = currentImage.next().attr('href');
				var updateCurrent = currentImage.next();
				currentImage = updateCurrent;
				$('#modal_img').attr('src', nextImage);
				currentImageNo ++;
				updateButtons(currentImageNo);
			});

			//Previous
			$('.modal_previous').on('click', function() {
				var prevImage = currentImage.prev().attr('href');
				var updateCurrent = currentImage.prev();
				currentImage = updateCurrent;
				$('#modal_img').attr('src', prevImage);
				currentImageNo --;
				updateButtons(currentImageNo);
			});
			
			function updateButtons(currentCount) {
				if (currentCount <= 0) {
				
					$('.modal_previous').css('display','none');
				} else {
					$('.modal_previous').css('display','block');
				}

				if (currentCount >= totalImages) {
				
					$('.modal_next').css('display','none');
				} else {
					$('.modal_next').css('display','block');
				}
			}
			
			$('.modal').on('click', function() {
				$('#modal_img').attr('src', '');
				$('body').removeClass('no-scroll');
				$('.modal').css({'display': 'none'});
			}).children().on('click', function (event) {
				event.stopPropagation();
			});

			$('.modal_window').on('click', function() {
				$('#modal_img').attr('src', '');
				$('body').removeClass('no-scroll');
				$('.modal').css({'display': 'none'});
			}).children().on('click', function (event) {
				event.stopPropagation();
			});

			$("body").keydown(function(e) {

				if(e.keyCode == 37) { // left
					
					if($('.modal').css('display') == 'block') {
						if (currentImageNo <= 0) { 
						
						} else {
							var prevImage = currentImage.prev().attr('href');
							var updateCurrent = currentImage.prev();
							currentImage = updateCurrent;
							$('#modal_img').attr('src', prevImage);
							currentImageNo --;
							updateButtons(currentImageNo);
						}
					}
					
				}
				
				else if(e.keyCode == 39) { // right
					
					if($('.modal').css('display') == 'block') {
						if (currentImageNo >= totalImages) { 

						} else {
							var nextImage = currentImage.next().attr('href');
							var updateCurrent = currentImage.next();
							currentImage = updateCurrent;
							$('#modal_img').attr('src', nextImage);
							currentImageNo ++;
							updateButtons(currentImageNo);
						}
					}
				}
			});
			
		}
	};
	return modal;
});