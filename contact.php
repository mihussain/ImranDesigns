<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "ContactPoint",
        "email": "hello@imrandesigns.co.uk",
        "telephone": "07540143107",
        "areaServed": "Worldwide"
    }
    </script>

	<main id="content" class="contact" role="main">
		<div class="page-template">
			<div class="central_container"> 
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="title"><h2><?php the_title(); ?></h2></div>
                <div class="contact--content"><?php the_content(); ?></div>
                <?php endwhile; ?>
                
                <div class="contact--container">
                    <div class="contact__left">
                        <div class="tel">
                            <h2>Phone:</h2>
                            <a href="tel:07540143107"><span class="icon icon-phone"></span><h3>+44(0)7540 143 107</h3></a>
                        </div>
                        <div class="email">
                            <h2>Email:</h2>
                            <a href="mailto:hello@:imrandesigns.co.uk"><span class="icon icon-email"></span><h3>hello@imrandesigns.co.uk</h3></a>
                        </div>
                    </div>
                    <div class="contact__right">
                        <?php echo do_shortcode("[formidable id=2]"); ?>
                    </div>
                </div>
			</div>
		</div>
    </main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>