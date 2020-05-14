define(['jquery'], function($) {
	
	var modal = {
		init: function() {
			
			var currentImage;
			var totalImages;
			var currentImageNo = 0;

			
			$('.image_section').on('click','a', function(e) {
				e.preventDefault();


				if($(this).parent().hasClass('wp-caption')) {
					currentImage = $(this).parent();

					var img = currentImage.children('a').attr('href'),
						caption = currentImage.children('.wp-caption-text').text();

						$('#modal_img').attr('alt', caption);
						$('.image_container').append('<p id="modal_caption" class="wp-caption-text">' + caption + '</p>');
				} else {
					currentImage = $(this);
					var img = $(this).attr('href');
				}
				
				totalImages = currentImage.nextAll().length + currentImage.prevAll().length;
				currentImageNo = currentImage.index();
				$('#modal_img').attr('src', img);
				updateButtons(currentImageNo);
				$('body').addClass('no-scroll');
				$('.modal').css({'display': 'block'});
			});

			//Next 
			$('.modal_next').on('click', function() {

				if(currentImage.hasClass('wp-caption')) {
					var nextImage = currentImage.next().children('a').attr('href'),
						nextCaption = currentImage.next().children('.wp-caption-text').text();

					$('#modal_img').attr('alt', nextCaption);
					if ('#modal_container p#modal_caption') {
						$('#modal_caption').text(nextCaption);
					} else {
						$('.image_container').append('<p id="modal_caption" class="wp-caption-text">' + nextCaption + '</p>');
					}
				} else {
					var nextImage = currentImage.next().attr('href');
				}

				var updateCurrent = currentImage.next();
				currentImage = updateCurrent;
				$('#modal_img').attr('src', nextImage);
				currentImageNo ++;
				updateButtons(currentImageNo);
			});

			//Previous
			$('.modal_previous').on('click', function() {

				if(currentImage.hasClass('wp-caption')) {
					var prevImage = currentImage.prev().children('a').attr('href'),
						prevCaption = currentImage.prev().children('.wp-caption-text').text();

					$('#modal_img').attr('alt', prevCaption);
					if ('#modal_container p#modal_caption') {
						$('#modal_caption').text(prevCaption);
					} else {
						$('.image_container').append('<p id="modal_caption" class="wp-caption-text">' + prevCaption + '</p>');
					}
				} else {
					var prevImage = currentImage.prev().attr('href');
				}

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
			
			$('.modal_close').on('click', function() {
				$('#modal_img').attr('src', '');
				$('#modal_caption').remove();
				$('body').removeClass('no-scroll');
				$('.modal').css({'display': 'none'});
			});

			// $('.modal_window').on('click', function() {
			// 	$('#modal_img').attr('src', '');
			// 	$('#modal_caption').remove();
			// 	$('body').removeClass('no-scroll');
			// 	$('.modal').css({'display': 'none'});
			// }).children().on('click', function (event) {
			// 	event.stopPropagation();
			// });

			$("body").keydown(function(e) {

				if(e.keyCode == 37) { // left
					
					if($('.modal').css('display') == 'block') {
						if (currentImageNo <= 0) { 
						
						} else {

							if(currentImage.hasClass('wp-caption')) {
								var prevImage = currentImage.prev().children('a').attr('href'),
									prevCaption = currentImage.prev().children('.wp-caption-text').text();
			
								$('#modal_img').attr('alt', prevCaption);
								if ('#modal_container p#modal_caption') {
									$('#modal_caption').text(prevCaption);
								} else {
									$('.image_container').append('<p id="modal_caption" class="wp-caption-text">' + prevCaption + '</p>');
								}
							} else {
								var prevImage = currentImage.prev().attr('href');
							}
			
							
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
							
							if(currentImage.hasClass('wp-caption')) {
								var nextImage = currentImage.next().children('a').attr('href'),
									nextCaption = currentImage.next().children('.wp-caption-text').text();
			
								$('#modal_img').attr('alt', nextCaption);
								if ('#modal_container p#modal_caption') {
									$('#modal_caption').text(nextCaption);
								} else {
									$('.image_container').append('<p id="modal_caption" class="wp-caption-text">' + nextCaption + '</p>');
								}
							} else {
								var nextImage = currentImage.next().attr('href');
							}

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