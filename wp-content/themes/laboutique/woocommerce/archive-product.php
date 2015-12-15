<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


get_header('shop'); ?>

<?php
        /**
         * woocommerce_before_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
         * @hooked woocommerce_breadcrumb - 20
         */
        //do_action('woocommerce_before_main_content');
?>


    <section class="category">

        <div class="container">
            <div class="row">

                <?php if (theme_option('shop_sidebar')=='left' || !theme_option('shop_sidebar')){?>
                <div class="span3">

                    <!-- Sidebar -->
                    <?php dynamic_sidebar('sidebar-3'); ?>                                
                    <!-- End sidebar -->

                </div>
                <?php } ?>

                <div class="span9">

                   <div id="primary" class="content-area">
                        <div id="content" class="site-content" role="main">
                            
                            <?php if ( have_posts() ) : ?>
                            
                            
                            <ul class="post-list product-list" id="isotope_content">
                                <?php
                                        /**
                                         * woocommerce_before_shop_loop hook
                                         *
                                         * @hooked woocommerce_result_count - 20
                                         * @hooked woocommerce_catalog_ordering - 30
                                         */
                                        //do_action( 'woocommerce_before_shop_loop' );
                                ?>
                                <?php /* The loop */ ?>
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <li class="standard item <?php if (get_post_meta( get_the_ID(), 'featured_product', true )=='yes'){?> featured_product<?php } ?>">
                                        <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>            
                                        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                                    </li>
                                <?php endwhile; ?>
                                        
                                <?php
                                /**
                                 * woocommerce_after_shop_loop hook
                                 *
                                 * @hooked woocommerce_pagination - 10
                                 */
                                //do_action( 'woocommerce_after_shop_loop' );
                                ?>
                            </ul>
                            <?php laboutique_paging_nav(); ?>
                            
                        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                                <?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>

                        <?php endif; ?>

                        </div><!-- #content -->
                </div><!-- #primary -->

                </div>
                
                
                <?php if (theme_option('shop_sidebar')=='right'){?>
                <div class="span3">

                    <!-- Sidebar -->
                    <?php dynamic_sidebar('sidebar-3'); ?>                                
                    <!-- End sidebar -->

                </div>
                <?php } ?>


            </div>
        </div>

    </section>



		
			

	

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action('woocommerce_after_main_content');
	?>

	

<?php get_footer('shop'); ?>