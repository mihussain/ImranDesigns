define(['jquery'], function($) {
	
	var header = {
		init: function() {

			var windowWidth = $(window).width(),
				headerHeight = $('header').height(),
				headerBottom = $('.hero').height() - $('.nav_bar').height();
				bodyPadding = $('header').height();
				
				if ($(window).scrollTop() >= headerBottom ) {
					$('header').addClass('background');
					//$('body').css({'padding-top': bodyPadding });
		   
			   } else {
				   $('header').removeClass('background');			
				   //$('body').css({'padding-top': 0 });	
			   }
			
			 	$(window).on('scroll', function() {

					var currentScrollTop = $(window).scrollTop();
					$('.hero .overlay').css('opacity',currentScrollTop/$('.hero').height());

			 		if ($(this).scrollTop() >= headerBottom ) {
						 $('header').addClass('background');
						 //$('.scroll-up-arrow').addClass('show');
						 //$('body').css({'padding-top': bodyPadding });
				
					} else {
						$('header').removeClass('background');
						//$('.scroll-up-arrow').removeClass('show');			
						//$('body').css({'padding-top': 0 });	
					}
				 });
				 
				 

			//test

			var didScroll;
			var lastScrollTop = 0;
			var delta = 5;
			var navbarHeight = $('header').outerHeight();

			// on scroll, let the interval function know the user has scrolled
			$(window).scroll(function(event){
			  didScroll = true;
			});
			// run hasScrolled() and reset didScroll status
			setInterval(function() {
			  if (didScroll) {
				hasScrolled();
				didScroll = false;
			  }
			}, 250);

			function hasScrolled() {
				var st = $(this).scrollTop();

				if(Math.abs(lastScrollTop - st) <= delta) {
					return;
				}
    

				// If current position > last position AND scrolled past navbar...
				if (st > lastScrollTop && st > navbarHeight){
					// Scroll Down
					$('header').removeClass('header-down').addClass('header-up');
					$('.scroll-up-arrow').removeClass('show');
				} else {
					// Scroll Up
					// If did not scroll past the document (possible on mac)...
					if(st + $(window).height() < $(document).height()) { 
						$('header').removeClass('header-up').addClass('header-down');
						$('.scroll-up-arrow').addClass('show');
					}
				}
				
				lastScrollTop = st;
			}

			//test end



			
			 
			if($('body').hasClass('home')) {
				//estrelas
				var style = ["style1", "style2", "style3", "style4"];
				var tam = ["tam1", "tam1", "tam1", "tam2", "tam3"];
				var opacity = ["opacity1", "opacity1", "opacity1", "opacity2", "opacity2", "opacity3"];

				function getRandomArbitrary(min, max) {
					return Math.floor(Math.random() * (max - min)) + min;
				}

				var estrela = "";
				var qtdeEstrelas;
				var noite = document.querySelector(".constelacao");
				var widthWindow;
				var heightWindow;

				if(windowWidth <= 786) {
					qtdeEstrelas = 80;
				
				} else {
					qtdeEstrelas = 250;
			
				}

				if( window.innerWidth > window.innerHeight) {
					widthWindow = window.innerWidth * 1.5;
					heightWindow = window.innerWidth * 1.5; //window.innerHeight;
				} else {
					widthWindow = window.innerHeight * 1.5;
					heightWindow = window.innerHeight * 1.5;
				}
				
				//var widthWindow = window.innerWidth;
				//var heightWindow = window.innerWidth; //window.innerHeight;
				$('.constelacao').css({
					'width': widthWindow,
					'height': heightWindow
				});  

				for (var i = 0; i < qtdeEstrelas; i++) {
					estrela += "<span class='estrela " + style[getRandomArbitrary(0, 4)] + " " + opacity[getRandomArbitrary(0, 6)] + " "
					+ tam[getRandomArbitrary(0, 5)] + "' style='animation-delay: ." +getRandomArbitrary(0, 9)+ "s; transform: translateX("
					+ getRandomArbitrary(0, widthWindow) + "px) translateY( " + getRandomArbitrary(0, heightWindow) + "px); will-change: transform;'></span>";
				}

				noite.innerHTML = estrela;

				//meteoros

				var numeroAleatorio = 5000;

				setTimeout(function(){
					carregarMeteoro();
				}, numeroAleatorio);

				function carregarMeteoro(){
					setTimeout(carregarMeteoro, numeroAleatorio);
					numeroAleatorio = getRandomArbitrary(5000, 10000);
					var meteoro = "<div class='meteoro "+ style[getRandomArbitrary(0, 4)] +"'></div>";
					document.getElementsByClassName('chuvaMeteoro')[0].innerHTML = meteoro;
					setTimeout(function(){
					document.getElementsByClassName('chuvaMeteoro')[0].innerHTML = "";
					}, 1000);
				}
			}
		}
	};
	return header;
});