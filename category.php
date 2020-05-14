<?php
/**
 * The template for displaying Category Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
	<main class="blog blog-category">
		<div class="page-template">
			
			<div class="central_container"> 
			<div class="title"><h2><?php echo single_cat_title( '', false ); ?> Category Index</h2></div>
				<?php if ( have_posts() ): ?>

				<div class="bar">
					<div class="breadcrumb">
						<a class="step" href="<?php echo bloginfo('url'); ?>"><span class="icon icon-home"></span></a><a class="step" href="<?php echo bloginfo('url'); ?>/blog">Blog</a><span class="current step"><?php echo single_cat_title( '', false ); ?></span>
					</div>
				</div>


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
				<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
				<?php endif; ?>
			</div>
		</div>
	</main>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>