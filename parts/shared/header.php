<?php global $template; ?>

<header>
	<div class="header-container">
		<div id="nav-icon">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		
		<div class="nav_bar">
			<nav class="nav--left"><?php wp_nav_menu( array( 'theme_location' => 'header-menu--left' ) ); ?></nav>
			<img src="<?php echo get_template_directory_uri() ?>/images/imrandesigns_logo.svg" width="70" height="auto">
			<nav class="nav--right"><?php wp_nav_menu( array( 'theme_location' => 'header-menu--right' ) ); ?></nav>
		</div>
	</div>
</header>

<div class="hero">
	<div class="overlay"></div>
	<?php if (is_page_template('homepage.php')) { ?>
		<img id="logo" src="<?php echo get_template_directory_uri() ?>/images/imrandesigns_logo.svg" width="100" height="auto">


	<?php } else if ( basename($template) === 'single-project.php') { ?>
		<?php /* if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="hero-text box-border">
				<h2 class="hero_title"><?php the_title(); ?></h2>
				<!--
				<span class="built_by">Proudly built by</span> 
				<img class="made_by" src="http://imrandesigns.local/wp-content/themes/imrandesigns-portfolio/images/imrandesigns_logo.svg" width="240" height="auto">
				-->
			</div>
			<?php endwhile; */ ?>
	<?php } else if ( basename($template) === 'index.php') { ?>
		
			<div class="hero-image">
					<div class="page-image" style="background-image: url('<?php echo get_template_directory_uri() ?>/images/blog.jpg');"></div>		
				</div>
				

			
	<?php } else { ?>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $landscapeImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

				<div class="hero-image">
					<div class="page-image" style="background-image: url(<?php echo $landscapeImage[0]; ?>);"></div>
					
				</div>
			<?php endif; ?>
			<?php endwhile; ?>

	
	<?php } ?>

	<?php if ( basename($template) === 'homepage.php') { ?>
		<a class="scroll-down-arrow animated bounce" href="#content"></a>
	<?php } ?>
	
	<div class="scene">
		<?php if ( basename($template) === 'homepage.php') { ?>
			
				<div class="noite"></div>

				<div class="constelacao"></div>

				<div class="chuvaMeteoro"></div>
		
		<?php } ?>

		<?php if ( basename($template) === 'single-project.php') { ?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $landscapeImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

					<div class="hero-image">
						<div class="move-image" style="background-image: url(<?php echo $landscapeImage[0]; ?>);"></div>
						
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php } ?>
	</div>
</div>

<nav class="nav--mobile">
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
	<a class="social__link" href="https://www.facebook.com/ImranDesigns/" target="_blank"><span class="icon icon-facebook2"></span></a>
	<a class="social__link" href="https://twitter.com/imrandesigns" target="_blank"><span class="icon icon-twitter"></span></a>
	<a class="social__link" href="https://www.linkedin.com/in/mihussain/" target="_blank"><span class="icon icon-linkedin"></span></a>
	<a class="social__link" href="https://www.instagram.com/imran_designs/" target="_blank"><span class="icon icon-instagram"></span></a>
			
</div>
</nav>
