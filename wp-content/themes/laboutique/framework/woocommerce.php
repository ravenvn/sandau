<?php
    add_action('after_setup_theme','woocommerce_support');

    function woocommerce_support(){
        add_theme_support('woocommerce');
    }

    add_filter('woocommerce_enqueue_styles','__return_false');

    //Display 9 products per page
    add_filter('loop_shop_per_page',create_function('$cols','return '.theme_option('shop_products_per_page').';'),20);


    add_filter('woocommerce_before_shop_loop_item','woocommerce_before_shop_loop_item_hook');

    function woocommerce_before_shop_loop_item_hook(){
        global $product;



        $sale_price=get_post_meta(get_the_ID(),'_sale_price',true);
        $regular_price=get_post_meta(get_the_ID(),'_regular_price',true);


        $product_image_gallery=get_post_meta(get_the_ID(),'_product_image_gallery',true);

        if ($product_image_gallery){
            $product_image_gallery=explode(",",$product_image_gallery);
        } else {
            $product_image_gallery=array();
        }

        $thumbnail_id=get_post_meta(get_the_ID(),'_thumbnail_id',true);

        if ($thumbnail_id){
            $product_image_gallery=array_merge(array($thumbnail_id),$product_image_gallery);
        }

        $product_image_gallery=array_slice($product_image_gallery,0,2);

        foreach ($product_image_gallery as $k=> $v){

            $product_image_gallery[$k]=$image=wp_get_attachment_image_src($v,'shop_catalog');
        }
        ?>


        <a href="<?php the_permalink();?>" title="<?php echo esc_attr(the_title())?>">

        <?php if ($product_image_gallery){?>
                <div class="image">
                <?php foreach ($product_image_gallery as $k=> $v){?>
                        <img class="<?php if (!$k){?>primary<?php } else {?>secondary<?php }?>" src="<?php echo $v[0]?>" alt="<?php echo esc_attr(the_title())?>" />
                    <?php }?>                                                                
                    <?php if ($sale_price){?>
                        <span class="badge badge-sale"><?php echo __('SALE',DOMAIN);?></span>
                    <?php }?>
                </div>
                <?php }?>

            <div class="title">
                <div class="prices">                                                                                            
        <?php if ($sale_price<>0&&$regular_price<>0){?>

                        <del class="base"><?php echo woocommerce_price($regular_price);?></del> 
                        <span class="price">
                            <?php echo woocommerce_price($sale_price);?>
                            <?php if ($price_suffix=$product->get_price_suffix()){?>
                            <small class="woocommerce-price-suffix"><?php echo $price_suffix?></small>
                            <?php } ?>
                        </span>  
                        

        <?php } else {?>            
                        <span class="price">
                        <?php
                        /**
                         * woocommerce_after_shop_loop_item_title hook
                         *
                         * @hooked woocommerce_template_loop_price - 10
                         */
                        woocommerce_get_template('loop/price.php');
                        ?>
                        </span>
                        <?php }?>
                </div>
                <h3><?php the_title();?></h3>
        <?php
            
        if (!theme_option('shop_disable_reviews')){
            
            if ($product &&method_exists($product,'get_average_rating')){
                $rating=$product->get_average_rating();
            } else {
                $rating='';
            }

            if ($rating){
                echo '<div class="rating rating-'.(int)$rating.'">';

                for ($i=1; $i<=(int)$rating; $i++){
                    echo '<i class="icon-heart"></i>'."\n";
                }

                echo '</div>';
            }
        }
        ?>              
            </div>

        </a>


        <?php
    }

    //remove add_to_cart_buttons in loop
    add_action('woocommerce_after_shop_loop_item','remove_add_to_cart_buttons',1);

    function remove_add_to_cart_buttons(){
        remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart');
    }

    //replace image placeholder
    add_action('init','custom_fix_thumbnail');

    function custom_fix_thumbnail(){
        add_filter('woocommerce_placeholder_img_src','custom_woocommerce_placeholder_img_src');

        function custom_woocommerce_placeholder_img_src($src){
            $src=get_bloginfo('template_directory').'/images/placeholder.jpg';
            return $src;
        }

    }

    global $pagenow;



    if (is_admin()&&isset($_GET['activated'])&&$pagenow=='themes.php'){
        add_action('init','woocommerce_image_dimensions',1);
    }

    /**
     * Define image sizes
     */
    function woocommerce_image_dimensions(){
        $catalog=array(
            'width'=>'640',// px
            'height'=>'0',// px
            'crop'=>0 // true
        );

        $single=array(
            'width'=>'640',// px
            'height'=>'0',// px
            'crop'=>0 // false
        );

        $thumbnail=array(
            'width'=>'160',// px
            'height'=>'0',// px
            'crop'=>0 // false
        );

        // Image sizes
        update_option('shop_catalog_image_size',$catalog); // Product category thumbs
        update_option('shop_single_image_size',$single); // Single product image
        update_option('shop_thumbnail_image_size',$thumbnail); // Image gallery thumbs
    }

    if (!function_exists('laboutique_mini_cart')){

        function laboutique_mini_cart(){
            global $woocommerce;

            if ($woocommerce){
                ?>
                <!-- Mini cart -->
                <div class="mini-cart">
                    <a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id'))?>" title="<?php echo __('Cart',DOMAIN);?>">
                        <span><?php if (isset($woocommerce)){?><?php echo $woocommerce->cart->cart_contents_count;?><?php } else {?>0<?php }?></span>
                    </a>									
                </div>
                <!-- End class="mini-cart" -->
                <?php
            }
        }

    }




    /**
     * custom woocommerce widgets
     */
    if (!function_exists('laboutique_widget_product_small')){

        function laboutique_widget_product_small($r){

            $r->the_post();

            global $product;


            echo '<li>';

            if (has_post_thumbnail()){
                echo '<div class="image">
                    <a href="'.esc_url(get_permalink()).'" title="'.esc_attr(get_the_title()).'">
                        '.get_the_post_thumbnail($r->post->ID,'shop_thumbnail').'
                    </a>
                </div>';
            }


            echo '<div class="desc">
                    <h6>
                        <a href="'.esc_url(get_permalink()).'" title="'.esc_attr(get_the_title()).'">'.get_the_title().'</a>
                    </h6>';

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

            echo '</div>
            </li>';
        }

    }


    add_action('widgets_init','override_woocommerce_widgets',15);

    function override_woocommerce_widgets(){
        // Ensure our parent class exists to avoid fatal error (thanks Wilgert!)

        foreach (array(/* 'Widget_Best_Sellers','Widget_Top_Rated_Products','Widget_Random_Products',
      'Widget_Recently_Viewed','Widget_Onsale','Widget_Featured_Products','Widget_Recent_Products', */'Widget_Recent_Reviews'/* ,'Widget_Product_Categories' */) as $k=> $v){

            if (class_exists('WC_'.$v)){
                unregister_widget('WC_'.$v);

                if (file_exists(get_template_directory().'/framework/widgets/'.strtolower(str_replace("_","-",$v)).'.php')){
                    require_once( get_template_directory().'/framework/widgets/'.strtolower(str_replace("_","-",$v)).'.php' );
                    register_widget('Custom_WC_'.$v);
                }
            }
        }
    }
    
    if (!function_exists('laboutique_my_account_sidebar_nav')){
        function laboutique_my_account_sidebar_nav($args=array()){?>
            <ul<?php if ($args['class']){?> class="<?php echo $args['class'];?>"<?php } ?>>
                <li><a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id'));?>" title="<?php _e('My Account',DOMAIN);?>"><?php _e('My Account',DOMAIN);?></a></li>                                                    
                <?php
                    $myaccount_page_id=get_option('woocommerce_myaccount_page_id');

                    if ($myaccount_page_id){

                        $logout_url=wp_logout_url(get_permalink($myaccount_page_id));

                        if (get_option('woocommerce_force_ssl_checkout')=='yes')
                            $logout_url=str_replace('http:','https:',$logout_url);
                    }
                ?>
                <li><a href="<?php echo wc_customer_edit_account_url()?>" title=""><?php echo __("Edit Account",DOMAIN)?></a></li>
                
                <li><a href="<?php echo wc_get_endpoint_url( 'edit-address', 'billing' ); ?>"><?php echo __("Edit Billing Address",DOMAIN)?></a></li>
                <li><a href="<?php echo wc_get_endpoint_url( 'edit-address', 'shipping' ); ?>"><?php echo __("Edit Shipping Address",DOMAIN)?></a></li>    
                
                <li><a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id'))?>"><?php echo _e('Shopping cart',DOMAIN);?></a></li>
                
                <li><a href="<?php echo $logout_url;?>" title="<?php _e('Logout',DOMAIN);?>"><?php _e('Logout',DOMAIN);?></a></li>
            </ul>

            
        <?php }
    }

    if (!function_exists('laboutique_my_account_nav')){

        /**
         * Display my account navigation.
         *
         * @since La Boutique 1.1
         *
         * @return void
         */
        function laboutique_my_account_nav($args=array()){
            ?>
            <ul<?php if ($args['class']){?> class="<?php echo $args['class'];?>"<?php } ?>>

            <?php
                $myaccount_page_id=get_option('woocommerce_myaccount_page_id');

                if ($myaccount_page_id){

                    $logout_url=wp_logout_url(get_permalink($myaccount_page_id));

                    if (get_option('woocommerce_force_ssl_checkout')=='yes')
                        $logout_url=str_replace('http:','https:',$logout_url);
                }
            ?>
                
                <?php if (is_user_logged_in() && get_option('woocommerce_myaccount_page_id')){?>                    
                    <li><a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id'));?>" title="<?php _e('My Account',DOMAIN);?>"><?php _e('My Account',DOMAIN);?></a></li>                                                    
               <?php } ?>
                        
                <?php if ($logout_url){?>
                    <?php if (!is_user_logged_in()){?>
                        <li><a href="<?php echo $logout_url;?>" title="<?php _e('Login / Register',DOMAIN);?>"><?php _e('Login / Register',DOMAIN);?></a></li>
                    <?php } else {?>
                        <li><a href="<?php echo $logout_url;?>" title="<?php _e('Logout',DOMAIN);?>"><?php _e('Logout',DOMAIN);?></a></li>
                    <?php } ?>
                <?php } ?>
                        
                        
            </ul>
                <?php
            }

        }



        // Display Fields
        add_action('woocommerce_product_options_general_product_data','woo_add_custom_general_fields');

        // Save Fields
        add_action('woocommerce_process_product_meta','woo_add_custom_general_fields_save');

        function woo_add_custom_general_fields(){

            global $woocommerce,$post;
            // Checkbox

            woocommerce_wp_checkbox(
                    array(
                        'id'=>'featured_product',
                        //'wrapper_class'=>'show_if_simple',
                        'label'=>__('Featured product','woocommerce'),
                        'description'=>__('Tick this box to make this product featured.','woocommerce')
                    )
            );
            
            woocommerce_wp_checkbox(
                    array(
                        'id'=>'homepage_product',
                        //'wrapper_class'=>'show_if_simple',
                        'label'=>__('Display on homepage','woocommerce'),
                        'description'=>__('Tick this box to display this product on home page. Product will display only if it\'s set so in theme options.','woocommerce')
                    )
            );
        }

        function woo_add_custom_general_fields_save($post_id){
            $woocommerce_checkbox=isset($_POST['featured_product']) ? 'yes' : 'no';
            update_post_meta($post_id,'featured_product',$woocommerce_checkbox);
            
            $woocommerce_checkbox=isset($_POST['homepage_product']) ? 'yes' : 'no';
            update_post_meta($post_id,'homepage_product',$woocommerce_checkbox);
        }
        