<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    global $post, $product;
    
    $sale_price = get_post_meta( get_the_ID(), '_sale_price', true);
    $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);    
?>

<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

        <div class="prices">
            <?php if ($sale_price<>0 && $regular_price<>0){?>
            
            <span itemprop="price" class="price">
                <?php echo woocommerce_price($sale_price);?>
                <?php if ($price_suffix=$product->get_price_suffix()){?>
                    <small class="woocommerce-price-suffix"><?php echo $price_suffix?></small>
                <?php } ?>
            </span> 
            <del class="base"><?php echo woocommerce_price($regular_price);?></del> 
            <?php } else {?>
            <span itemprop="price" class="price"><?php echo $product->get_price_html(); ?></span> 
            
            <?php } ?>
        </div>
        
	

	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>
