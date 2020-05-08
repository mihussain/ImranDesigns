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
	<main class="blog">
		<div class="page-template">
			
			<div class="central_container"> 
				<div class="title"><h2>Blog</h2></div>
				<?php if ( have_posts() ): ?>
				
				<ol class="news">
				<?php while ( have_posts() ) : the_post(); ?>
					<li>
						<article>

						<script type="application/ld+json">
						{
							"@context": "http://schema.org",
							"@type": "Blog",
							"headline": "<?php the_title(); ?>",
							"abstract": "<?php echo strip_tags( get_the_excerpt() ); ?>",
							"datePublished": "<?php echo get_the_date('d-m-Y'); ?>",
							"dateModified": "<?php echo get_the_date('d-m-Y'); ?>",
							"author": {
								"@type": "Person",
								"name": "Imran"
							},
							"url": "<?php esc_url( the_permalink() ); ?>"
						}
						</script>

							<div class="article__content">
								<a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><h2><?php the_title(); ?></h2></a>
								
								<div class="post-content">
									<?php the_excerpt(); ?>
								</div>
								<div class="meta-container">
									<div class="post-meta">
										This blog post was created on the <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?></time> 
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
		</div>
	</main>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>