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
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<main class="project" role="main">
		<div class="central_container"> 
		<div class="title">			
			<h2><?php the_title(); ?></h2> 		
		</div>
		<div class="bar">
			<div class="breadcrumb">
				<a class="step" href="<?php echo bloginfo('url'); ?>"><span class="icon icon-home"></span></a><a class="step" href="<?php echo bloginfo('url'); ?>/portfolio">Portfolio</a><span class="current step"><?php the_title(); ?></span>
			</div>
			<a class="project_link" href="<?php the_field('url'); ?>" target="_blank">View Website</a> 
		</div>
			<article>
				<div class="left" role="article">
				
					
						
						<?php
						    // split content into array
						    $content = split_content();
						    // output first content section in column1
						    echo '<div id="column1">', array_shift($content), '</div>';
						?>						

						<?php
							if( have_rows('images') ): ?>

								<div class="image_section">

							    <?php while ( have_rows('images') ) : the_row(); 

									$image = get_sub_field('image');
									if( !empty($image) ): 

										// vars
										$url = $image['url'];
										$title = $image['title'];
										$alt = $image['alt'];
										$caption = $image['caption'];

										// thumbnail
										$size = 'thumbnail';
										$thumb = $image['sizes'][ $size ];
										$width = $image['sizes'][ $size . '-width' ];
										$height = $image['sizes'][ $size . '-height' ];

										if( $caption ): ?>
											<div class="wp-caption">
										<?php endif; ?>

										<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
											<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
										</a>

										<?php if( $caption ): ?>
												<p class="wp-caption-text"><?php echo $caption; ?></p>
											</div>
										<?php endif; ?>
									<?php endif; ?>
								<?php endwhile; ?>
								
								</div>

							<?php else :
							    // no rows found
							endif;
						?>

						<?php
							// output remaining content sections in column2
						    echo '<div id="column2">', implode($content), '</div>';
						?>


					
		
				</div>

				<?php if ( !empty($value) || !empty($terms) || get_field('url')) : ?>
				<div class="sidebar" role="complementary">
					
					<div class="details">
						<?php 
						$field = get_field_object('features');
						$value = $field['value'];
						$choices = $field['choices'];

						if( $value ): ?>
							<div class="section">
								<span class="section__heading"><span class="icon icon-stack"></span> This website uses:</span>
								<span class="section__body">
									<ul class="features">
										<?php foreach( $value as $v ): ?>
										<li>
											<?php echo $choices[ $v ]; ?>
										</li>
										<?php endforeach; ?>
									</ul>
								</span>
							</div>
						<?php endif; ?>

						<?php 
							$taxonomy = 'project_type';
							$terms = get_the_terms( $post->ID , $taxonomy );
						
							if ( !empty( $terms )) :
						?>
							<div class="section">
								<span class="section__heading"><span class="icon icon-folder-open"></span> Category:</span>
								<span class="section__body">
									<?php if ( !empty( $terms ) ) : foreach ( $terms as $term ) { if ( !is_wp_error( $link ) ) echo $term->name; } endif; ?>
								</span>
							</div>
						<?php endif; ?>

						<?php if (get_field('url')) : ?>
							<div class="section">
									<span class="section__heading"><span class="icon icon-link"></span> URL:</span>
									<span class="section__body"><a class="url_link" href="<?php the_field('url'); ?>" target="_blank"><?php the_field('url'); ?></a></span>
							</div>
						<?php endif; ?>
					
					</div>
				</div>
				<?php endif; ?>
				</article>
				<?php endwhile; ?>
			</div>
		

		<div class="modal">
			<div class="modal_window">
				<div class="modal_previous">
					<div class="icon icon-arrow-left"></div>
				</div>
				<img id="modal_img" src="" /> 
				<div class="modal_next">
					<div class="icon icon-arrow-right"></div>
				</div>
			</div>
		</div>
	</main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>