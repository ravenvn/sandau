<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


?>

<section class="cart-empty">


        <div class="container">
            <?php
            
                wc_print_notices();    
                
            ?>
            
            <div class="row">
                <div class="span6 offset3">

                    
                    

                        <div class="box">
                            <div class="hgroup title">
                                <h3><?php echo __('Shopping cart', DOMAIN); ?></h3>
                                
                               
                                
                            </div>

                            <div class="box-content">
                                

                                <p class="cart-empty"><?php _e( 'Your cart is currently empty.', 'woocommerce' ) ?></p>

                                <?php do_action( 'woocommerce_cart_is_empty' ); ?>

                                
                                
                                
                                
                            </div>

                            <div class="buttons">
                                <a class="button btn  btn-small" href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e( 'Return To Shop', 'woocommerce' ) ?></a>
                                                                    
                            </div>
                        </div>
                    	
                </div>
            </div>
        </div>	
    </section>                
    <!-- End Reset password -->

    


<?php do_action('woocommerce_cart_is_empty'); ?>

