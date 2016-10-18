<?php
/**
 * Template Name: HomePage
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
	<section class="page-content">

			<?php

				$first_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'featured-image' );

				if( class_exists('Dynamic_Featured_Image') ) {
					global $dynamic_featured_image;
					$second_featured_image = $dynamic_featured_image -> get_nth_featured_image( 2, $page_id);
					$third_featured_image = $dynamic_featured_image -> get_nth_featured_image( 3, $page_id );
				}

			?>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
			<div class="part_1 <?php if ( !empty($first_featured_image) ) : ?>bg_image<?php endif; ?>">
				<div class="central_container"> 
					<?php the_content(); ?>
				</div>
				<?php if ( !empty($first_featured_image) ) : ?>
					<img class="part_1_image" src="<?php echo $first_featured_image[0]; ?>" />
				<?php endif; ?>
			</div>
			<?php comments_template( '', true ); ?>
			<?php endwhile; ?>

			<?php $portfolio = new WP_Query(array(
				'post_type' => 'project'
			)); ?>

			<div class="portfolio <?php if (get_field('background_images')): ?>bg_image<?php endif; ?>">
				<div class="central_container"> 
					
					
					<?php $i = 0; while($portfolio->have_posts() && $i < 12 ) : $portfolio->the_post(); ?>

						<?php 
							$taxonomy = 'test-cat';
							$terms = get_the_terms( $post->ID , $taxonomy );
						?>
					
						<div class="project mix <?php if ( !empty( $terms ) ) : foreach ( $terms as $term ) { if ( !is_wp_error( $link ) ) echo $term->name; } endif;  ?>">
							<div class="project-wrapper">
								<?php if (has_post_thumbnail( $post->ID ) ): ?>
									
									<?php $thumbImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-thumb' ); ?>
								  	
								  	<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
										<div class="thumbnail_image_container" style="background-image: url('<?php echo $thumbImage[0]; ?>');">
										</div>	
								  		
								  		<div class="label">
									  		<div class="label-text">
									  			<div class="label--container">
										  			<div class="label-title"><?php the_title(); ?></div>
										  			<div class="button take_a_look">View Project</div>
										  			<div class="label-cat"><?php user_the_categories(); ?></div>
									  			</div>
									  		</div>
									  		<div class="label-bg" style="background-image: url('<?php echo $thumbImage[0]; ?>');"></div>
									  	</div>
									</a>
								  	
								<?php endif; ?>
				  			</div>
						</div>
					</a>
					<?php $i++; endwhile; ?>
				</div>
			</div>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="part_2 <?php if ( !empty($second_featured_image) ) : ?>bg_image<?php endif; ?>">
				<div class="central_container"> 
					<?php the_field('after_portfolio'); ?>
				</div>

				<?php if ( !empty($second_featured_image) ) : ?>
					<img class="part_2_image" src="<?php echo $second_featured_image['full']; ?>" />
				<?php endif; ?>
			</div>

			<div class="part_3 <?php if (get_field('background_images')): ?>bg_image<?php endif; ?>">
				<div class="central_container"> 
					<?php the_field('third_paragraph'); ?>
				</div>
			</div>
			<?php endwhile; ?>
	</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>