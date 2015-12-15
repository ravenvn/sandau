<?php
/**
 * Checkout shipping information form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


?>

<?php if ( WC()->cart->needs_shipping() && ! WC()->cart->ship_to_billing_address_only() ) { ?>
<div class="box">
    <div class="box-header">
        
        
        <?php
		if ( empty( $_POST ) ) {

			$ship_to_different_address = get_option( 'woocommerce_ship_to_billing' ) == 'no' ? 1 : 0;
			$ship_to_different_address = apply_filters( 'woocommerce_ship_to_different_address_checked', $ship_to_different_address );

		} else {

			$ship_to_different_address = $checkout->get_value( 'ship_to_different_address' );

		}
	?>

	<span id="ship-to-different-address">
		<label for="ship-to-different-address-checkbox" class="checkbox"><?php _e( 'Ship to a different address?', 'woocommerce' ); ?></label>
		<input id="ship-to-different-address-checkbox" class="input-checkbox" <?php checked( $ship_to_different_address, 1 ); ?> type="checkbox" name="ship_to_different_address" value="1" />
	</span>
        
        <h3><?php _e( 'Shipping Address', 'woocommerce' ); ?></h3>
    </div>
    <div class="box-content">
	

	<div class="shipping_address">

		<?php do_action( 'woocommerce_before_checkout_shipping_form', $checkout ); ?>
                <?php
                    $cnt=0;
                ?>
                <div class="row-fluid">
		<?php foreach ( $checkout->checkout_fields['shipping'] as $key => $field ) { ?>

			<?php
                            $field['label_class']=array();

                                    if (!isset($field['label']) && $field['placeholder'])
                                       $field['label']=$field['placeholder'];


                                   echo '
                                   <div class="span6">
                                       <div class="control-group">';
                               ?>
                               <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

                               <?php 
                                       echo '</div>
                                   </div>';    
                               ?>
                           <?php
                               if (!(($cnt+1)%2)){
                                   echo '</div><div class="row-fluid">';
                               }


                               $cnt++;
                           ?>

		<?php } ?>
                </div>
		<?php do_action( 'woocommerce_after_checkout_shipping_form', $checkout ); ?>

	</div>
    </div>    
</div>  
<?php } ?>

<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', get_option( 'woocommerce_enable_order_comments', 'yes' ) === 'yes' ) ) { ?>

<div class="box">
    <div class="box-header">
        <h3><?php _e( 'Additional Information', 'woocommerce' ); ?></h3>
    </div>
    <div class="box-content">
            
                <div class="row-fluid">
                <?php foreach ( $checkout->checkout_fields['order'] as $key => $field ) { ?>


                        <?php

                                $field['label_class']=array();

                                 if (!isset($field['label']) && $field['placeholder'])
                                    $field['label']=$field['placeholder'];


                                echo '<div class="control-group">';
                            ?>
                            <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

                            <?php 
                                    echo '</div>
                        ';    
                            ?>
                       

                <?php } ?>
            </div>
      </div>
</div>
<?php } ?>

<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
                
     
            