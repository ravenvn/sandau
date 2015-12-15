<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage La_Boutique
 * @since La Boutique 1.1
 */
if (DEBUG_INFO) {
	echo "\n<!-- FILE: /single.php ================================================================= -->\n";
}
get_header(); ?>

            <!-- Blog post -->
            <section class="blog_post">


                <div class="container">
                    <div class="row">

                        <div class="span9">
                            
                            
                            <?php /* The loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>

                                    <?php get_template_part( 'content', get_post_format() ); ?>                                                                                                                   
                            <?php endwhile; ?>
                            
                            <?php comments_template(); ?>                                                       
                        </div>

                        <div class="span3">   
                            <?php get_sidebar(); ?>                            
                        </div>

                    </div>
                </div>
            </section>                
            <!-- End class="blog_post" -->

        </section>
        <!-- End class="main" -->

<?php get_footer(); ?>