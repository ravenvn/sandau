<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage La_Boutique
 * @since La Boutique 1.1
 */
if (DEBUG_INFO) {
	echo "\n<!-- FILE: /index.php ================================================================= -->\n";
}
get_header(); ?>
<?php if ( have_posts() ) : ?>
<div class="container">
    <div class="row-fluid">
        <div class="span9">
            <div id="primary" class="content-area index">
                    <div id="content" class="site-content" role="main">

                    
                        <section class="post-list" >                        
                            <?php /* The loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <article class="post post-grid item">
                                    <?php get_template_part( 'content', get_post_format() ); ?>
                                </article>
                            <?php endwhile; ?>
                            
                        </section>
                        <?php laboutique_paging_nav(); ?>              

                    </div><!-- #content -->
            </div><!-- #primary -->
        </div>
        <div class="span3">            
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php else : ?>
        <?php get_template_part( '404' ); ?>
<?php endif; ?>            
<?php get_footer(); ?>