<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header('shop'); ?>
<!-- Product content -->
<section class="product">


    <!-- Product info -->
    <section class="product-info">
        <div class="container">
            
            <?php while ( have_posts() ) : the_post(); ?>
                <?php woocommerce_get_template_part( 'content', 'single-product' ); ?>
                    
            <?php endwhile; // end of the loop. ?>
        </div>
    </section>
    <!-- End class="product-info" -->

    <?php if (!theme_option('shop_disable_facebook_comments')){?>
    <!-- Product Reviews -->
    <section class="product-reviews">
        <div class="container">
            <div class="span8 offset2">
                <h5><?php echo sprintf(__('Tell us why you %s this product', DOMAIN),'<span class="script">love&#10084;</span>');?></h5>
                

                <!-- Facebook comments -->
                <div id="fb-root"></div>
                <script>                            
                    (function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=460821237293986";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>

                <div class="fb-comments" data-width="730" data-href="<?php the_permalink() ?>" data-num-posts="10"></div>
                <!-- End Facebook comments -->

            </div>
        </div>		
    </section>
    <!-- End class="product-reviews" -->
    <?php } ?>

    <!-- Related products -->
    <section class="product-related">
        <div class="container">
            <div class="span12">

                
                <?php // woocommerce_output_related_products(); ?>
                <?php woocommerce_upsell_display(); ?>
                
                
            </div>
        </div>	
    </section>                    
    <!-- End class="products-related" -->
</section>           

<?php get_footer('shop'); ?>