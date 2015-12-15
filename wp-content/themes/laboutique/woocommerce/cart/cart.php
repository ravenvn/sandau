<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;


?>


<!-- Cart container -->
                <section class="cart">



                    <div class="container">
                        
                        <?php
                            wc_print_notices();
                        ?>
                        <div class="row">

                            <div class="span9">
                                
                                <!-- Cart -->
                                <div class="box">
                                    
                                    
                                    
                                     <?php do_action( 'woocommerce_before_cart' ); ?>
                                    <form action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post">
                                        
                                        <div class="box-header">
                                            <h3><?php echo __('Shopping cart', DOMAIN); ?></h3>
                                            <h5><?php echo sprintf(__('You currently have %s item(s) in your cart', DOMAIN),'<strong>'.$woocommerce->cart->cart_contents_count.'</strong>');?></h5>
                                        </div>

                                        <div class="box-content">
                                            <div class="cart-items">
                                                
                                                       

                                                        

                                                        <?php do_action( 'woocommerce_before_cart_table' ); ?>

                                                        <table class="shop_table cart styled-table" cellspacing="0">
                                                                <thead>
                                                                        <tr>
                                                                                
                                                                                <th class="product-thumbnail text-left"><?php _e( 'Product', 'woocommerce' ); ?></th>
                                                                                <th class="product-name text-left"></th>
                                                                                <th class="product-remove text-right">&nbsp;</th>
                                                                                <th class="product-price text-right"><?php _e( 'Price', 'woocommerce' ); ?></th>
                                                                                <th class="product-quantity text-right"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
                                                                                <th class="product-subtotal text-right"><?php _e( 'Total', 'woocommerce' ); ?></th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                                                                        <?php
                                                                        if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
                                                                                foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
                                                                                        $_product = $values['data'];
                                                                                        if ( $_product->exists() && $values['quantity'] > 0 ) {
                                                                                                ?>
                                                                                                <tr class = "<?php echo esc_attr( apply_filters('woocommerce_cart_table_item_class', 'cart_table_item', $values, $cart_item_key ) ); ?>">
                                                                                                        

                                                                                                        <!-- The thumbnail -->
                                                                                                        <td data-title="<?php _e( 'Thumbnail', 'woocommerce' ); ?>" class="text-left product-thumbnail">
                                                                                                            <div class="image ">
                                                                                                                <?php
                                                                                                                        $thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail', $_product->get_image(), $values, $cart_item_key );

                                                                                                                        if ( ! $_product->is_visible() || ( ! empty( $_product->variation_id ) && ! $_product->parent_is_visible() ) )
                                                                                                                                echo $thumbnail;
                                                                                                                        else
                                                                                                                                printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), $thumbnail );
                                                                                                                ?>
                                                                                                            </div>
                                                                                                        </td>

                                                                                                        <!-- Product Name -->
                                                                                                        <td data-title="<?php _e( 'Product', 'woocommerce' ); ?>" class="product-name text-left">
                                                                                                                <?php
                                                                                                                        if ( ! $_product->is_visible() || ( ! empty( $_product->variation_id ) && ! $_product->parent_is_visible() ) )
                                                                                                                                echo apply_filters( 'woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key );
                                                                                                                        else
                                                                                                                                printf('<h5><a href="%s">%s</a></h5>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), apply_filters('woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key ) );

                                                                                                                        // Meta data
                                                                                                                        echo $woocommerce->cart->get_item_data( $values );

                                                                                                        // Backorder notification
                                                                                                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $values['quantity'] ) )
                                                                                                                echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
                                                                                                                ?>
                                                                                                        </td>
                                                                                                        
                                                                                                        <!-- Remove from cart link -->
                                                                                                        <td data-title="<?php _e( 'Remove', 'woocommerce' ); ?>" class="product-remove text-right">
                                                                                                                <a href="<?php echo esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) )?>" title="__( 'Remove this item', 'woocommerce' )"><i class="icon-trash icon-large"></i></a>                                                                                                                
                                                                                                        </td>

                                                                                                        <!-- Product price -->
                                                                                                        <td data-title="<?php _e( 'Price', 'woocommerce' ); ?>" class="product-price text-right">
                                                                                                                <?php
                                                                                                                        $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

                                                                                                                        echo apply_filters('woocommerce_cart_item_price_html', woocommerce_price( $product_price ), $values, $cart_item_key );
                                                                                                                ?>
                                                                                                        </td>

                                                                                                        <!-- Quantity inputs -->
                                                                                                        <td data-title="<?php _e( 'Quantity', 'woocommerce' ); ?>" class="product-quantity text-right">
                                                                                                                <?php
                                                                                                                        if ( $_product->is_sold_individually() ) {
                                                                                                                                $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                                                                                                        } else {

                                                                                                                                $step	= apply_filters( 'woocommerce_quantity_input_step', '1', $_product );
                                                                                                                                $min 	= apply_filters( 'woocommerce_quantity_input_min', '', $_product );
                                                                                                                                $max 	= apply_filters( 'woocommerce_quantity_input_max', $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(), $_product );

                                                                                                                                $product_quantity = sprintf( '<div class="quantity"><input type="number" name="cart[%s][qty]" step="%s" min="%s" max="%s" value="%s" size="4" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="input-text qty text" maxlength="12" /></div>', $cart_item_key, $step, $min, $max, esc_attr( $values['quantity'] ) );
                                                                                                                        }

                                                                                                                        echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
                                                                                                                ?>
                                                                                                        </td>

                                                                                                        <!-- Product subtotal -->
                                                                                                        <td data-title="<?php _e( 'Total', 'woocommerce' ); ?>" class="product-subtotal text-right">
                                                                                                                <?php
                                                                                                                        echo apply_filters( 'woocommerce_cart_item_subtotal', $woocommerce->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $cart_item_key );
                                                                                                                ?>
                                                                                                        </td>
                                                                                                </tr>
                                                                                                <?php
                                                                                        }
                                                                                }
                                                                        }

                                                                        do_action( 'woocommerce_cart_contents' );
                                                                        ?>
                                                                        

                                                                        <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                                                                </tbody>
                                                        </table>

                                                        <?php do_action( 'woocommerce_after_cart_table' ); ?>

                                                        
                                                
                                            </div>
                                        </div>

                                        <div class="box-footer actions">
                                            

                

                                        <div class="pull-left">
	
                                            <input type="button" onclick="location.href='<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>';" class="btn" value="<?php echo esc_attr(__('Continue shopping', DOMAIN)); ?>" />
                                        </div>

                                        <div class="pull-right">
                                            
                                            <input type="submit" class="button btn  mm20" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" /> 
                                            <input type="submit" class="checkout-button button alt btn btn-primary  mm20" name="proceed" value="<?php _e( 'Proceed to Checkout', 'woocommerce' ); ?>" />
                                        </div>

				<?php do_action('woocommerce_proceed_to_checkout'); ?>

				<?php wp_nonce_field( 'woocommerce-cart' ) ?>
		

                                        </div>
                                    </form>			
                                </div>
                                <!-- End Cart -->

                                <?php woocommerce_shipping_calculator(); ?>
                                

                                
                                
                                
                            </div>

                            <div class="span3">
                                
                                
                                <!-- Cart details -->
                                <?php woocommerce_cart_totals();?>
                                
                                <!-- End class="cart-details" -->
                                
                                
                                
                                <?php if ( $woocommerce->cart->coupons_enabled() ) { ?>
                                <div class="coupon">
                                    <div class="box">
                                        <div class="hgroup title">
                                            <h3><?php _e( 'Coupon', 'woocommerce' ); ?></h3>
                                            <h5><?php echo __('Enter your coupon here to redeem', DOMAIN); ?></h5>
                                        </div>
                                        
                                        <form action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post">
                                        
                                   
                                           <label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> 
                                           <div class="input-append">
                                            <input name="coupon_code" class="input-text" type="text" id="coupon_code" value="" /> 
                                            <input type="submit" class="button btn" name="apply_coupon" value="<?php _e( 'Go', 'woocommerce' ); ?>" />

                                           </div>
                                           <?php do_action('woocommerce_cart_coupon'); ?>

                                   
                                        </form>
                                    </div>
                                </div>
                               <?php } ?>

                                
                                
                            </div>

                        </div>
                    </div>	
                </section>         
                <!-- End Cart container -->



<?php do_action( 'woocommerce_after_cart' ); ?>