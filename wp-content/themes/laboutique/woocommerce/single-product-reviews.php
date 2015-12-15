<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */
global $woocommerce, $product;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<?php if ( comments_open() ) : ?><div id="reviews"><?php

	echo '<div id="comments">';


	$title_reply = '';

	if ( have_comments() ) :

		echo '<ol class="commentlist">';

		wp_list_comments( array( 'callback' => 'woocommerce_comments' ) );

		echo '</ol>';

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Previous', 'woocommerce' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'woocommerce' ) ); ?></div>
			</div>
		<?php endif;
                
                echo '<hr />';


	endif;
        


        echo  '<div class="well">
            <div class="row-fluid">
                <div class="span';
        
        if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ){
            echo '8';
        } else {
            echo '12';
        }
        
        
        echo '">
                    <h6><i class="icon-comment-alt"></i> &nbsp; '.__( 'Share your opinion!', DOMAIN ).'</h6>';

        if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ){
            echo '<p>'.__( 'Let other people know your thoughts on this product!', DOMAIN ).'</p>';
        } else {
            echo '<p class="woocommerce-verification-required">'._e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ).'</p>';
        }
        echo '</div>';
        
        if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ){
                echo '<div class="span4">
                    <a href="#" class="btn btn-seconary btn-block">'.__( 'Add a review', 'woocommerce' ).'</a>
                </div>';
        }
            echo '</div>
        </div>';
        

	$commenter = wp_get_current_commenter();

	echo '</div>';
        
        echo '<div id="review_form" class="modal hide fade" tabindex="-1" role="dialog"><div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <div class="hgroup title">
                                                                    <h3>' . __( 'Your Review', 'woocommerce' ) . '</h3>
                                                                    <h5>'.$post->post_title.'</h5>
                                                                </div>
                                                            </div><div class="modal-body">';

	$comment_form = array(
		'title_reply' => $title_reply,
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'fields' => array(
			'author' => '<div class="row-fluid"><div class="span6">' . '<label for="author">' . __( 'Name', 'woocommerce' ) . '</label> ' .
			            '<div class="controls"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" class="span12" /></div></div>',
			'email'  => '<div class="span6"><label for="email">' . __( 'Email', 'woocommerce' ) . '</label> ' .
			            '<div class="controls"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" class="span12" /></div></div></div>',
		),
		'label_submit' => __( 'Submit Review', 'woocommerce' ),
		'logged_in_as' => '',
		'comment_field' => ''
	);

	if ( get_option('woocommerce_enable_review_rating') == 'yes' ) {

		$comment_form['comment_field'] = '<div class="row-fluid"><div class="span12"><label for="rating">' . __( 'Your Rating', 'woocommerce' ) .'</label>
                    <div class="controls"><select name="rating" class="span12">
			<option value="">'.__( 'Rate&hellip;', 'woocommerce' ).'</option>
			<option value="5">'.__( 'Perfect', 'woocommerce' ).'</option>
			<option value="4">'.__( 'Good', 'woocommerce' ).'</option>
			<option value="3">'.__( 'Average', 'woocommerce' ).'</option>
			<option value="2">'.__( 'Not that bad', 'woocommerce' ).'</option>
			<option value="1">'.__( 'Very Poor', 'woocommerce' ).'</option>
		</select></div></div></div>';

	}

	$comment_form['comment_field'] .= '<div class="row-fluid"><div class="span12"><label for="comment">' . __( 'Your Review', 'woocommerce' ) . '</label><div class="controls"><textarea id="comment" name="comment" class="span12" aria-required="true"></textarea></div></div></div>' . wp_nonce_field( 'woocommerce-comment_rating', '_wpnonce', true, false );

	comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );

	echo '</div></div>';

?><div class="clear"></div></div>
<?php endif; ?>