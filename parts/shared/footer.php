
	<footer>
		<div class="central_container"> 
			<div class="col_container">
				<div class="col_1">
					<div class="footer_logo_social">
						<a class="footer_logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="241" height="25" /></a>
						<div class="social">
							<span class="facebook"></span>
							<span class="twitter"></span>
							<span class="linkedin"></span>
							<span class="instagram"></span>
						</div>
					</div>
					<p>ImranDesigns is a digital design and web developemnt portfolio. Why not follow me on the following social media accounts to keep up to date with my latest work! Follow me on my journey through each project that I create. I'm on Facebook, Twitter, Linked In and Instagram.</p>
				</div>
				<div class="col_2">
					<div class="title">Latest News</div>
					<ul>
					<?php
						$args = array( 'numberposts' => '3' );

						$recent_posts = wp_get_recent_posts($args);
						foreach( $recent_posts as $recent ){
							echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
						}
						wp_reset_query();
					?>
					</ul>
					<a class="view_more" href="/portfolio">View More</a>
				</div>
				<div class="col_3">
					<div class="title">Latest Projects</div>

					<?php
						$queryObject = new WP_Query( 'post_type=project&posts_per_page=3' );
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
						    <a class="view_more" href="/portfolio">View More</a>
						    <?php
						}
					?>
				</div>
			</div>
			<div class="small">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. | Sitemap</div>
		</div>
	</footer>
