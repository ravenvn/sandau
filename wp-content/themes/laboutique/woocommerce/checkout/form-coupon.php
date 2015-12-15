<?php
/**
 * Checkout coupon form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if ( ! $woocommerce->cart->coupons_enabled() )
	return;

$info_message = apply_filters('woocommerce_checkout_coupon_message', __( 'Have a coupon?', 'woocommerce' ));
?>
<p class="woocommerce-info alert alert-info"><?php echo $info_message; ?> <a href="#" class="showcoupon"><?php _e( 'Click here to enter your code', 'woocommerce' ); ?></a></p>

<div class="row">
    <div class="span6 offset3">

        <form class="checkout_coupon" method="post" style="display:none">
            <div class="box">
                
                <div class="box-header">
                    <h3><?php _e( 'Coupon code', 'woocommerce' ); ?></h3>        
                </div>

                <div class="box-content">
                    
                    <div class="row-fluid">
                        <div class="span12">
                                <div class="control-group">
                                    <label for="coupon_code"><?php _e( 'Coupon code', 'woocommerce' ); ?><span class="required">*</span></label>
                                    <input type="text" name="coupon_code" class="input-text span12" placeholder="<?php _e( 'Coupon code', 'woocommerce' ); ?>" id="coupon_code" value="" />
                                </div>
                        </div>
                       

                    </div>

                

                
                </div>

                <div class="box-footer">
                    <input type="submit" class="button btn btn-primary" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />
                </div>
            </div>
        </form>
    </div>
    
</div>