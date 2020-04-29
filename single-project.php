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
			
			<?php if (get_field('url')) : ?>
				<a class="project_link" href="<?php the_field('url'); ?>" target="_blank">View Website</a> 
			<?php endif; ?>
		</div>
			<article>
				<div class="left" role="article">
				
					
						
						<?php
						    // split content into array
						    $content = split_content();
						    // output first content section in column1
						    echo '<div id="column1" class="fade">', array_shift($content), '</div>';
						?>						

						<?php
							if( have_rows('images') ): ?>

								<?php 
									$img_counter = 0; 
									$isLimited = false;
									$limted = '';
								?>

								<?php while ( have_rows('images') ) : the_row(); 

								$image = get_sub_field('image');
									if( !empty($image) ): 
										$img_counter ++;
									endif;
								endwhile; ?>

								<?php 
									if( $img_counter > 15) {
										$isLimited = true;
										$limited = ' limited';
									} 
								?>

								<div class="image_section fade <?php echo $limited ?>">

							    <?php while ( have_rows('images') ) : the_row(); 

									$image = get_sub_field('image');
									if( !empty($image) ): 

										// vars
										$url = $image['url'];
										$title = $image['title'];
										$alt = $image['alt'];
										//$caption = $image['caption'];

										// thumbnail
										$size = 'thumbnail';
										$thumb = $image['sizes'][ $size ];
										$width = $image['sizes'][ $size . '-width' ];
										$height = $image['sizes'][ $size . '-height' ];

										if( $caption ): ?>
											<div class="wp-caption">
										<?php endif; ?>

										<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
											<img class="lazy" data-src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
											<noscript><img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" /></noscript>
										</a>

										<?php if( $caption ): ?>
												<p class="wp-caption-text"><?php echo $caption; ?></p>
											</div>
										<?php endif; ?>
									<?php endif; ?>
								<?php endwhile; ?>

								<?php 
									if($isLimited) {
										$hidden_images = $img_counter - 10;
										echo '<span class="show_more">Show remaining images <span class="remaining_images">' . $hidden_images . '</span></span>';
									}
								?>

									<span class="show_less">Hide images</span>

								</div>

							<?php else :
							    // no rows found
							endif;
						?>

						<?php
							// output remaining content sections in column2
						    echo '<div id="column2" class="fade">', implode($content), '</div>';
						?>


						<?php 
						// aligned content (if set)

							// check if the repeater field has rows of data
							if( have_rows('aligned_image_text') ):

								// loop through the rows of data
							while ( have_rows('aligned_image_text') ) : the_row();

								$alignment_image = get_sub_field('alignment_image');
								$image_url = esc_url($alignment_image['url']);
								$image_alt = esc_attr($alignment_image['alt']);
								$image_caption = esc_html($alignment_image['caption']);


								?>

								<div class="split_content fade <?php the_sub_field('image_alignment_options'); ?> <?php the_sub_field('vertical_alignment'); ?>">
									<?php if (!empty($alignment_image)): ?>
										<div class="image wp-caption">
											<img class="lazy" data-src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" />
											<noscript><img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" /></noscript>
											<p class="wp-caption-text"><?php echo $image_caption; ?></p>
										</div>
									<?php endif ?>

									<div class="content <?php the_sub_field('text_alignment_options'); ?>">
										<?php the_sub_field('text'); ?>
									</div>
								</div>
								<?php 

							endwhile;

							else :

							// no rows found

							endif;

						?>
		
					</div>

				<?php 
				$field = get_field_object('features');
				$value = $field['value'];
				$choices = $field['choices'];
				
				if ( !empty($value) || !empty($terms) || get_field('url')) : ?>
				<div class="sidebar" role="complementary">
					
					<div class="details">
						<?php 

						if( $value ): ?>
							<div class="section">
								<span class="section__heading"><span class="icon icon-stack"></span> This project uses:</span>
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