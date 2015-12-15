<?php global $product;?>
<li>
    <div class="image">
        <a href="<?php echo esc_url(get_permalink($product->id));?>" title="<?php echo esc_attr($product->get_title());?>">
            <?php echo $product->get_image();?>		
        </a>
    </div>
    <div class="desc">        
        <h6><a href="<?php echo esc_url(get_permalink($product->id));?>" title="<?php echo esc_attr($product->get_title());?>"><?php echo $product->get_title();?></a></h6>
        <div class="price">
         
            <?php
                if ($price=$product->get_price_html()){

                    echo '<div class="price">';

                    echo $price;

                    $sale=get_post_meta($product->id,'_sale_price',true);

                    if ($sale)
                        echo '<span class="label label-sale">'.__("Sale").'</span>';

                    echo '</div>';
                }
                
                if (!theme_option('shop_disable_reviews')){

                    if ($product->get_average_rating()){
                        echo '<div class="rating rating-'.(int)$product->get_average_rating().'">';

                        for ($i=1; $i<=(int)$product->get_average_rating(); $i++){
                            echo '<i class="icon-heart"></i>'."\n";
                        }

                        echo '</div>';
                    } else {
                        echo '<div class="rating rating-0">
                                <a href="'.esc_url(get_permalink()).'#tab-reviews">'.__("No reviews &mdash; be the first?", DOMAIN).'</a>
                            </div>';
                    }    
                }
            ?>
        </div>
    </div>   
</li>