<?php global $template; ?>

<header role="banner">
	<div class="header-container">
		<div id="nav-icon" aria-label="Toggle mobile menu">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		
		<div class="nav_bar">
			<nav class="nav--left" role="navigation" aria-label="Left Navigation"><?php wp_nav_menu( array( 'theme_location' => 'header-menu--left' ) ); ?></nav>
			<a href="<?php echo home_url(); ?>"><img class="lazy" data-src="<?php echo get_template_directory_uri() ?>/images/imrandesigns_logo.svg" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" width="70" height="auto" alt="ImranDesigns logo" /></a>
			<noscript><img src="<?php echo get_template_directory_uri() ?>/images/imrandesigns_logo.svg" width="70" height="auto" alt="ImranDesigns logo" /></noscript>
			<nav class="nav--right" role="navigation" arial-label="Right Navigation"><?php wp_nav_menu( array( 'theme_location' => 'header-menu--right' ) ); ?></nav>
		</div>
	</div>
</header>

<div class="hero" >
	<div class="overlay"></div>
	<?php if (is_page_template('homepage.php')) { ?>
		<img id="logo" class="lazy" data-src="<?php echo get_template_directory_uri() ?>/images/imrandesigns_logo.svg" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" width="500" height="auto" alt="ImranDesigns logo, header hero image" />
		<noscript><img id="logo" src="<?php echo get_template_directory_uri() ?>/images/imrandesigns_logo.svg" width="100" height="auto" alt="ImranDesigns logo, header hero image" /></noscript>

	<?php } else if ( basename($template) === 'index.php') { ?>
		
			<div class="hero-image">
					<div class="page-image" style="background-image: url('<?php echo get_template_directory_uri() ?>/images/blog.jpg');"></div>		
				</div>
	
	<?php } else if ( basename($template) === 'sitemap.php') { ?>
		
			<div class="hero-image">
					<div class="page-image" style="background-image: url('<?php echo get_template_directory_uri() ?>/images/sitemap.jpg');"></div>		
				</div>

	<?php } else if ( basename($template) === '404.php') { ?>
		
		<div class="hero-image">
				<div class="page-image" style="background-image: url('<?php echo get_template_directory_uri() ?>/images/404.jpg');"></div>		
			</div>

			
	<?php } else { ?>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $landscapeImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'project-featured-retina' ); ?>

				<div class="hero-image">
					<div class="page-image" style="background-image: url(<?php echo $landscapeImage[0]; ?>);"></div>
					
				</div>
			<?php endif; ?>
			<?php endwhile; ?>

	
	<?php } ?>

	<?php if ( basename($template) === 'homepage.php') { ?>
		<a class="scroll-down-arrow animated bounce" href="#content"><span>Skip to content</span></a>
	<?php } ?>
	
	<div class="scene">
		<?php if ( basename($template) === 'homepage.php') { ?>
			
				<div class="noite"></div>

				<div class="constelacao"></div>

				<div class="chuvaMeteoro"></div>
		
		<?php } ?>

	
	</div>
</div>

<nav class="nav--mobile" role="navigation" artia-label="Mobile Navigation">
	<nav class="mobile--nav"><?php wp_nav_menu( array( 'theme_location' => 'header-menu--mobile' ) ); ?></nav>

		<div class="dynamic_posts">
			<div class="dynamic__blog">
				<div class="title">Latest Blog Posts</div>
				<ul>
				<?php
					$args = array( 'numberposts' => '1' );

					$recent_posts = wp_get_recent_posts($args);
					foreach( $recent_posts as $recent ){
						echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
					}
					wp_reset_query();
				?>
				</ul>
			</div>

			<div class="dynamic__projects">
				<div class="title">Latest Projects</div>

				<?php
					$queryObject = new WP_Query( 'post_type=project&posts_per_page=2' );
					// The Loop!
					if ($queryObject->have_posts()) {
						?>
						<ul>
						<?php 
						while ($queryObject->have_posts()) {
							$queryObject->the_post();
							?>

							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php
						}
						?>
						</ul>
						<?php
					}
				?>
			</div>
		</div>



<div class="social">
	<a class="social__link" href="https://www.facebook.com/ImranDesigns/" aria-label="Facebook" target="_blank" rel="noreferrer"><span class="icon icon-facebook2"></span></a>
	<a class="social__link" href="https://twitter.com/imrandesigns" aria-label="Twitter" target="_blank" rel="noreferrer"><span class="icon icon-twitter"></span></a>
	<a class="social__link" href="https://www.linkedin.com/in/mihussain/" aria-label="Linked In" target="_blank" rel="noreferrer"><span class="icon icon-linkedin"></span></a>
	<a class="social__link" href="https://www.instagram.com/imran_designs/" aria-label="Instagram" target="_blank" rel="noreferrer"><span class="icon icon-instagram"></span></a>
			
</div>
</nav>
