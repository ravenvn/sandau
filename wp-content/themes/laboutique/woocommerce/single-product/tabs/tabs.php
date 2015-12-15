<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

?>
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#product" data-toggle="tab">
                    <i class="icon-reorder icon-large"></i>
                    <span class="hidden-phone"><?php echo __('Product', DOMAIN);?></span>
                </a>
            </li>
            <?php if (trim(theme_option('shop_shipping'))){?>
            <li>
                <a href="#shipping" data-toggle="tab">
                    <i class="icon-truck icon-large"></i>
                    <span class="hidden-phone"><?php echo __('Shipping', DOMAIN);?></span>
                </a>
            </li>
            <?php } ?>
            <?php if (trim(theme_option('shop_return'))){?>
            <li>
                <a href="#returns" data-toggle="tab">
                    <i class="icon-undo icon-large"></i>
                    <span class="hidden-phone"><?php echo __('Returns', DOMAIN);?></span>
                </a>
            </li>
            <?php } ?>
    <?php if ( ! empty( $tabs ) ) { ?>
        <?php foreach ( $tabs as $key => $tab ) { ?>
            <?php if (($key=='reviews' && !theme_option('shop_disable_reviews'))|| $key!='reviews'){?>
                <li class="<?php echo $key ?>_tab" >
                        <a href="#tab-<?php echo $key ?>" data-toggle="tab">
                            <?php

                                switch($key){
                                    case 'description':
                                        echo '<i class="icon-align-left icon-large"></i>';
                                        break;
                                    case 'reviews':
                                        echo '<i class="icon-heart icon-large"></i>';
                                        break;
                                    case 'additional_information':
                                        echo '<i class="icon-info-sign icon-large"></i>';
                                        break;
                                }
                            ?>
                            <span class="hidden-phone">
                                <?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?>
                            </span>
                        </a>
                </li>
            <?php } ?>

        <?php } ?>
    <?php } ?>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="product">
                <div class="details">
                    <?php woocommerce_template_single_title();?>
                    <?php woocommerce_template_single_price(); ?>
                    <?php woocommerce_template_single_meta(); ?>                    
                    
                </div>
                
                <?php woocommerce_template_single_excerpt(); ?>
                
                <div class="add-to-cart">
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>
            </div>
            <?php if (trim(theme_option('shop_shipping'))){?>
            <!-- Shipping tab -->
            <div class="tab-pane" id="shipping">                                    
                <?php echo theme_option('shop_shipping');?>
            </div>
            <!-- End id="shipping" -->
            <?php } ?>
            
            <?php if (trim(theme_option('shop_return'))){?>
            <!-- Returns tab -->
            <div class="tab-pane" id="returns">
                <?php echo nl2br(theme_option('shop_return'));?>
            </div>
            <?php } ?>
            <!-- End id="returns" -->
            <?php if ( ! empty( $tabs ) ) { ?>
        <?php foreach ( $tabs as $key => $tab ) {?>
            <?php if (($key=='reviews' && !theme_option('shop_disable_reviews'))|| $key!='reviews'){?>
                <div class="tab-pane entry-content" id="tab-<?php echo $key ?>">
                        <?php call_user_func( $tab['callback'], $key, $tab ) ?>
                </div>
            <?php } ?>

            <?php } ?>
        <?php } ?>
        </div>
        

