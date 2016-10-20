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
	<section class="page-content">
		<div class="page-template">
			<div class="central_container"> 
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
				<?php comments_template( '', true ); ?>
				<?php endwhile; ?>

				<?php $portfolio = new WP_Query(array(
					'post_type' => 'project'
				)); ?>

				<ul id="filters">
				  	<?php
				  		echo "<li><span class='filter active' data-filter='all'>All</span></li>";
				  		foreach (get_categories('taxonomy=test-cat') as $category){
				    		echo "<li>";
				    		echo "<span class='filter' data-filter='.$category->name'>";
				    		echo $category->name;
				    		echo "</span>";
				    		echo "</li>";
				  		} 
				  	?>
				</ul>

				<div class="portfolio">
					<?php while($portfolio->have_posts()) : $portfolio->the_post(); ?>
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
					<?php endwhile; ?>
				</div>
			</div>
			<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
		</div>
	</section>