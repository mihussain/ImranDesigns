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

	<main id="content" class="home" role="main">

		<section class="section__text text" role="article">
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

		<section class="project_portfolio" role="article">
			<div class="central_container">
				<div class="portfolio--container">
					<?php $portfolio = new WP_Query(array(
						'post_type' => 'project'
					)); ?>
									
					<?php $i = 0; while($portfolio->have_posts() && $i < 8 ) : $portfolio->the_post(); ?>

						<?php 
							$taxonomy = 'test-cat';
							$terms = get_the_terms( $post->ID , $taxonomy );
						?>
					
						<div class="project mix <?php if ( !empty( $terms ) ) : foreach ( $terms as $term ) { if ( !is_wp_error( $link ) ) echo $term->name; } endif;  ?>">
						
								<?php if (has_post_thumbnail( $post->ID ) ): ?>
									
									<?php $thumbImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-thumb' ); ?>
									<?php $thumbImageRetina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-thumb-retina' ); ?>
									
									<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
						
											<img data-src="<?php echo $thumbImage[0]; ?>" data-srcset="<?php echo $thumbImage[0]; ?> 1x, <?php echo $thumbImageRetina[0]; ?> 2x" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="The featured image for the following project, <?php the_title(); ?>" />
											<noscript><img src="<?php echo $thumbImage[0]; ?>" srcset="<?php echo $thumbImage[0]; ?> 1x, <?php echo $thumbImageRetina[0]; ?> 2x" alt="The featured image for the following project, <?php the_title(); ?>"/></noscript>
								

									</a>
									
								<?php endif; ?>
							
						</div>
					
					<?php $i++; endwhile; ?>
				</div>
			</div>
		</section>

		<section class="section__text" role="article">
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