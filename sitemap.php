<?php
/**
 * Template Name: Sitemap Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package     WordPress
 * @subpackage  Starkers
 * @since       Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

    <main id="content" class="sitemap" role="main">
		<div class="page-template">
			<div class="central_container"> 

                <div class="title"><h2>Sitemap</h2></div>

                <ul class="sitemap">
                    <li><a href="<?php echo home_url() ?>">Home</a></li>
                    <li><a href="<?php echo site_url('/blog/') ?>">Blog</a>
                        <ul>
                            <?php $archive_query = new WP_Query('showposts=1000&cat=-8');  
                                while ($archive_query->have_posts()) : $archive_query->the_post(); ?>  
                                    <li>  
                                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>  
                                        (<?php comments_number('0', '1', '%'); ?>)  
                                    </li>  
                            <?php endwhile; ?>  
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('/portfolio/') ?>">Portfolio</a>
                        <ul>
                            <?php $portfolio = new WP_Query(array(
                                'post_type' => 'project'
                            )); ?>

                            <?php while($portfolio->have_posts()) : $portfolio->the_post(); ?>
                                <?php 
                                    $taxonomy = 'project_type';
                                    $terms = get_the_terms( $post->ID , $taxonomy );
                                ?>
                                
                                    <div class="project mix <?php if ( !empty( $terms ) ) : foreach ( $terms as $term ) { if ( !is_wp_error( $link ) ) echo $term->slug; } endif;  ?>">
                                        <div class="project-wrapper">
                                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                                
                                                <?php $thumbImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'portfolio-thumb' ); ?>
                                                
                                                <li>
                                                    <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
                                
                                                                    <div class="label-title"><?php the_title(); ?></div>
                                                                    
                                                    </a>
                                                </li>
                                                
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('/contact/') ?>">Contact</a></li>
                </ul>
            </div>
        </div>
    </main>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>