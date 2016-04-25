<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');

	add_image_size( 'portfolio-thumb', 600, 600, true ); //
	add_image_size( 'sidebar-thumb', 120, 120, true ); // Hard Crop Mode
	add_image_size( 'featured-image', 1024, 768, true ); // 

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function starkers_script_enqueuer() {


		wp_register_script( 'transit', get_template_directory_uri().'/js/vendor/jquery.transit.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'transit' );

		wp_register_script( 'ease', get_template_directory_uri().'/js/vendor/jquery.easing.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'ease' );

		wp_register_script( 'mixitup', get_template_directory_uri().'/js/vendor/jquery.mixitup.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'mixitup' );

		wp_register_script( 'site', get_template_directory_uri().'/js/main.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
        wp_enqueue_style( 'screen' );
	}	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}

	/* ========================================================================================================================
	
	Menu
	
	======================================================================================================================== */

	function menu() {
		register_nav_menu('header-menu',__( 'Header Menu' ));
	}

	add_action( 'init', 'menu' );


	// split content at the more tag and return an array
	function split_content() {
	    global $more;
	    $more = true;
	    $content = preg_split('/<span id="more-\d+"><\/span>/i', get_the_content('more'));
	    for($c = 0, $csize = count($content); $c < $csize; $c++) {
	        $content[$c] = apply_filters('the_content', $content[$c]);
	    }
	    return $content;
	}

	/* ========================================================================================================================
	
	Remove Custom Post Type Name from URL
	
	======================================================================================================================== */


	function na_remove_slug( $post_link, $post, $leavename ) {

	    if ( 'project' != $post->post_type || 'publish' != $post->post_status ) {
	        return $post_link;
	    }

	    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

	    return $post_link;
	}

	add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );

	function na_parse_request( $query ) {

	    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
	        return;
	    }

	    if ( ! empty( $query->query['name'] ) ) {
	        $query->set( 'post_type', array( 'post', 'project', 'page' ) );
	    }
	}
	add_action( 'pre_get_posts', 'na_parse_request' );

	/* ========================================================================================================================
	
	Share Icons
	
	======================================================================================================================== */