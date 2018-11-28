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

	/* ======================================================e ==================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');

	add_image_size( 'portfolio-thumb', 300, 300, true ); 
	add_image_size( 'portfolio-thumb-retina', 600, 600, true );
	add_image_size( 'portfolio-thumb-large', 400, 400, true );
	add_image_size( 'portfolio-thumb-large-retina', 800, 800, true );
	add_image_size( 'project-featured', 750, 191, true );
	add_image_size( 'project-featured-retina', 1500, 382, true );
	add_image_size( 'featured-image', 1024, 768, true ); // 


	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );

	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );

	/* SCRIPTS */


	add_action( 'wp_default_scripts', 'move_jquery_into_footer' );

	function move_jquery_into_footer( $wp_scripts ) {

	    if( is_admin() ) {
	        return;
	    }

	    $wp_scripts->add_data( 'jquery', 'group', 1 );
	    $wp_scripts->add_data( 'jquery-core', 'group', 1 );
	    $wp_scripts->add_data( 'jquery-migrate', 'group', 1 );
	}

	function my_theme_scripts() {
	    //wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/vendor/jquery-3.1.1.min.js', array( 'jquery' ), '3.1.1', true );
	}

	add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

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


		//wp_register_script( 'transit', get_template_directory_uri().'/js/vendor/jquery.transit.min.js', array( 'jquery' ), '', true );
		//wp_enqueue_script( 'transit' );

		//wp_register_script( 'rgbaster', get_template_directory_uri().'/js/vendor/rgbaster.min.js', array( 'jquery' ), '', true );
		//wp_enqueue_script( 'rgbaster' );

		//wp_register_script( 'mixitup', get_template_directory_uri().'/js/vendor/jquery.mixitup.min.js', array( 'jquery' ), '', true );
		//wp_enqueue_script( 'mixitup' );

		//wp_register_script( 'require', get_template_directory_uri().'/js/vendor/require.js', array(), null, true );
		//wp_enqueue_script( 'require' );

		//wp_register_script( 'site', get_template_directory_uri().'/js/main.min.js', array( 'jquery' ), '', true );
		//wp_enqueue_script( 'site' );

		wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.min.css', '', '', 'screen' );
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
		register_nav_menu('header-menu--left',__( 'Header Menu Left' ));
		register_nav_menu('header-menu--right',__( 'Header Menu Right' ));
		register_nav_menu('header-menu--mobile',__( 'Header Mobile Menu' ));
		register_nav_menu('footer-menu',__( 'Footer Menu' ));
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


	// function na_remove_slug( $post_link, $post, $leavename ) {

	//     if ( 'project' != $post->post_type || 'publish' != $post->post_status ) {
	//         return $post_link;
	//     }

	//     $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

	//     return $post_link;
	// }

	// add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );

	// function na_parse_request( $query ) {

	//     if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
	//         return;
	//     }

	//     if ( ! empty( $query->query['name'] ) ) {
	//         $query->set( 'post_type', array( 'post', 'project', 'page' ) );
	//     }
	// }
	// add_action( 'pre_get_posts', 'na_parse_request' );

	/* ========================================================================================================================
	
	Change excerpt to show 'read more' link
	
	======================================================================================================================== */

   function new_excerpt_more($more) {
   global $post;
   return '… <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
   }
   add_filter('excerpt_more', 'new_excerpt_more');

   /*
	get categories without the hyperlink 
   */

	function user_the_categories() {
	    // get all categories for this post
	    global $cats;
	    $cats = get_the_category();
	    // echo the first category
	    echo $cats[0]->cat_name;
	    // echo the remaining categories, appending separator
	    for ($i = 1; $i < count($cats); $i++) {echo ', ' . $cats[$i]->cat_name ;}
	}

