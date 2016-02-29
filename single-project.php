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

	<section class="page-content">
		
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		  	<img class="featured-image" src="<?php echo $featuredImage[0]; ?>" />
		<?php endif; ?>

		<div class="container">
			<div class="central_container"> 
				<article>
					<div class="left">
						<div class="project_title">
							<h2><?php the_title(); ?></h2> 
						</div>

						<?php //the_content(); ?>		

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


						<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>

						<?php if ( get_the_author_meta( 'description' ) ) : ?>
						<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
						<h3>About <?php echo get_the_author() ; ?></h3>
						<?php the_author_meta( 'description' ); ?>
						<?php endif; ?>

						<?php comments_template( '', true ); ?>
					</div>
					<div class="sidebar">
						<div>
							<a class="project_link" href="<?php the_field('url'); ?>" target="_blank">View Website</a> 

							<?php 
							$field = get_field_object('features');
							$value = $field['value'];
							$choices = $field['choices'];

							if( $value ): ?>
							<span class="heading">This website uses:</span>
							<ul class="features">
								<?php foreach( $value as $v ): ?>
								<li>
									<?php echo $choices[ $v ]; ?>
								</li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>

							<span class="heading">Category:</span>
							<p>category</p>

							<span class="heading">URL:</span>
							<a href="<?php the_field('url'); ?>" target="_blank"><?php the_field('url'); ?></a>

						</div>
					</div>

				</article>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>