<header>
	<div class="central_container_header"> 
	<a id="logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="241" height="25" /></a>
	 <div id="nav-icon">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <nav>
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

				<div class="dynamic_posts">
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
			
					<div class="title">Latest Projects</div>

					<?php
						$queryObject = new WP_Query( 'post_type=project&posts_per_page=1' );
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



		<div class="social">
			<span class="facebook"></span>
			<span class="twitter"></span>
			<span class="linkedin"></span>
			<span class="instagram"></span>
		</div>
	</nav>
	<div class="central_container"> 
</header>
