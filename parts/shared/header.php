<header>
	<div class="central_container_header"> 
	<a id="logo" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" width="241" height="25" /></a>
	 <div id="nav-icon">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
	<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' =>'nav' ) ); ?>
	<div class="central_container"> 
</header>
