<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
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
				<?php if ( have_posts() ): ?>
				
				<ol class="news">
				<?php while ( have_posts() ) : the_post(); ?>
					<li>
						<article>
							<?php if (has_post_thumbnail( $post->ID ) ): ?>
								<?php $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-thumb' ); ?>
								<?php $landscapeImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'landscape-image' ); ?>
								<div class="article__thumbnail">
							  		
									<picture>
									    <source srcset="<?php echo $landscapeImage[0]; ?>" media="(max width: 479px)">
									    <source srcset="<?php echo $featuredImage[0]; ?>" media="(min-width: 480px)">
									    <img class="post-featured-image" src="<?php echo $landscapeImage[0]; ?>" alt="My default image">
									</picture>
								</div>
							<?php endif; ?>
							<div class="article__content">
								<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><h3><?php the_title(); ?></h3></a>
								
								<div class="post-content">
									<?php the_excerpt(); ?>
								</div>
								<div class="meta-container">
									<div class="post-meta">
										This blog post was created on the <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> at <?php the_time(); ?></time> 
									</div>
								</div>
							</div>
						</article>
					</li>
				<?php endwhile; ?>
				</ol>
				<?php else: ?>
				<h2>No posts to display</h2>
				<?php endif; ?>
			</div>
			<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>
		</div>
	</section>