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
	<section class="page-content">
		<div class="central_container"> 
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<article>

				<h2><?php the_title(); ?></h2>
				<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
				<?php the_content(); ?>		

				<a href="<?php the_field('url'); ?>" target="_blank">View Project</a> 	

				<?php
				if( have_rows('images') ):

				    while ( have_rows('images') ) : the_row(); 

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
				<?php
				    endwhile;

				else :
				    // no rows found
				endif;
				?>

				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
				<h3>About <?php echo get_the_author() ; ?></h3>
				<?php the_author_meta( 'description' ); ?>
				<?php endif; ?>

				<?php comments_template( '', true ); ?>

			</article>
			<?php endwhile; ?>
		</div>
	</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>