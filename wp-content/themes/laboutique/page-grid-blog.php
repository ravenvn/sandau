<?php
/*
Template Name: Grid blog
*/
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage La_Boutique
 * @since La Boutique 1.1
 */
if (DEBUG_INFO) {
	echo "\n<!-- FILE: /page-grid-blog.php ================================================================= -->\n";
}
?>
<?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
         
          wp_reset_postdata();

        endwhile;
    endif;

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'cat'=>-1,        
        'post_type' => 'post',
        'paged' => $paged
    );

    $list_of_posts = new WP_Query( $args );
    
    get_header();
?>
<div class="container">
    <div class="row-fluid">
        <div class="span9">
            <div id="primary" class="content-area">
                    <div id="content" class="site-content" role="main">

                    <?php if ( $list_of_posts->have_posts() ) : ?>
                        <section class="post-list" id="isotope_content">
                       
                        
                            <?php /* The loop */ ?>
                            <?php while ( $list_of_posts->have_posts() ) : $list_of_posts->the_post(); ?>
                                <article class="post post-grid item">
                                    <?php get_template_part( 'content', get_post_format() ); ?>
                                </article>
                            <?php endwhile; ?>
                            
                        </section>
                        <?php laboutique_paging_nav(); ?>
                    <?php else : ?>
                            <?php get_template_part( 'content', 'none' ); ?>
                    <?php endif; ?>

                    </div><!-- #content -->
            </div><!-- #primary -->
        </div>
        <div class="span3">            
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
            
<?php get_footer(); ?>