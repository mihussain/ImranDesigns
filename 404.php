<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

    <main id="content" class="contact">
		<div class="page-template">
			<div class="central_container"> 

                <div class="title">
                    <h2>Whoops!</h2>
                    <h3>The Page that you were looking for can't be found</h3>
                </div>

                <div class="text-center">
                <p>Would you like to...</>
                <p>start again? - <a href="<?php echo site_url() ?>">go to the homepage</a></p>
                <p>Browse through the portfolio instead - <a href="<?php echo site_url('/portfolio/') ?>">go to the portfolio page</a></p>
                <p>Or contact us - <a href="<?php echo site_url('/contact/') ?>">go to contact page</a></p>
                </div>

            </div>
        </div>
    </main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>