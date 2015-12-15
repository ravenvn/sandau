<?php
/**
 * Shipping Calculator
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.8
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if ( get_option('woocommerce_enable_shipping_calc')=='no' || ! $woocommerce->cart->needs_shipping() )
	return;
?>

<?php do_action( 'woocommerce_before_shipping_calculator' ); ?>

<!-- Shipping estimator -->
<div class="box">
    <form class="shipping_calculator" action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post">

        <div class="box-header">
            <h3><?php _e( 'Calculate Shipping', 'woocommerce' ); ?></h3>
            <h5><?php echo __('Get an estimated shipping cost for your order', DOMAIN); ?></h5>
        </div>

        <div class="box-content">
            <div class="row-fluid">

                <div class="span4">
                    <label for="country"><?php echo __('Country', DOMAIN); ?></label>
              
                    <select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state span12" rel="calc_shipping_state">
                            <option value=""><?php _e( 'Select a country&hellip;', 'woocommerce' ); ?></option>
                            <?php
                                    foreach( $woocommerce->countries->get_allowed_countries() as $key => $value )
                                            echo '<option value="' . esc_attr( $key ) . '"' . selected( $woocommerce->customer->get_shipping_country(), esc_attr( $key ), false ) . '>' . esc_html( $value ) . '</option>';
                            ?>
                    </select>
                </div>

                <div class="span4">
                    <label for="state"><?php echo __('State', DOMAIN); ?></label>
                    <div id="shipping_states">
                       
                        
          
			<?php
				$current_cc = $woocommerce->customer->get_shipping_country();
				$current_r  = $woocommerce->customer->get_shipping_state();
				$states     = $woocommerce->countries->get_states( $current_cc );

				// Hidden Input
				if ( is_array( $states ) && empty( $states ) ) {

					?><input type="hidden" name="calc_shipping_state" id="calc_shipping_state span12" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>" /><?php

				// Dropdown Input
				} elseif ( is_array( $states ) ) {

					?>
						<select name="calc_shipping_state" id="calc_shipping_state" class="span12" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>">
							<option value=""><?php _e( 'Select a state&hellip;', 'woocommerce' ); ?></option>
							<?php
								foreach ( $states as $ckey => $cvalue )
									echo '<option value="' . esc_attr( $ckey ) . '" ' . selected( $current_r, $ckey, false ) . '>' . __( esc_html( $cvalue ), 'woocommerce' ) .'</option>';
							?>
						</select>
					<?php

				// Standard Input
				} else {

					?><input type="text" class="input-text span12" value="<?php echo esc_attr( $current_r ); ?>" placeholder="<?php _e( 'State / county', 'woocommerce' ); ?>" name="calc_shipping_state" id="calc_shipping_state" /><?php

				}
			?>
		
                    </div>
                </div>
                
                
		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_city', false ) ) : ?>
                        <div class="span4">
                            <label><?php _e( 'City', 'woocommerce' ); ?></label>
                            <input type="text" class="input-text span12" value="<?php echo esc_attr( $woocommerce->customer->get_shipping_city() ); ?>" placeholder="" name="calc_shipping_city" id="calc_shipping_city" />
                        </div>

			

		<?php endif; ?>

		<?php if ( apply_filters( 'woocommerce_shipping_calculator_enable_postcode', true ) ) : ?>
                        <div class="span4">
                            <label><?php _e( 'Postcode / Zip', 'woocommerce' ); ?></label>
                            <input type="text" class="input-text span12" value="<?php echo esc_attr( $woocommerce->customer->get_shipping_postcode() ); ?>" placeholder="" name="calc_shipping_postcode" id="calc_shipping_postcode" />
                        </div>


		<?php endif; ?>

                

            </div>
        </div>

        <div class="box-footer">
            
            <button type="submit" name="calc_shipping" value="1" class="button btn "><?php _e( 'Update Totals', 'woocommerce' ); ?></button>
            <?php wp_nonce_field( 'woocommerce-cart' ) ?>
        </div>
    </form>
</div>                                
<!-- End Shipping estimator -->




<?php do_action( 'woocommerce_after_shipping_calculator' ); ?>