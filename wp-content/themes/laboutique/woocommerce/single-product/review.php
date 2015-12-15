<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post;
$rating = esc_attr( get_comment_meta( $GLOBALS['comment']->comment_ID, 'rating', true ) );
?>
<li itemprop="reviews" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment_container row-fluid">
            <div class="span9">
                <div class="comment-text">                                      
                    <div itemprop="description" class="description"><?php comment_text(); ?></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="span3">
                <?php echo get_avatar( $GLOBALS['comment'], $size='60' ); ?>
                <?php if ($GLOBALS['comment']->comment_approved == '0') : ?>
                        <p class="meta"><em><?php _e( 'Your comment is awaiting approval', 'woocommerce' ); ?></em></p>
                <?php else : ?>
                        <p class="meta">
                                <h6 itemprop="author"><?php comment_author(); ?></h6> <?php

                                        if ( get_option('woocommerce_review_rating_verification_label') == 'yes' )
                                                if ( woocommerce_customer_bought_product( $GLOBALS['comment']->comment_author_email, $GLOBALS['comment']->user_id, $post->ID ) )
                                                        echo '<em class="verified">(' . __( 'verified owner', 'woocommerce' ) . ')</em> ';

                                ?><small itemprop="datePublished" datetime="<?php echo get_comment_date('c'); ?>"><?php echo get_comment_date(__( get_option('date_format'), 'woocommerce' )); ?></small>
                        </p>
                <?php endif; ?>
                        
                <?php if ( get_option('woocommerce_enable_review_rating') == 'yes' && $rating>0) : ?>
                        <div  class="rating rating-<?php echo (int)$rating;?>">
                            <?php for($i=1;$i<=(int)$rating;$i++){?>
                                <i class="icon-heart"></i>
                            <?php } ?>                            
                        </div>
                        

                <?php endif; ?>
            </div>			
            <div class="clear"></div>
	</div>
