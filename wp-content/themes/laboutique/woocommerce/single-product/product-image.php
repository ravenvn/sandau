<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<div class="product-images">
    <div class="box">
        <div class="images">
                <?php
                    
                        $product_images=array();
                        
                        if ( has_post_thumbnail() ) {

                                $image_title= esc_attr( get_the_title( get_post_thumbnail_id() ) );                                                        
                                $image=wp_get_attachment_image_src(get_post_thumbnail_id(),'shop_catalog');
                                $image_link=$image[0];
                                
                                $thumbnail_image=wp_get_attachment_image_src(get_post_thumbnail_id(),'shop_thumbnail');
                                $thumbnail_image_link=$thumbnail_image[0];

                                $product_images[]='<img src="'.$image_link.'" data-zoom-image="'.$image_link.'" alt="'.esc_attr($image_title).'" />';                                
                        } else {
                            global $post, $product, $woocommerce;

                            $attachment_ids = $product->get_gallery_attachment_ids();

                            if ( $attachment_ids ){
                                             
                                $image_title 		= esc_attr( get_the_title( $attachment_ids[0] ) );                                                        
                                $image=wp_get_attachment_image_src($attachment_ids[0],'shop_catalog');
                                $image_link=$image[0];
                                
                                $thumbnail_image=wp_get_attachment_image_src($attachment_ids[0],'shop_thumbnail');
                                $thumbnail_image_link=$thumbnail_image[0];
                                
                                $product_images[]='<img src="'.$image_link.'" data-zoom-image="'.$image_link.'" alt="'.esc_attr($image_title).'" />';                                
                            } else {
                                $product_images[]=apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', woocommerce_placeholder_img_src() ), $post->ID );
                            }

                        }
                ?>
                <?php if ($product_images){?>
                <div class="primary">
                    <?php echo implode("",$product_images)?>
                </div>
                <div class="thumbs<?php if (theme_option('shop_disable_sharing')){?> no_social<?php } ?>" id="gallery" >  
                    <ul class="thumbs-list">
                        <?php if ( has_post_thumbnail() ) {
                            echo '<li><a href="#" data-image="'.$image_link.'" data-zoom-image="'.$image_link.'" class="active" title="'.esc_attr($image_title).'"  ><img src="'.$thumbnail_image_link.'" alt="'.esc_attr($image_title).'" /></a></li>';
                        } ?>
                        <?php do_action( 'woocommerce_product_thumbnails' ); ?>
                    </ul>
                </div>
                <?php } ?>
                <?php if (!theme_option('shop_disable_sharing')){?>
                <div class="social">
                    <div id="sharrre">
                        <div class="facebook"> </div>
                        <div class="twitter"> </div>
                        <div class="googleplus"> </div>                                                   
                        <div class="pinterest"> </div>
                    </div>
                </div>
                <?php } ?>

        </div>
    </div>
</div>