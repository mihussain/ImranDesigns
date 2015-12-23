<header>
	<h1><a id="logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	 <div id="nav-icon">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
	<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' =>'nav' ) ); ?>
</header>
