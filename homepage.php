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
					<div class="dark_bg"><?php the_content(); ?></div>
				</div>
				<?php if ( !empty($first_featured_image) ) : ?>
					<img class="part_1_image" src="<?php echo $first_featured_image[0]; ?>" />
				<?php endif; ?>
			</div>
			<?php endwhile; ?>

			<div class="dynamic-content">
				<div class="central_container"> 

					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<?php if(get_field('before_dynamic')): ?>
								<div class="part_2 <?php if ( !empty($second_featured_image) ) : ?>bg_image<?php endif; ?>">
						
										<?php the_field('before_dynamic'); ?>
					

									<?php if ( !empty($second_featured_image) ) : ?>
										<img class="part_2_image" src="<?php echo $second_featured_image['full']; ?>" />
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>

					<div class="dynamic-content__portfolio portfolio <?php if (get_field('background_images')): ?>bg_image<?php endif; ?>">
					
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<?php if(get_field('before_portfolio')): ?>
								<div class="part_2_5 <?php if ( !empty($second_featured_image) ) : ?>bg_image<?php endif; ?>">
						
										<h3><?php the_field('before_portfolio'); ?></h3>
					

									<?php if ( !empty($second_featured_image) ) : ?>
										<img class="part_2_image" src="<?php echo $second_featured_image['full']; ?>" />
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>

						<?php $portfolio = new WP_Query(array(
							'post_type' => 'project'
						)); ?>
						
						<?php $i = 0; while($portfolio->have_posts() && $i < 6 ) : $portfolio->the_post(); ?>

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

					<div class="dynamic-content__blog">
					
						<?php $news = new WP_Query(array(
							'category' => 'blog_posts'
						)); ?>

						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<?php if(get_field('before_blog')): ?>
								<div class="part_2_blog <?php if ( !empty($second_featured_image) ) : ?>bg_image<?php endif; ?>">
						
										<h3><?php the_field('before_blog'); ?></h3>
					

									<?php if ( !empty($second_featured_image) ) : ?>
										<img class="part_2_image" src="<?php echo $second_featured_image['full']; ?>" />
									<?php endif; ?>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>

						<?php if ( have_posts() ): ?>
							
							<ol class="news">
							<?php $i = 0; while($news->have_posts() && $i < 2 ) : $news->the_post(); ?>
								<?php $thumbImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-thumb' ); ?>
		
								<li>
									<article>
										<div class="post-content">
											<div class="post-content__image"></div>
											<h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
											
											<div class="post-content__title">
												<?php the_excerpt(); ?>
											</div>
										</div>
										<div class="meta-container">
											<div class="post-meta">
												This blog post was created on the <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> at <?php the_time(); ?></time> 
											</div>
										</div>
										<span class="bg_image" style="background-image: url('<?php echo $thumbImage[0]; ?>');"></span>
									</article>
								</li>
							<?php $i++; endwhile; ?>
							</ol>
							<?php else: ?>
							<h2>No posts to display</h2>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php if(get_field('after_portfolio')): ?>	
					<div class="part_3 <?php if ( !empty($third_featured_image) ) : ?>bg_image<?php endif; ?>">
						<div class="central_container"> 
							<?php the_field('after_portfolio'); ?>
						</div>

						<?php if ( !empty($third_featured_image) ) : ?>
							<img class="part_3_image" src="<?php echo $third_featured_image['full']; ?>" />
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if(get_field('third_paragraph')): ?>	
					<div class="part_4 <?php if (get_field('background_images')): ?>bg_image<?php endif; ?>">
						<div class="central_container"> 
							<?php the_field('third_paragraph'); ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
	</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>