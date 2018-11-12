<?php
/*
 * Template Name: HomePage
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

	<?php
		//featured image 

		$first_featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'featured-image' );

		if( class_exists('Dynamic_Featured_Image') ) {
			global $dynamic_featured_image;
			$second_featured_image = $dynamic_featured_image -> get_nth_featured_image( 2, $page_id);
			$third_featured_image = $dynamic_featured_image -> get_nth_featured_image( 3, $page_id );
		}

	?>

	<main id="content" class="home">

		<section class="section__text text">
			<div class="central_container">
				<div class="text__intro">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</div>

				<div class="text__portfolio">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<?php if(get_field('before_dynamic')): ?>
								<?php the_field('before_dynamic'); ?>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			</div>
		</section>

		<section class="portfolio">
			<div class="portfolio--container">
				<div class="central_container">
					<?php $portfolio = new WP_Query(array(
						'post_type' => 'project'
					)); ?>
									
					<?php $i = 0; while($portfolio->have_posts() && $i < 8 ) : $portfolio->the_post(); ?>

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
					
					<?php $i++; endwhile; ?>
				</div>
			</div>
		</section>

		<section class="section__text">
			<div class="central_container">
				<div class="text__contact">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<?php if(get_field('after_portfolio')): ?>	
							<?php the_field('after_portfolio'); ?>
						<?php endif; ?>

						<?php if(get_field('third_paragraph')): ?>	
							<?php the_field('third_paragraph'); ?>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
	</main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>