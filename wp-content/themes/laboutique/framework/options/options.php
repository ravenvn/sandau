<?php

    $args=array();
    $tabs=array();


    $args['dev_mode']=false;
    $args['dev_mode_icon_class']='icon-large';
    $args['opt_name']='laboutique_options';
    $args['system_info_icon_class']='icon-large';
    $args['allow_sub_menu']=false;

    $theme=wp_get_theme();

    $args['display_name']=$theme->get('Name');    

    $args['import_icon_class']='icon-large';

    $args['default_icon_class']='icon-large';

    $args['menu_title']=__('Theme Options', DOMAIN);


    $args['page_title']=__('Options', DOMAIN);

    $args['page_slug']='redux_options';

    $args['default_show']=true;
    $args['default_mark']='';
    
    $args['google_api_key'] = 'AIzaSyDEz2KL4BWPAS4J14lTVu9cwC3mG1iTArI';



    $args['footer_credit']='<span id="footer-thankyou">'.sprintf(__('%s support%s team is always here to give you a hand with your setup!',DOMAIN),'<a target="_blank" href="http://laboutique.ticksy.com">'.$theme->get('Name'),'</a>').'</span>';

    $sections=array();



    $sections[]=array(
        'icon'=>'cogs',
        'icon_class'=>'icon-large',
        'title'=>__('General Settings', DOMAIN),
        'fields'=>array(
            array(
                'id'=>'color_type',
                'type'=>'select',
                'title'=>__('Theme color', DOMAIN),                
                'options'=>array(
                    1=>__('Preset color', DOMAIN),
                    2=>__('Custom color', DOMAIN)
                )
            ),
            array(
                'id'=>'color_scheme',
                'type'=>'select',
                'title'=>__('Preset color', DOMAIN),
                'default'=>'turquoise',
                'options'=>array(
                    'alizarin'=>'Alizarin',
                    'amethyst'=>'Amethyst',
                    'belizehole'=>'Belizehole',
                    'carrot'=>'Carrot',
                    'emerland'=>'Emerland',
                    'greensea'=>'Greensea',
                    'midnightblue'=>'Midnightblue',
                    'nephritis'=>'Nephritis',
                    'orange'=>'Orange',
                    'peterriver'=>'Peterriver',
                    'pomegranate'=>'Pomegranate',
                    'pumpkin'=>'Pumpkin',
                    'sunflower'=>'Sunflower',
                    'turquoise'=>'Turquoise',
                    'wetasphalt'=>'Wetasphalt',
                    'wisteria'=>'Wisteria'
                ),
            ),
            array(
                'id'=>'style_color',
                'type'=>'color',
                'title'=>__('Custom color', DOMAIN),
                'default'=>'',
                'transparent'=>false
            ),
            
            array(
                'id'=>'favicon',
                'type'=>'media',
                'title'=>__('Favicon', DOMAIN)
            ),
            /*array(
                    'id' => 'style_layout',
                    'type' => 'select',
                    'title' => __('Theme layout', DOMAIN),
                    'options' => array(                            
                        'regular' => __('Regular', DOMAIN),
                        'boxed' => __('Boxed', DOMAIN)
                    ),                                 
                    'default'=>'regular'
            ),*/
            array(
                'id'=>'navigation_sticky',
                'type'=>'switch',
                'title'=>__('Sticky navigation', DOMAIN),
                'default'=>true
            ),
            array(
                'id'=>'staticpages_sidebar',
                'type'=>'switch',
                'title'=>__('Hide sidebar on static pages', DOMAIN),
                'default'=>false
            ),
            array(
                'id'=>'style_background_color',
                'type'=>'color',
                'title'=>__('Background color', DOMAIN),
                'default'=>'',
                'transparent'=>false
            ),
            array(
                'id'=>'style_background_image',
                'type'=>'media',
                'title'=>__('Background image', DOMAIN)                
            ),
            array(
                    'id' => 'style_background_image_repeat',
                    'type' => 'select',
                    'title' => __('Background image repeat', DOMAIN),
                    'options' => array(                            
                            'no-repeat' => __('No repeat', DOMAIN),
                            'repeat' => __('Repeat', DOMAIN),
                            'repeat-x' => __('Repeat X', DOMAIN),
                            'repeat-y' => __('Repeat Y', DOMAIN),                            
                    ),                                        
            ),
            array(
                    'id' => 'style_background_image_position_horizontal',
                    'type' => 'select',
                    'title' => __('Background image horizontal position', DOMAIN),
                    'options' => array(
                            'left' => __('Left', DOMAIN),
                            'center' => __('Center', DOMAIN),
                            'right' => __('Right', DOMAIN),                            
                    ),                    
                    
            ),
            array(
                    'id' => 'style_background_image_position_vertical',
                    'type' => 'select',
                    'title' => __('Background image vertical position', DOMAIN),
                    'options' => array(
                            'top' => __('Top', DOMAIN),
                            'center' => __('Center', DOMAIN),
                            'bottom' => __('Bottom', DOMAIN),                            
                    ),                                        
            ),
            array(
                    'id' => 'style_background_image_attachment',
                    'type' => 'select',
                    'title' => __('Background image scroll style', DOMAIN),
                    'options' => array(
                            'scroll' => __('Scroll (default)', DOMAIN),
                            'fixed' => __('Fixed', DOMAIN),                            
                    ),                                        
            ),
            array(
                'id'=>'style_font_switch',
                'type'=>'switch',
                'title'=>__('Use custom header font', DOMAIN),
                'default'=>false
            ),
            array(
                'id'=>'style_font',
                'type'=>'typography',
                'title'=>__('Header font', DOMAIN),
                'default'=>'',
                'default'=>false,
                'font-size'=>false,
                'font-weight'=>false,
                'font-style'=>false,
                'font-backup'=>false,
                'color'=>false,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>false
            ),
            array(
                'id'=>'style_font_body_switch',
                'type'=>'switch',
                'title'=>__('Use custom body font', DOMAIN),

            ),
            array(
                'id'=>'style_font_body',
                'type'=>'typography',
                'title'=>__('Body font', DOMAIN),
                'default'=>'',
                'font-size'=>false,
                'font-weight'=>false,
                'font-style'=>false,
                'font-backup'=>false,
                'color'=>false,
                'line-height'=>false,
                'word-spacing'=>false,
                'letter-spacing'=>false
            )
            
        )
    );



