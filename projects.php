<?php
/**
 * Template Name: Portfolio Page
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
	<main id="content" class="portfolio-page" role="main">
		
			
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<div class="title"><h2><?php the_title(); ?></h2></div>
						<?php the_content(); ?>
					<?php endwhile; ?>

					<?php $portfolio = new WP_Query(array(
						'post_type' => 'project'
					)); ?>

					<ul id="filters" role="menu">
						<?php
							echo "<li><span class='filter active' data-filter='all'>All</span></li>";

							foreach (get_terms('taxonomy=project_type&hide_empty=true') as $term){

								echo "<li>";
								echo "<span class='filter' data-filter='.$term->slug'>";
								echo $term->name;
								echo "</span>";
								echo "</li>";
							}
						?>
					</ul>

					<div class="project_portfolio" role="article">
					<div class="central_container">	
					<div class="portfolio--container">
								
							
								<?php while($portfolio->have_posts()) : $portfolio->the_post(); ?>
									<?php 
										$taxonomy = 'project_type';
										$terms = get_the_terms( $post->ID , $taxonomy );
									?>
									



									<div class="project mix <?php if ( !empty( $terms ) ) : foreach ( $terms as $term ) { if ( !is_wp_error( $link ) ) echo $term->slug; } endif;  ?>">
											
										<?php if (has_post_thumbnail( $post->ID ) ): ?>
											
											<?php $thumbImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-thumb-large' ); ?>
											<?php $thumbImageRetina = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-thumb-large-retina' ); ?>
											
											<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
									
												<img data-src="<?php echo $thumbImage[0]; ?>" data-srcset="<?php echo $thumbImage[0]; ?> 1x, <?php echo $thumbImageRetina[0]; ?> 2x" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" />
												<noscript><img src="<?php echo $thumbImage[0]; ?>" srcset="<?php echo $thumbImage[0]; ?> 1x, <?php echo $thumbImageRetina[0]; ?> 2x" /></noscript>
									
											</a>
											
										<?php endif; ?>
										
									</div>





										
									</a>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				
		
	</main>
	<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>