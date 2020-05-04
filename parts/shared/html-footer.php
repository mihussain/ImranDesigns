
			<?php wp_footer(); ?>
		</div>

		<!-- Loading require.js -->
		<script async data-main="<?php echo get_stylesheet_directory_uri() ?>/js/main.min.js" src="<?php echo get_stylesheet_directory_uri() ?>/js/vendor/require.js"></script>

		<!-- Load Facebook SDK for JavaScript -->
		<div id="fb-root"></div>
		<script>
			window.fbAsyncInit = function() {
			FB.init({
				xfbml            : true,
				version          : 'v6.0'
			});
			};

			(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = 'https://connect.facebook.net/en_GB/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<!-- Your customer chat code -->
		<div class="fb-customerchat"
			attribution=setup_tool
			page_id="522178257826533"
			theme_color="#1B2735"
			logged_in_greeting="Hi! Welcome to ImranDesigns, How can I help you?"
			logged_out_greeting="Hi! Welcome to ImranDesigns, How can I help you?">
		</div>
	
	</body>
</html>