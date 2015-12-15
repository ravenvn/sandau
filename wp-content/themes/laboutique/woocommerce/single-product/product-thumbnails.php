<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.3
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {
	?>
	
            <?php
                //add featured image as well
            ?>
            
            <?php

		/*$loop = 0;*/
		$columns = apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

		foreach ( $attachment_ids as $attachment_id ) {
/*
			$classes = array( 'zoom' );

			if ( $loop == 0 || $loop % $columns == 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns == 0 )
				$classes[] = 'last';

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link )
				continue;

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
			
      
			$image_title = esc_attr( get_the_title( $attachment_id ) );
                        
                        $thumbnail_image_link  		= wp_get_attachment_url( $attachment_id,'single_product_large_thumbnail_size' );

			echo '<li>'.apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="#" data-image="%s" data-zoom-image="%s" class="%s" title="%s"  >%s</a>', $thumbnail_image_link, $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class ).'</li>';
*/
                                      
                        if (!has_post_thumbnail())
                            $image_class='active';
                        else
                            $image_class='';
                        
                    
                        $image_title 		= esc_attr( get_the_title( $attachment_id ) );                                                        
                        $image=wp_get_attachment_image_src($attachment_id,'shop_catalog');
                        $image_link=$image[0];
                        
                        $thumbnail_image=wp_get_attachment_image_src($attachment_id,'shop_thumbnail');
                        $thumbnail_image_link=$thumbnail_image[0];
                        
                        echo '<li><a href="#" data-image="'.$image_link.'" data-zoom-image="'.$image_link.'" class="'.$image_class.'" title="'.esc_attr($image_title).'"  ><img src="'.$thumbnail_image_link.'" alt="'.esc_attr($image_title).'" /></a></li>';
                    
                    
			/*$loop++;*/
		}

	?>
	<?php
}