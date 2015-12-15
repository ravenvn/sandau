<?php
/**
 * Edit address form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $current_user;

get_currentuserinfo();
?>
<?php if (!$load_address) : ?>

	<?php woocommerce_get_template('myaccount/my-address.php'); ?>

<?php else : ?>

    
        <!-- Edit address -->
        <section class="edit_address">


            <div class="container">


                <div class="row">
                    <div class="span6 offset3">
                        <?php wc_print_notices(); ?>

                        <form method="post">

                            <div class="box">
                                <div class="hgroup title">
                                    <h3><?php if ($load_address=='billing') _e( 'Billing Address', 'woocommerce' ); else _e( 'Shipping Address', 'woocommerce' ); ?></h3>
                                    
                                </div>

                                <div class="box-content">


                                    <div class="row-fluid">

                                    <?php
                                        
                                        $cnt=0;
                                        
                                    foreach ($address as $key => $field) :
                                            $value = (isset($_POST[$key])) ? $_POST[$key] : get_user_meta( get_current_user_id(), $key, true );
                                    
                                            //$field['class'][]='span12';
                                            $field['label_class'][]='control-label';
                                            
                                    
                                            // Default values
                                            if (!$value && ($key=='billing_email' || $key=='shipping_email')) $value = $current_user->user_email;
                                            if (!$value && ($key=='billing_country' || $key=='shipping_country')) $value = $woocommerce->countries->get_base_country();
                                            if (!$value && ($key=='billing_state' || $key=='shipping_state')) $value = $woocommerce->countries->get_base_state();
                                            
                                            if ($key=='billing_address_2' || $key=='shipping_address_2')
                                                $field['label']=$field['placeholder'];

                                            echo '
                                            <div class="span6">';
                                                 
                                            woocommerce_form_field( $key, $field, $value );
                                            
                                                echo '</div>';
                                            
                                            if (!(($cnt+1)%2)){
                                                echo '</div><div class="row-fluid">';
                                            }
                                              
                                            $cnt++;
                                                
                                    endforeach;
                                    ?>

                                    </div>



                                </div>

                                <div class="buttons">
                                    <?php wp_nonce_field('woocommerce-edit_address') ?>
                                    <button class="btn btn-primary btn-small" type="submit" name="edit_address" value="<?php echo __( 'Save Address', 'woocommerce' ); ?>">
                                        <?php echo __( 'Save Address', 'woocommerce' ); ?>
                                    </button>                                            
                                    
                                    <input type="hidden" name="action" value="edit_address" />
                                </div>
                            </div>
                        </form>		
                    </div>
                </div>
            </div>	
        </section>                
        <!-- End Edit address -->

	

<?php endif; ?>