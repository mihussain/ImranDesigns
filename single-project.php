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
			<div class="featured_image_container">
				<?php $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-image' ); ?>
				<?php $landscapeImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'landscape-image' ); ?>
		  		<span class="gradient"></span>
		  		
		  		<picture>
				    <source srcset="<?php echo $landscapeImage[0]; ?>" media="(max width: 1023px)">
				    <source srcset="<?php echo $featuredImage[0]; ?>" media="(min-width: 1024px)">
				    <img class="featured-image" src="<?php echo $landscapeImage[0]; ?>" alt="My default image">
				</picture>
		  		<!-- <img class="featured-image" src="<?php// echo $featuredImage[0]; ?>" /> -->
		  	</div>
		<?php endif; ?>

		<div class="container">
			<div class="central_container"> 
				<article>
					<div class="left">
						
							<img class="post-image" src="<?php echo $landscapeImage[0]; ?>" alt="My default image">
						
							<?php echo $LandscapeImage[0]; ?>
						<div class="copy">
							<div class="project_title">
								<div class="breadcrumb"><a href="<?php echo bloginfo('url'); ?>">Home</a> / <a href="<?php echo bloginfo('url'); ?>/portfolio">Portfolio</a> /</div>
								<h2><?php the_title(); ?></h2> 
							</div>

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


							<!--<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>-->

							<?php if ( get_the_author_meta( 'description' ) ) : ?>
							<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
							<h3>About <?php echo get_the_author() ; ?></h3>
							<?php the_author_meta( 'description' ); ?>
							<?php endif; ?>

							<?php comments_template( '', true ); ?>
						</div>
					</div>
					<div class="sidebar">
						<a class="project_link" href="<?php the_field('url'); ?>" target="_blank">View Website</a> 

						<div class="details">
							<?php 
							$field = get_field_object('features');
							$value = $field['value'];
							$choices = $field['choices'];

							if( $value ): ?>
							<div class="section">
								<span class="section__heading">This website uses:</span>
								<span class="section__body">
									<ul class="features">
										<?php foreach( $value as $v ): ?>
										<li>
											<?php echo $choices[ $v ]; ?>
										</li>
										<?php endforeach; ?>
									</ul>
									<?php endif; ?>
								</span>
							</div>

							<div class="section">
								<span class="section__heading">Category:</span>
								<span class="section__body">
									<?php 
										$taxonomy = 'project_type';
										$terms = get_the_terms( $post->ID , $taxonomy );
						
										if ( !empty( $terms ) ) : foreach ( $terms as $term ) { if ( !is_wp_error( $link ) ) echo $term->name; } endif; 
									?>
								</span>
							</div>

							<div class="section">
								<?php if (get_field('url')) : ?>
									<span class="section__heading">URL:</span>
									<span class="section__body"><a class="url_link" href="<?php the_field('url'); ?>" target="_blank"><?php the_field('url'); ?></a></span>
								<?php endif; ?>
							</div>

							<div class="section">
								<span class="section__heading">Share:</span>
								<span class="section__body">
									<div class="social-meta">
										<span class="facebook facebookButton"></span>
										<a class="twitter_pop_up twitter" href="http://twitter.com/share"><span class="twitter"></span></a>
									</div>
								</span>
							</div>
						</div>
					</div>
				</article>
				<?php endwhile; ?>
			</div>
		</div>
		<div class="modal">
			<div class="modal_window">
				<img id="modal_img" src="" /> 
			</div>
		</div>
</section>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>