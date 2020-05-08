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
	<main class="blog" role="main">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php $primaryImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'project-featured-retina' ); ?>


				<script type="application/ld+json">
				{
					"@context": "http://schema.org",
					"@type": "Article",
					"headline": "<?php the_title(); ?>",
					"image": "<?php echo $primaryImage[0]; ?>",
					"datePublished": "<?php echo get_the_date('d-m-Y'); ?>",
					"dateModified": "<?php echo get_the_date('d-m-Y'); ?>",
					"author": {
						"@type": "Person",
						"name": "Imran"
					},
					"publisher": {
						"@type": "Organization",
						"name": "<?php bloginfo( 'name' ); ?>",
						"logo": {
							"@type": "ImageObject",
							"url": "<?php echo get_template_directory_uri() ?>/images/imrandesigns_logo.svg"
						}
					},
					"mainEntityOfPage": {
						"@type": "WebPage",
						"@id": "<?php esc_url( the_permalink() ); ?>"
					}
				}
				</script>


				<div class="central_container"> 
					<div class="title">
						<h1><?php the_title(); ?></h1>
					</div>
					
					<div class="bar">
						<div class="breadcrumb">
							<a class="step" href="<?php echo bloginfo('url'); ?>"><span class="icon icon-home"></span></a><a class="step" href="<?php echo bloginfo('url'); ?>/blog">Blog</a><span class="current step"><?php the_title(); ?></span>
						</div>
					</div>

					<article>
						<div class="left" role="article">
							<?php the_content(); ?>

							
						</div>
						
						<div class="sidebar" role="complementary">
							<div class="details">
								<div class="section">
									<span class="section__author">
										<div class="meta">This blog post was created on the <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php echo get_the_date(); ?></time>.</div>
									</span>
								</div>

								<div class="section">
									<span class="section__heading"><span class="icon icon-list2"></span>Blog categories</span>
									<span class="section__body">
										<?php 
											$categories = get_categories();
											foreach($categories as $category) {
												echo '<div class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></div>';
											}
										?>
									</span>
								</div>

								<?php if (get_next_post()) : ?>
									<div class="section">
										<span class="section__heading"><span class="icon icon-arrow-right2"></span>Browse the next post</span>
										<span class="section__body">
											<?php next_post_link('%link', '%title'); ?>
										</span>
									</div>
								<?php endif; ?>

								<?php if (get_previous_post()) : ?>
									<div class="section">
										<span class="section__heading"><span class="icon icon-arrow-left2"></span>Browse the previous post</span>
										<span class="section__body">
											<?php previous_post_link('%link', '%title'); ?>
										</span>
									</div>
								<?php endif ?>

								<div class="section">
									<span class="section__heading"><span class="icon icon-share2"></span>Share:</span>
									<span class="section__body"><div class="addthis_inline_share_toolbox"></div></span>
								</div>	
							</span>
							</div>
						</div>					
					</article>
				</div>

			<?php endwhile; ?>

	</main>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>