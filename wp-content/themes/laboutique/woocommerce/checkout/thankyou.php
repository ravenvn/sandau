<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<!-- Static page 1 -->
<section class="static_page_1">


    <div class="container">
        <div class="row">
            <div class="span12">
                <section class="static-page">
                    <div class="row-fluid">
                        <?php if (!trim(theme_option('staticpages_sidebar'))){?>
                            <div class="span3 visible-desktop hidden-phone hidden-table">
                                <?php if (is_user_logged_in()){?>
                                    <?php laboutique_my_account_sidebar_nav(array(
                                        'class'=>'nav nav-tabs nav-stacked',
                                    ))?>
                                <?php } else {?>
                               <?php wp_nav_menu( array(
                                   'theme_location'=>'pages_sidebar',
                                   'menu_class'=>'nav nav-tabs nav-stacked',
                                   'fallback_cb'=>'false'

                               ));?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <div class="<?php if (!trim(theme_option('staticpages_sidebar'))){?>span9<?php } else {?>span12<?php } ?>">
                            <div class="content">


                                <div id="content" class="site-content" role="main">     
                                    <?php
                                    if ( $order ) : ?>

                                            <?php if ( in_array( $order->status, array( 'failed' ) ) ) : ?>

                                                    <p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

                                                    <p><?php
                                                            if ( is_user_logged_in() )
                                                                    _e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
                                                            else
                                                                    _e( 'Please attempt your purchase again.', 'woocommerce' );
                                                    ?></p>

                                                    <p>
                                                            <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
                                                            <?php if ( is_user_logged_in() ) : ?>
                                                            <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
                                                            <?php endif; ?>
                                                    </p>

                                            <?php else : ?>

                                                    <p><?php _e( 'Thank you. Your order has been received.', 'woocommerce' ); ?></p>
                                                    
                                                    <table class="styled-table ">
                                                        <tr class="order">
                                                            <th><?php _e( 'Order:', 'woocommerce' ); ?></th>
                                                            <td><?php echo $order->get_order_number(); ?></td>
                                                        </tr>
                                                        <tr class="date">
                                                            <th><?php _e( 'Date:', 'woocommerce' ); ?></th>
                                                            <td><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></td>
                                                        </tr>
                                                        <tr class="total">
                                                            <th><?php _e( 'Total:', 'woocommerce' ); ?></th>
                                                            <td><?php echo $order->get_formatted_order_total(); ?></td>
                                                        </tr>
                                                        <?php if ( $order->payment_method_title ) : ?>
                                                        <tr class="method">
                                                            <th><?php _e( 'Payment method:', 'woocommerce' ); ?></th>
                                                            <td><?php echo $order->payment_method_title; ?></td>
                                                        </tr>
                                                        <?php endif; ?>
                                                    </table>
                                                 
                                                    <div class="clear"></div>

                                            <?php endif; ?>

                                            <?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
                                            <?php do_action( 'woocommerce_thankyou', $order->id ); ?>

                                    <?php else : ?>

                                            <p><?php _e( 'Thank you. Your order has been received.', 'woocommerce' ); ?></p>

                                    <?php endif; ?>
                                </div><!-- #content -->					


                            </div>
                        </div>
                        <?php if (!trim(theme_option('staticpages_sidebar'))){?>
                            <div class="span3 hidden-desktop visible-phone visible-tablet">
                                <?php if (is_user_logged_in()){?>
                                    <?php laboutique_my_account_sidebar_nav(array(
                                        'class'=>'nav nav-tabs nav-stacked',
                                    ))?>
                                <?php } else {?>
                               <?php wp_nav_menu( array(
                                   'theme_location'=>'pages_sidebar',
                                   'menu_class'=>'nav nav-tabs nav-stacked',
                                   'fallback_cb'=>'false'

                               ));?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </section>
            </div>
        </div>
    </div>


</section>    
<!-- End Static page 1 -->