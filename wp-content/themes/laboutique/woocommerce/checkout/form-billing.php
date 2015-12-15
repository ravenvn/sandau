<?php
/**
 * Checkout billing information form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
$cnt=0;
?>
<div class="box">
    <div class="box-header">
       <?php if ( WC()->cart->ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

	<h3><?php _e( 'Billing &amp; Shipping', 'woocommerce' ); ?></h3>

        <?php else : ?>

                <h3><?php _e( 'Billing Address', 'woocommerce' ); ?></h3>

        <?php endif; ?>
       
   </div>

   <div class="box-content">


<?php do_action('woocommerce_before_checkout_billing_form', $checkout ); ?>
       <div class="row-fluid">
<?php foreach ($checkout->checkout_fields['billing'] as $key => $field) : ?>

	
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
                </div>
            ';    
            ?>
        <?php
            if (!(($cnt+1)%2)){
                echo '</div><div class="row-fluid">';
            }


            $cnt++;
        ?>

<?php endforeach; ?>
       </div>

<?php do_action('woocommerce_after_checkout_billing_form', $checkout ); ?>



<?php if ( ! is_user_logged_in() && $checkout->enable_signup ) : ?>

	<?php if ( $checkout->enable_guest_checkout ) : ?>

		<p class="form-row form-row-wide">
			 <label for="createaccount" class="checkbox"><input class="input-checkbox" id="createaccount" <?php checked($checkout->get_value('createaccount'), true) ?> type="checkbox" name="createaccount" value="1" /> <?php _e( 'Create an account?', 'woocommerce' ); ?></label>
		</p>

	<?php endif; ?>

	<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

	<div class="create-account">

		<p><?php _e( 'Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'woocommerce' ); ?></p>

                <div class="row-fluid"> 
                    <?php 
                        $cnt=0;
                    ?>
		<?php foreach ($checkout->checkout_fields['account'] as $key => $field) : ?>

                        <?php
                            
                            $field['label_class']=array();
                            
                             if (!$field['label'] && $field['placeholder'])
                                $field['label']=$field['placeholder'];
                            
                             
                            echo '
                            <div class="span6">
                                <div class="control-group">';
                        ?>
			<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

                        <?php 
                        
                                echo '</div>
                            </div>
                        ';    
                        ?>
                    <?php
                        if (!(($cnt+1)%2)){
                            echo '</div><div class="row-fluid">';
                        }
                        
                        
                        $cnt++;
                    ?>
		<?php endforeach; ?>
                 </div>
		<div class="clear"></div>

	</div>

	<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>

<?php endif; ?>
   </div>
</div>