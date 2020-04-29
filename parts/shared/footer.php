
	<footer role="contentinfo">
		<div class="central_container"> 
			<div class="col_container">
				<div class="col_1">
					<div class="footer_logo_social">
						<a class="footer_logo" href="<?php echo home_url(); ?>">
							<img class="lazy" data-src="<?php echo get_template_directory_uri(); ?>/images/imrandesigns_logo.svg" width="100" height="auto" alt="ImranDesigns logo, small" />
							<noscript><img src="<?php echo get_template_directory_uri(); ?>/images/imrandesigns_logo.svg" width="100" height="auto" alt="ImranDesigns logo, small" /></noscript>
						</a>
						<div class="social">
							<a href="https://www.facebook.com/ImranDesigns/" aria-label="Facebook" target="_blank" rel="noreferrer"><span class="icon icon-facebook2"></span></a>
							<a href="https://twitter.com/imrandesigns" aria-label="Twitter" target="_blank" rel="noreferrer"><span class="icon icon-twitter"></span></a>
							<a href="https://www.linkedin.com/in/mihussain/" aria-label="Linked In" target="_blank" rel="noreferrer"><span class="icon icon-linkedin"></span></a>
							<a href="https://www.instagram.com/imran_designs/" aria-label="Instagram"  target="_blank" rel="noreferrer"><span class="icon icon-instagram"></span></a>
						</div>
					</div>
					<p>ImranDesigns is a digital design and web developemnt portfolio. Why not follow me on the following social media accounts to keep up to date with my latest work! Follow me on my journey through each project that I create. I'm on Facebook, Twitter, Linked In and Instagram.</p>
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' =>'nav' ) ); ?>
				</div>
				<div class="col_2">
					<div class="title">Latest Blog Posts</div>
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
					<a class="view_more" aria-label="View more blog posts" href="/portfolio">View More</a>
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
						    <a class="view_more" aria-label="View more projects" href="/portfolio">View More</a>
						    <?php
						}
					?>
				</div>
			</div>
			
		</div>
		<div class="small">&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. | <a href="<?php echo site_url('/sitemap/') ?>" title="Go to Sitemap" aria-label="Sitemap">Sitemap</a></div>
	</footer>
	<a class="scroll-up-arrow" href="" aria-label="Scroll back top top"><span>Scroll back to top</span></a>
