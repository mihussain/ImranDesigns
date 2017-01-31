<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
	<section class="page-content">
		<div class="central_container"> 
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<div class="container">
				<div class="central_container"> 
					<article>

						<h2><?php the_title(); ?></h2>
						<div class="post-meta">
							This blog post was created on the <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> at <?php the_time(); ?></time> 
						</div>
						<hr>
						<?php if (has_post_thumbnail( $post->ID ) ): ?>
								<?php $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-image' ); ?>
						  		<div class="article-featured-image">
									<img src="<?php echo $featuredImage[0]; ?>" />
								</div>
						<?php endif; ?>
						<div class="main-content"><?php the_content(); ?></div>

						<?php if ( get_the_author_meta( 'description' ) ) : ?>
						<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
						<h3>About <?php echo get_the_author() ; ?></h3>
						<?php the_author_meta( 'description' ); ?>
						<?php endif; ?>
					
					</article>
				</div>
			</div>

				<?php// comments_template( '', true ); ?>

			</article>
			<?php endwhile; ?>
		</div>
	</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>