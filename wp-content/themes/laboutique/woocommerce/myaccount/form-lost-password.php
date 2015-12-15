<?php
/**
 * Lost password form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $post;

?>

    <!-- Reset password -->
    <section class="reset_password">


        <div class="container">
            
            
            <div class="row">
                <div class="span6 offset3">
                    <?php wc_print_notices(); ?>
                                        
                    <form method="post" class="lost_reset_password">

                        <div class="box">
                            <div class="hgroup title">
                                <h3><?php echo __( 'Reset Password', 'woocommerce' ); ?></h3>
                                <?php if( 'lost_password' == $args['form'] ) : ?>
                                <h5><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></h5>
                                <?php else : ?>
                                <h5><?php echo apply_filters( 'woocommerce_reset_password_message', __( 'Enter a new password below.', 'woocommerce') ); ?></h5>
                                <?php endif; ?>
                            </div>

                            <div class="box-content">
                                
                                
                                <?php if( 'lost_password' == $args['form'] ) : ?>
                                                              
                                
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <div class="control-group">
                                                    <label class="control-label" for="email"><?php _e( 'Username or email', 'woocommerce' ); ?></label>
                                                    <div class="controls">                                                        
                                                        
                                                        <input class="input-text span12" type="text" name="user_login" id="user_login" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php else : ?>
                                
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
                          

                                        <input type="hidden" name="reset_key" value="<?php echo isset( $args['key'] ) ? $args['key'] : ''; ?>" />
                                        <input type="hidden" name="reset_login" value="<?php echo isset( $args['login'] ) ? $args['login'] : ''; ?>" />
                                <?php endif; ?>
                                
                                
                                
                                
                            </div>

                            <div class="buttons">                                    
                                <input type="submit" class="button btn btn-primary btn-small" name="wc_reset_password" value="<?php echo 'lost_password' == $args['form'] ? __( 'Reset Password', 'woocommerce' ) : __( 'Save', 'woocommerce' ); ?>" />
                                <?php wp_nonce_field( $args['form'] ); ?>
                            </div>
                        </div>
                    </form>		
                </div>
            </div>
        </div>	
    </section>                
    <!-- End Reset password -->

