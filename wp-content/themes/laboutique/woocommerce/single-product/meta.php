<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product;
?>
<div class="product_meta meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( theme_option('shop_sku') && $product->get_sku() ) : ?>
		<div itemprop="productID" class="sku_wrapper sku"><i class="icon-pencil"></i>
                    
                    <span rel="tooltip" title="SKU is <?php echo $product->get_sku(); ?>"><?php echo $product->get_sku(); ?></span>
                </div>
	<?php endif; ?>

	<?php
		$size = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
		echo $product->get_categories( '', '<div class="posted_in categories"><span><i class="icon-bookmark"></i>&nbsp;', '</span></div>' );
	?>

	<?php
		$size = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
                echo $product->get_tags( '', '<div class="posted_in categories"><span><i class="icon-tags"></i>&nbsp;', '</span></div>' );
		
	?>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>