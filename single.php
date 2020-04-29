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
	<main class="blog" role="main">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			
				<div class="central_container"> 
				
						<div class="title">
						<h1><?php the_title(); ?></h1>
						</div>
						<div class="bar">
			<div class="breadcrumb">
				<a class="step" href="<?php echo bloginfo('url'); ?>"><span class="icon icon-home"></span></a><a class="step" href="<?php echo bloginfo('url'); ?>/blog">Blog</a><span class="current step"><?php the_title(); ?></span>
			</div>
			<div class="meta">This blog post was created on the <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time></div>
		</div>

				
						<?php /* if (has_post_thumbnail( $post->ID ) ): ?>
								<?php $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-image' ); ?>
						  		<div class="article-featured-image">
									<img src="<?php echo $featuredImage[0]; ?>" />
								</div>
						<?php endif; */ ?>
					
						<article>
						<div class="main-content">
							<div class="left" role="article">
								<?php the_content(); ?>
							</div>
						</div>
						<?php if ( get_the_author_meta( 'description' ) ) : ?>
						<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
						<h3>About <?php echo get_the_author() ; ?></h3>
						<?php the_author_meta( 'description' ); ?>
						<?php endif; ?>
					
					</article>
				</div>


			</article>
			<?php endwhile; ?>

	</main>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>