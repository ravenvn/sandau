<?php

    class Custom_WC_Widget_Recent_Reviews extends WC_Widget_Recent_Reviews {

        function widget($args,$instance){
            global $comments,$comment,$woocommerce;

            $cache=wp_cache_get('widget_recent_reviews','widget');

            if (!is_array($cache))
                $cache=array();

            if (isset($cache[$args['widget_id']])){
                echo $cache[$args['widget_id']];
                return;
            }

            ob_start();
            extract($args);

            $title=apply_filters('widget_title',empty($instance['title']) ? __('Recent Reviews','woocommerce') : $instance['title'],$instance,$this->id_base);
            if (!$number=absint($instance['number']))
                $number=5;

            $comments=get_comments(array('number'=>$number,'status'=>'approve','post_status'=>'publish','post_type'=>'product'));

            if ($comments){
                echo $before_widget;
                if ($title)
                    echo $before_title.$title.$after_title;
                echo '<ul class="ratings-small">';

                foreach ((array)$comments as $comment){
                    
                    $_product=get_product($comment->comment_post_ID);

                    $rating=intval(get_comment_meta($comment->comment_ID,'rating',true));

                    $rating_html=$_product->get_rating_html($rating);
                    
                    
                    echo '<li>';

                    
                    echo '<div class="image">
                        <a href="'.esc_url(get_comment_link($comment->comment_ID)).'" title="'.esc_attr($_product->get_title()).'">
                            <img src="http://www.gravatar.com/avatar/'.md5(get_comment_author_email()).'?s=60&d=retro&r=g" alt="" />
                        </a>
                    </div>';

                    echo '<div class="desc">
                            <h6>'.get_comment_author().'</h6><small>'.get_comment_date().'</small>';
                   	
                    echo '<div class="rating rating-'.(int)$_product->get_average_rating().'">';

                    for($i=1;$i<=(int)$_product->get_average_rating();$i++){
                        echo '<i class="icon-heart"></i>'."\n";
                    }

                    echo '</div>';
                    
                    echo '</div>
                    </li>';

                }

                echo '</ul>';
                echo $after_widget;
            }

            $content=ob_get_clean();

            if (isset($args['widget_id']))
                $cache[$args['widget_id']]=$content;

            echo $content;

            wp_cache_set('widget_recent_reviews',$cache,'widget');
        }

    }

?>