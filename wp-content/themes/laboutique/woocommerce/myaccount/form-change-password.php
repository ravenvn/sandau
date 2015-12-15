<?php
/**
 * Change password form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>


 <!-- Reset password -->
    <section class="reset_password">


        <div class="container">
            
            
            <div class="row">
                <div class="span6 offset3">
                    <?php wc_print_notices(); ?>
                    
                    <form action="<?php echo esc_url( get_permalink(woocommerce_get_page_id('change_password')) ); ?>" method="post">

                        <div class="box">
                            <div class="hgroup title">
                                <h3><?php echo __( 'Change Password', 'woocommerce' ); ?></h3>
                                
                                <h5><?php echo _e('Need to change your password? Don\'t worry, it\'s easy! Just fill out the form below.', DOMAIN ) ?></h5>
                                
                            </div>

                            <div class="box-content">
                                

                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="control-group">
                                            <label class="control-label" for="email"><?php _e( 'New password', 'woocommerce' ); ?></label>
                                            <div class="controls">                                                                                                                
                                                <input type="password" class="input-text span12" name="password_1" id="password_1" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="span6">
                                        <div class="control-group">
                                            <label class="control-label" for="email"><?php _e( 'Re-enter new password', 'woocommerce' ); ?></label>
                                            <div class="controls">                                                                                                                
                                                <input type="password" class="input-text span12" name="password_2" id="password_2" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                
                                
                                
                            </div>

                            <div class="buttons">
                                <?php wp_nonce_field('woocommerce-change_password')?>
                                <input type="hidden" name="action" value="change_password" />
                                <button class="btn btn-primary btn-small" type="submit" name="change_password" value="<?php echo __( 'Save', 'woocommerce' ); ?>">
                                    <?php echo __( 'Save', 'woocommerce' ); ?>
                                </button>                                            
                            </div>
                        </div>
                    </form>		
                </div>
            </div>
        </div>	
    </section>                
    <!-- End Reset password -->