$sections[]=array(
        'icon'=>'eye-open',
        'icon_class'=>'icon-large',
        'title'=>__('Top Bar', DOMAIN),
        'fields'=>array(
            array(
                'id'=>'top_bar_publish',
                'type'=>'switch',
                // 'required'=>array('layout','equals','1'),
                'title'=>__('Display Top Bar', DOMAIN),
                'default'=>true,
            ),
           array(
                'id'=>'top_left',
                'type'=>'textarea',
                // 'required'=>array('layout','equals','1'),
                'title'=>__('Top Bar Tagline', DOMAIN),
                'subtitle'=>__('This is the text that will show on the left hand side of the top bar.', DOMAIN),
                'default'=>'Responsive eCommerce template — <a href="#"><strong>BUY NOW!</strong></a>',
                'theme'=>'chrome',
                'mode'=>'html',
                'validate'=>'html',
            ),
            array(
                'id'=>'top_right',
                'type'=>'switch',                
                'title'=>__('Display account links', DOMAIN),                
                'default'=>true,
                
            ),
            array(
                    'id' => 'top_language_switcher',
                    'type' => 'select',
                    'title' => __('Language toggle position', DOMAIN),
                    'options' => array(
                            'none' => __('Disabled', DOMAIN),
                            'left' => __('Left', DOMAIN),
                            'right' => __('Right', DOMAIN),                            
                    ),
                    'desc' => __('This requires the <a href="http://wpml.org/" target="_blank" title="The WordPress Multilingual Plugin">WPML plugin</a> to be installed and activated.', DOMAIN),
                    'std' => 'none',
            ),
            
        )
    );

    $sections[]=array(
        'icon'=>'camera',
        'icon_class'=>'icon-large',
        'title'=>__('Site Header', DOMAIN),        
        'fields'=>array(
            array(
                'id'=>'header_bar_logo',
                'type'=>'media',
                'title'=>__('Standard Logo', DOMAIN),
                'description'=>__('Ensure the height of your logo is no larger than 60px.', DOMAIN),
                
            ),
            array(
                'id'=>'header_bar_logo_retina',
                'type'=>'media',
                'title'=>__('Retina Logo', DOMAIN),
                'description'=>__('The retina logo should be exactly twice the size of your standard logo.', DOMAIN),
                
            ),
            array(
                'id'=>'header_bar_logo_margin',
                'type'=>'text',
                'title'=>__('Optional top spacing to push your logo down', DOMAIN),
                'default'=>'',
                'description'=>sprintf(__("Input numeric value in pixels - %sbut without px%s.", DOMAIN),'<em>','</em>')
            ),
            
            
            array(
                'id'=>'header_bar_logo_width',
                'type'=>'text',
                'title'=>__('Logo width', DOMAIN),
                'default'=>'',
                'description'=>sprintf(__("Input numeric value in pixels - %sbut without px%s.", DOMAIN),'<em>','</em>')." ".__("Only use this option if you wish to reduce the width of your logo image",DOMAIN)
            ),
            
            array(
                'id'=>'header_bar_logo_alt',
                'type'=>'text',
                'title'=>__('Logo alt text', DOMAIN),
                'default'=>$theme->get('Name')
            ),
            
            array(
                'id'=>'header_bar_logo_title',
                'type'=>'text',
                'title'=>__('Logo title/hover text', DOMAIN),
                'default'=>__("Back home", DOMAIN)
            ),
            
            
            array(
                'id'=>'header_bar_search_publish',
                'type'=>'switch',
                'title'=>__('Display Search', DOMAIN),
                'default'=>true
            ),
            
           
            
            
        )
    );

    
    
    
   $slider_section=array(
        'icon'=>'home',
        'icon_class'=>'icon-large',
        'title'=>__('Slideshow settings', DOMAIN),
        'fields'=>array(
            
            
            
            
            
            array(
                'id'=>'header_delay',
                'type'=>'text',
                'title'=>__('Flex slider: Slideshow delay', DOMAIN),
                'subtitle'=>__('Flex slider: Delay between slides in seconds.', DOMAIN),
                'default'=>'7',
                'validate'=>'numeric',
            ),
            array(
                'id'=>'header_arrows',
                'type'=>'switch',
                'title'=>__('Flex slider: Display direction arrows', DOMAIN),
                'default'=>true
            ),
            array(
                'id'=>'header_pagination',
                'type'=>'switch',
                'title'=>__('Flex slider: Display pagination', DOMAIN),
                'default'=>true
            ),
            array(
                'id'=>'header_animation',                
                'type'=>'select',
                'title'=>__('Flex slider: Animation type', DOMAIN),
                'default'=>'fade',
                'options'=>array(
                    'fade'=>__('Fade', DOMAIN),
                    'slide'=>__('Slide', DOMAIN),
                    
                ),
            ),
            array(
                'id'=>"header",
                'type'=>'group',//doesn't need to be called for callback fields
                'title'=>__('Flex slider: Header Slides', DOMAIN),
                'slide_title'=>__('Slide', DOMAIN),// Group name
                ///'subtitle'=>__('Group any items together.', DOMAIN),
                //'desc'=>__('No limit as to what you can group. Just don\'t try to group a group.', DOMAIN),
                'groupname'=>__('Slide', DOMAIN),// Group name
                'subfields'=>
                array(
                    array(
                        'id'=>'header_image',
                        'type'=>'media',
                        'title'=>__('Flex slider: Slide image', DOMAIN),
                        'description'=>__('Recommended image size is 1920px x 680px. Height can vary.', DOMAIN),                        
                    ),
                    array(
                        'id'=>'header_title',
                        'type'=>'text',
                        'title'=>__('Flex slider: Slide title', DOMAIN),
                    ),
                    array(
                        'id'=>'header_subtitle',
                        'type'=>'text',
                        'title'=>__('Flex slider: Slide subtitle', DOMAIN),
                    ),
                    array(
                        'id'=>'header_button_text',
                        'type'=>'text',
                        'title'=>__('Primary button text', DOMAIN),
                        'default'=>__("Buy now", DOMAIN),
                    ),
                    array(
                        'id'=>'header_button_text_url',
                        'type'=>'text',
                        'title'=>__('Primary button url', DOMAIN),
                        'validate'=>'url',
                    ),
                    array(
                        'id'=>'header_button_secondary_text',
                        'type'=>'text',
                        'title'=>__('Secondary button text', DOMAIN),
                        'default'=>__("Read more", DOMAIN),
                    ),
                    array(
                        'id'=>'header_button_secondary_text_url',
                        'type'=>'text',
                        'title'=>__('Secondary button url', DOMAIN),
                        'validate'=>'url',
                    ),
                    array(
                        'id'=>'header_text_position',
                        'type'=>'select',
                        'title'=>__('Text position', DOMAIN),
                        'default'=>'1',
                        'options'=>array('1'=>__('Left', DOMAIN),'2'=>__('Right', DOMAIN)),//Must provide key => value pairs for radio options
                    ),
                ),
            ),
            
        )
    );
    
   $sliders_types=array(
        3=>__('None', DOMAIN),
        1=>__('Flex slider', DOMAIN)
    );
   
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
    
    if (is_plugin_active('revslider/revslider.php')){
        
        $sliders=array();
        
        $wp_revslider_sliders = $wpdb->get_results("SELECT title,alias FROM ".$wpdb->prefix."revslider_sliders");

        if ($wp_revslider_sliders){
            foreach($wp_revslider_sliders as $slide){
                $sliders[$slide->alias]=$slide->title;
            }
        }
        
        if ($sliders){
            
            $sliders_types[2]=__('Revolution slider', DOMAIN);
        
            $slider_section['fields']=array_merge(array(

                array(
                    'id'=>'header_slider_revslider_alias',
                    'type'=>'select',
                    'title'=>__('Revolution slider', DOMAIN),
                    'options'=>$sliders
                    
                ),
            ),$slider_section['fields']);
            
            
        }
    }
   
    $slider_section['fields']=array_merge(array(

        array(
            'id'=>'header_slider_type',
            'type'=>'select',
            'title'=>__('Slider type', DOMAIN),
            'options'=>$sliders_types,
            'default'=>1                    

        ),
    ),$slider_section['fields']);
   
   $sections[]=$slider_section;
    
    $promos=array(
        'icon'=>'bookmark',
        'icon_class'=>'icon-large',
        'title'=>__('Homepage Promotional Banner settings', DOMAIN),
        'fields'=>array(
           
            array(
                'id'=>'home_promos',
                'type'=>'switch',
                // 'required'=>array('layout','equals','1'),
                'title'=>__('Display promotional banners', DOMAIN),
                'subtitle'=>__('Tick this box to display promotional banners.', DOMAIN),
                'default'=>true,
            ),
        )
    );

    foreach (array(
        __("First", DOMAIN),
        __("Second", DOMAIN),
        __("Third", DOMAIN),
    )as $k=> $v){

        $key_prefix=strtolower(str_replace("_","",$v));

        $promos['fields']=array_merge($promos['fields'],array(
            array(
                'id'=>'home_promos_'.$key_prefix.'_title',
                'type'=>'text',
                'title'=>sprintf(__('%s banner title', DOMAIN),$v),
                'default'=>"Lorem ipsum dolor",
            ),
            array(
                'id'=>'home_promos_'.$key_prefix.'_subtitle',
                'type'=>'text',
                'title'=>sprintf(__('%s banner subtitle', DOMAIN),$v),
                'default'=>"This is snappy sub-title",
            ),
            array(
                'id'=>'home_promos_'.$key_prefix.'_text',
                'type'=>'textarea',
                'title'=>sprintf(__('%s banner text', DOMAIN),$v),
                'default'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro officiis!',
            ),
            
            array(
                'id'=>'home_promos_'.$key_prefix.'_image',
                'type'=>'media',
                'title'=>sprintf(__('%s banner image', DOMAIN),$v),
                'default'=>array(
                    'url'=>get_template_directory_uri().'/images/promo_'.($k+1).'.png'
                ),
                'desc'=>sprintf(__("Recommended size is %s",DOMAIN),"60px x 50px"),
            ),
            array(
                'id'=>'home_promos_'.$key_prefix.'_icon',
                'type'=>'text',
                'title'=>sprintf(__("or set %s banner's icon", DOMAIN),$v),                
                'desc'=>sprintf(__("Instead of using image, just paste %sthe icon class%s here (ex.: icon-plane).",DOMAIN),'<a href="http://getbootstrap.com/2.3.2/base-css.html#icons" target="_blank">','</a>'),
            ),
        ));
    }


    $sections[]=$promos;
    

    $sections[]=array(
        'icon'=>'twitter',
        'icon_class'=>'icon-large',
        'title'=>__('Twitter Feed', DOMAIN),
        'desc'=>sprintf(__("You have to register a %sTwitter app%s in order to use this feature.", DOMAIN),'<a href="https://dev.twitter.com/apps" target="_blank">','</a>'),
        'fields'=>array(
            array(
                'id'=>'twitter_publish',
                'type'=>'switch',
                'title'=>__('Display Twitter Feed', DOMAIN),
                'default'=>true
            ),
            array(
                'id'=>'twitter_username',
                'type'=>'text',
                'title'=>__('Twitter Username', DOMAIN),
            ),
            array(
                'id'=>'twitter_consumer_key',
                'type'=>'text',
                'title'=>__('Twitter App Consumer Key', DOMAIN),
            ),
            array(
                'id'=>'twitter_consumer_secret',
                'type'=>'text',
                'title'=>__('Twitter App Consumer Secret', DOMAIN),
            ),
            array(
                'id'=>'twitter_user_token',
                'type'=>'text',
                'title'=>__('Twitter App Access Token', DOMAIN),
            ),
            array(
                'id'=>'twitter_user_secret',
                'type'=>'text',
                'title'=>__('Twitter App Access Token Secret', DOMAIN),
            ),
        )
    );


    $sections[]=array(
        'icon'=>'align-justify',
        'icon_class'=>'icon-large',
        'title'=>__('Footer', DOMAIN),
        'fields'=>array(
            array(
                'id'=>'footer_publish',
                'type'=>'switch',
                // 'required'=>array('layout','equals','1'),
                'title'=>__('Display Footer Section', DOMAIN),
                'default'=>true,
            ),
            

            array(
                'id'=>'footer_layout',
                'type' => 'image_select',
                'title' => __('Footer widget area layout', DOMAIN),                
                'desc' => __('To edit widgets, go to', DOMAIN) . " <a href='" . site_url('/wp-admin/widgets.php') . "' target='_blank'>Widget Admin Section</a>",
                'options' => array(
                            'footer-columns-1' => array('title' => '1 Column', 'img' => get_template_directory_uri() . '/framework/options/images/footer-columns-1.png'),
                            'footer-columns-2' => array('title' => '50% | 50%', 'img' => get_template_directory_uri() . '/framework/options/images/footer-columns-2.png'),
                            'footer-columns-2-alt1' => array('title' => '75% | 25%', 'img' => get_template_directory_uri() . '/framework/options/images/footer-columns-2-alt1.png'),
                            'footer-columns-2-alt2' => array('title' => '25% | 75%', 'img' => get_template_directory_uri() . '/framework/options/images/footer-columns-2-alt2.png'),
                            'footer-columns-3' => array('title' => '3 Columns', 'img' => get_template_directory_uri() . '/framework/options/images/footer-columns-3.png'),
                            'footer-columns-3-alt1' => array('title' => '25% | 25% | 50%', 'img' => get_template_directory_uri() . '/framework/options/images/footer-columns-3-alt1.png'),
                            'footer-columns-3-alt2' => array('title' => '50% | 25% | 25%', 'img' => get_template_directory_uri() . '/framework/options/images/footer-columns-3-alt2.png'),
                            'footer-columns-4' => array('title' => '4 Columns', 'img' => get_template_directory_uri() . '/framework/options/images/footer-columns-4.png'),
                            'footer-columns-4-alt1' => array('title' => '16% | 16% | 33% | 33%', 'img' => get_template_directory_uri() . '/framework/options/images/footer-columns-4-alt1.png'),
                        ),//Must provide key => value(array:title|img) pairs for radio options
                'default' => 'footer-columns-4-alt1'
            ),
            
        )
    );

    
    

    $sections[]=array(
        'icon'=>'envelope',
        'icon_class'=>'icon-large',
        'title'=>__('Newsletter Subscription', DOMAIN),
        'fields'=>array(
            
            array(
                'id'=>'newsletter_custom_email',
                'type'=>'text',
                'title'=>__('Recipient email address', DOMAIN),
                'subtitle'=>__("If no recipient is defined, notifications will be sent to the site admin.", DOMAIN),
                'default'=>get_bloginfo('admin_email'),
                'validate'=>'email',
            ),
            
        )
    );
    
    
    

    $social=array(
        'icon'=>'network',
        'icon_class'=>'icon-large',
        'title'=>__('Social media', DOMAIN),        
        'desc'=>sprintf(__('To choose where these social media icons are displayed, navigate to the %sWidget Admin Section%s.', DOMAIN),"<a href='" . site_url('/wp-admin/widgets.php') . "' target='_blank'>",'</a>'),
        'fields'=>array(
            
        )
    );

    foreach (array('Twitter','Facebook','Pinterest','YouTube','Vimeo','Flickr','Google+','Dribbble','Forrst','Tumblr','Digg','Linkedin','Instagram') as $k=> $v){
        $option_id=str_replace("+","plus",str_replace(" ","_",strtolower($v)));

        $social['fields'][]=array(
            'id'=>$option_id,
            'type'=>'text',
            'title'=>$v." ".__('URL', DOMAIN),
            'subtitle'=>'example: http://www.'.$option_id.'.com/themeforest',
            'default'=>'',
            'validate'=>'url',
        );
    }


    $sections[]=$social;


    $sections[]=array(
        'icon'=>'eye-open',
        'icon_class'=>'icon-large',
        'title'=>__('Site Credits', DOMAIN),
        'fields'=>array(
            array(
                'id'=>'footer_copy_publish',
                'type'=>'switch',
                // 'required'=>array('layout','equals','1'),
                'title'=>__('Display Site Credits', DOMAIN),
                'default'=>true,
            ),
            array(
                'id'=>'footer_copy_left',
                'type'=>'textarea',
                'title'=>__('Left side text', DOMAIN),
                'subtitle'=>__('Text that will display in footer on left hand side.', DOMAIN),                
                'theme'=>'chrome',
                'mode'=>'html',
                'validate'=>'html',
            ),
            array(
                'id'=>'footer_copy_right',
                'type'=>'textarea',
                'title'=>__('Right side text', DOMAIN),
                'subtitle'=>__('Text that will display in footer on right hand side.', DOMAIN),
                
                'theme'=>'chrome',
                'mode'=>'html',
                'validate'=>'html',
            ),
        )
    );

    






    $sections[]=array(
        'icon'=>'shopping-cart',
        'icon_class'=>'icon-large',
        'title'=>__('Shop Settings', DOMAIN),
        'fields'=>array(
            array(
                'id'=>'shop_products_per_page',
                'type'=>'text',
                'title'=>__('Products per page', DOMAIN),
                'default'=>9,
                'desc'=>__("You may enter how many products you would like to be loaded on each page.", DOMAIN)."<br /><br />".__('When the user clicks "Load More" this is also the number of products that will be appended to the products.',DOMAIN)
            ),   
            array(
                'id'=>'shop_home_sidebar',
                'type'=>'select',
                'title'=>__('Home page sidebar', DOMAIN),
                'default'=>'right',
                'options'=>array(                    
                    'left'=>__("Left side",DOMAIN),
                    'right'=>__("Right side",DOMAIN)
                ),
                'desc'=>__("Select on which side would you like to display home page sidebar", DOMAIN),
            ),
            array(
                'id'=>'shop_sidebar',
                'type'=>'select',
                'title'=>__('Category page sidebar', DOMAIN),
                'default'=>'right',
                'options'=>array(                    
                    'left'=>__("Left side",DOMAIN),
                    'right'=>__("Right side",DOMAIN)
                ),
                'desc'=>__("Select on which side would you like to display category page sidebar", DOMAIN),
            ),
            array(
                'id'=>'shop_home_products',
                'type'=>'select',
                'title'=>__('Home page will display', DOMAIN),
                'default'=>'latest',
                'options'=>array(                    
                    'latest'=>__("Latest products",DOMAIN),
                    'selected'=>__("Only selected products",DOMAIN)
                ),
                'desc'=>__("Select which products will show on home page.", DOMAIN),
            ),
            array(
                'id'=>'shop_home_load_more',
                'type'=>'switch',
                'title'=>__('Display "Load more" button', DOMAIN),
                'default'=>false,
                'desc'=>__('Display "Load more" button on home page if number of products exceeds page limit.', DOMAIN),
            ),
            array(
                'id'=>'shop_sku',
                'type'=>'switch',
                'title'=>__('If available, display SKU number on product page', DOMAIN),
                'default'=>false
            ),
            array(
                'id'=>'shop_shipping',
                'type'=>'editor',
                'title'=>__('Shipping', DOMAIN),
            ),
            array(
                'id'=>'shop_return',
                'type'=>'editor',
                'title'=>__('Return Policy', DOMAIN),
            ),
            
            array(
                'id'=>'shop_disable_facebook_comments',
                'type'=>'switch',
                'title'=>__('Disable Facebook comments', DOMAIN),
                'default'=>false
            ),
            
            array(
                'id'=>'shop_disable_reviews',
                'type'=>'switch',
                'title'=>__('Disable Product Reviews', DOMAIN),
                'default'=>false
            ),
            
            array(
                'id'=>'shop_disable_sharing',
                'type'=>'switch',
                'title'=>__('Disable Sharing buttons', DOMAIN),
                'default'=>false
            ),
            
            array(
                'id'=>'shop_zoom',
                'type'=>'select',
                'title'=>__('Single product image zoom effect', DOMAIN),                
                'options'=>array(                    
                    'zoomin'=>__("Zoom in",DOMAIN),
                    'lightbox'=>__("Lightbox",DOMAIN)
                ),
                'desc'=>__("Select effect that will be used for enlarged images.", DOMAIN),
            ),
        )
    );
    
    
    



    
    
    
    
    
    


    $sections[]=array(
        'icon'=>'asterisk',
        'icon_class'=>'icon-large',
        'title'=>__('Advanced Settings', DOMAIN),
        'fields'=>array(
            array(
                'id'=>'advanced_css',                
                'title'=>__('Custom CSS'),
                'description'=>htmlspecialchars(__('This code will be included in the html <head> tag. Do not include <style> tags here.', DOMAIN)),
                
                'type'=>'textarea',               
                'theme'=>'chrome',
                'mode'=>'css',
                'validate'=>'css',
            ),
            array(
                'id'=>'advanced_script',
                
                'title'=>__('Custom script'),
                'description'=>htmlspecialchars(__('i.e. Google Analytics code. This code will be included before closing </body> tag. Do include <script> tags here.', DOMAIN)),
                
                'type'=>'textarea',               
                'theme'=>'chrome',
                'mode'=>'html',
                'validate'=>'html',
            ),
        )
    );
    
    

    global $ReduxFramework;
    $ReduxFramework=new ReduxFramework($sections,$args,$tabs);




    