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

	add_image_size( 'portfolio-thumb', 600, 600, true ); //
	add_image_size( 'sidebar-thumb', 120, 120, true ); // Hard Crop Mode
	add_image_size( 'featured-image', 1024, 768, true ); // 
	add_image_size( 'landscape-image', 1024, 400, false);

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

		//wp_register_script( 'color-thief', get_template_directory_uri().'/js/vendor/color-thief.min.js', array( 'jquery' ), '', true );
		//wp_enqueue_script( 'color-thief' );

		//wp_register_script( 'mixitup', get_template_directory_uri().'/js/vendor/jquery.mixitup.min.js', array( 'jquery' ), '', true );
		//wp_enqueue_script( 'mixitup' );

		wp_register_script( 'require', get_template_directory_uri().'/js/vendor/require.js', array(), null, true );
		wp_enqueue_script( 'require' );

		wp_register_script( 'site', get_template_directory_uri().'/js/main.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'site' );

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
		register_nav_menu('header-menu-left',__( 'Header Menu Left' ));
		register_nav_menu('header-menu-right',__( 'Header Menu Right' ));
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

	/*
	OPEN GRAPH 
	*/

	function doctype_opengraph($output) {
	    return $output . '
	    xmlns:og="http://opengraphprotocol.org/schema/"
	    xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
	add_filter('language_attributes', 'doctype_opengraph');

	function fb_opengraph() {
	    global $post;
	 
	    if(is_single()) {
	        if(has_post_thumbnail($post->ID)) {
	            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'featured-image');
	        } else {
	            $img_src = get_stylesheet_directory_uri() . '/img/opengraph_image.jpg';
	        }
	        if($excerpt = $post->post_excerpt) {
	            $excerpt = strip_tags($post->post_excerpt);
	            $excerpt = str_replace("", "'", $excerpt);
	        } else {
	            $excerpt = get_bloginfo('description');
	        }
	        ?>
	 
	    <meta property="og:title" content="<?php echo the_title(); ?>"/>
	    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
	    <meta property="og:type" content="article"/>
	    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
	    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
	    <meta property="og:image" content="<?php echo $img_src[0]; ?>"/>

	    <meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@imrandesigns">
		<meta name="twitter:title" content="<?php echo the_title(); ?>">
		<meta name="twitter:description" content="<?php echo $excerpt; ?>">
		<meta name="twitter:image" content="<?php echo $img_src[0]; ?>">
	 
	<?php
	    } else {
	        return;
	    }
	}
	add_action('wp_head', 'fb_opengraph', 5);


