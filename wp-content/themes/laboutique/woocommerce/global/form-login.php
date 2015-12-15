<?php
/**
 * Login form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( is_user_logged_in() ) 
	return;
?>
<form method="post" class="login" <?php if ( $hidden ) echo 'style="display:none;"'; ?>>
        <div class="row">
            <div class="span6 offset3">


                    <div class="box">

                        <div class="box-header">
                            <h3><?php _e( 'Login', 'woocommerce' ); ?></h3>        
                        </div>

                        <div class="box-content">





                                    <?php do_action( 'woocommerce_login_form_start' ); ?>

                                    <?php if ( $message ) echo wpautop( wptexturize( $message ) ); ?>

                            
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="control-group">
                                                <label class="control-label" for="login_email"><?php _e( 'Username or email', 'woocommerce' ); ?></label>
                                                <div class="controls">
                                                    <input type="text" class="input-text span12" name="username" id="username" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="span6">	
                                            <div class="control-group">					
                                                <label class="control-label" for="login_password"><?php _e( 'Password', 'woocommerce' ); ?></label>
                                                <div class="controls">
                                                    <input class="input-text span12" type="password" name="password" id="password" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                           
                                    <div class="row-fluid">
                                        <label for="rememberme" class="inline">
                                          <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
                                        </label>
                                    </div>
                                    




                        </div>

                        <div class="box-footer">
                            
                            <?php if (function_exists(('sc_render_login_form_social_connect'))){?>
                            <div class="pull-right">
                                <?php echo sc_render_login_form_social_connect(array(
                                    'display_label'=>false
                                ))?>
                            </div>
                            <?php } ?>
                            
                            <?php do_action( 'woocommerce_login_form' ); ?>


                               <?php wp_nonce_field( 'woocommerce-login' ); ?>
                               <input type="submit"  class="button btn btn-primary" name="login" value="<?php _e( 'Login', 'woocommerce' ); ?>" />
                               <input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ) ?>" />


                               <input type="button" class="button btn" onclick="location.href='<?php echo esc_url( wc_lostpassword_url() ); ?>';" value="<?php _e( 'Lost your password?', 'woocommerce' ); ?>" />





                           <?php do_action( 'woocommerce_login_form_end' ); ?>

                            
                            
                        </div>
                    </div>

            </div>

        </div>
                    
</form>