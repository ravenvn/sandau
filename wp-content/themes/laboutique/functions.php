<?php
    /**
     * Theme designed and developed by Twin Dots Limited    
     * Distributed on ThemeForest under GNU General Public License
     */
    
    //locale
    define('DOMAIN','laboutique');
    
    //outputs template file names
    define('DEBUG_INFO', false);
    
    //show theme colors panel
    define('THEME_COLORS', false);
    
    //use less css compiler
    define('LESS_CSS', false);
    
    
    if ( ! isset( $content_width ) ) $content_width = 1170;
    
    if (file_exists(get_template_directory().'/framework/tgm-plugin-activation/request-plugins.php')){
        require_once( get_template_directory().'/framework/tgm-plugin-activation/request-plugins.php' );
    }


    if (!class_exists('ReduxFramework')&&file_exists(get_template_directory().'/framework/options/ReduxCore/framework.php')){
        require_once( get_template_directory().'/framework/options/ReduxCore/framework.php' );
    }
    
    if (!isset($redux_demo)&&file_exists(get_template_directory().'/framework/options/options.php')){
        require_once( get_template_directory().'/framework/options/options.php' );
    }
    
    if (file_exists(get_template_directory() . '/framework/metaboxes/metaboxes.php')){
        require( get_template_directory() . '/framework/metaboxes/metaboxes.php' ); // Metaboxes plugin integration
    }

    
    function theme_option($option){
        global $laboutique_options;

        if (isset($laboutique_options[$option]))
            return $laboutique_options[$option];
        else
            return false;
    }
    
    require_once( get_template_directory().'/framework/woocommerce.php' );

    if (file_exists(get_template_directory().'/framework/twitteroauth/class.twitteroauth.php') && theme_option('twitter_publish')){
        require_once( get_template_directory().'/framework/twitteroauth/class.twitteroauth.php' );
    }

    
    
    

    /* custom comments output */
    function format_comment($comment,$args,$depth){

        echo '<div ';
        
        comment_class();
         
        echo ' id="li-comment-';
        comment_ID();

       
        
        echo'">
        <div class="row-fluid">
            <div class="span9">
                <p>';

        comment_text();

        echo '</p>
            </div>

            <div class="span3">';

        echo get_avatar($comment->comment_author_email,60);

        

        echo '<h6>
        <a href="';

        comment_author_url();

        echo '">';

        comment_author();

        echo '</a>											
                </h6>
                <small>';
        printf(__('%1$s', DOMAIN),get_comment_date(),get_comment_time());

        echo '</small>
            </div>
        </div>
    </div>';
    }
    
   

    function laboutique_setup(){
        /*
         * Makes La Boutique available for translation.
         *
         * Translations can be added to the /languages/ directory.
         * If you're building a theme based on La Boutique, use a find and
         * replace to change 'laboutique' to the name of your theme in all
         * template files.
         */
        load_theme_textdomain('laboutique',get_template_directory().'/languages');

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        //add_editor_style( array( 'css/editor-style.css', 'fonts/genericons.css', laboutique_fonts_url() ) );
        // Adds RSS feed links to <head> for posts and comments.
        add_theme_support('automatic-feed-links');
        add_theme_support( 'custom-background');

        /*
         * Switches default core markup for search form, comment form,
         * and comments to output valid HTML5.
         */
        add_theme_support('html5',array('search-form','comment-form','comment-list'));


        // This theme uses wp_nav_menu() in one location.
        register_nav_menu('primary',__('Desktop Menu', DOMAIN));
        register_nav_menu('mobile',__('Mobile Menu', DOMAIN));
        register_nav_menu('pages_sidebar',__('Sidebar Menu', DOMAIN));        

        /*
         * This theme uses a custom image size for featured images, displayed on
         * "standard" posts and pages.
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(830,0,false);

        // This theme uses its own gallery styles.
        add_filter('use_default_gallery_style','__return_false');
        
        if (function_exists('vc_map')){
            require( get_template_directory() . '/framework/js_composer/map.php');	// Visuall Composer integration
            require( get_template_directory() . '/framework/js_composer/templates.php');	// Visuall Composer integration
	}
    }

    add_action('after_setup_theme','laboutique_setup');

    /**
     * Return the Google font stylesheet URL, if available.
     *
     * The use of Source Sans Pro and Bitter by default is localized. For languages
     * that use characters not supported by the font, the font can be disabled.
     *
     * @since La Boutique 1.1
     *
     * @return string Font stylesheet or empty string if disabled.
     */
    function laboutique_fonts_url(){
        $fonts_url='';

        /* Translators: If there are characters in your language that are not
         * supported by Source Sans Pro, translate this to 'off'. Do not translate
         * into your own language.
         */
        $lato=_x('on','Lato font: on or off', DOMAIN);

        /* Translators: If there are characters in your language that are not
         * supported by Bitter, translate this to 'off'. Do not translate into your
         * own language.
         */
        //$bitter = _x( 'on', 'Bitter font: on or off', DOMAIN );

        if ('off'!==$lato||'off'!==$bitter){
            $font_families=array();

            if ('off'!==$lato)
                $font_families[]='Lato:300,300italic,400,400italic,700,700italic';

            /* if ( 'off' !== $bitter )
              $font_families[] = 'Bitter:400,700'; */

            $query_args=array(
                'family'=>urlencode(implode('|',$font_families)),
                'subset'=>urlencode('latin,latin-ext'),
            );
            $fonts_url=add_query_arg($query_args,"//fonts.googleapis.com/css");
        }

        return $fonts_url;
    }

    /**
     * Enqueue scripts and styles for the front end.
     *
     * @since La Boutique 1.1
     *
     * @return void
     */
    function laboutique_scripts_styles(){
        /*
         * Adds JavaScript to pages with the comment form to support
         * sites with threaded comments (when in use).
         */
        if (is_singular()&&comments_open()&&get_option('thread_comments'))
            wp_enqueue_script('comment-reply');

        // Adds Masonry to handle vertical alignment of footer widgets.
        if (is_active_sidebar('sidebar-1'))
            wp_enqueue_script('jquery-masonry');

        // Loads JavaScript file with functionality specific to La Boutique.
        //wp_enqueue_script( 'laboutique-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '2013-07-18', true );
        // Add Source Sans Pro and Bitter fonts, used in the main stylesheet.        
        wp_enqueue_style('laboutique-fonts',laboutique_fonts_url(),array(),null);
        wp_enqueue_style('laboutique-fonts-script','//fonts.googleapis.com/css?family=Shadows+Into+Light',array(),null);

        wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css',array(),'1');
        wp_enqueue_style('bootstrap-responsive',get_template_directory_uri().'/css/bootstrap-responsive.css',array(),'1');
        wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/fonts/font-awesome.css',array(),'1');
        wp_enqueue_style('flexslider',get_template_directory_uri().'/css/flexslider.css',array(),'1');
/*
        if (theme_option('shop_zoom')=='lightbox'){
            wp_enqueue_style('prettyphoto',get_template_directory_uri().'/js/prettyphoto/css/prettyPhoto.css',array(),'1');    
        }*/

        wp_enqueue_style('style',get_template_directory_uri().'/style.css',array(),'1');                
        $color_scheme=theme_option('color_scheme');        
        
        if (constant('THEME_COLORS') && array_key_exists('core-css',$_COOKIE)){            
            if ($_COOKIE['core-css']){  
                $color_scheme=explode("/",$_COOKIE['core-css']);   
                $color_scheme=explode(".",$color_scheme[count($color_scheme)-1]);
                $color_scheme=$color_scheme[0];              
            }                                     
        }
       
        if (!function_exists('ChangeColorLightness')){
            function ChangeColorLightness($color,$dif=20){

                $color=str_replace('#','',$color);
                if (strlen($color)!=6){
                    return '000000';
                }
                $rgb='';

                for ($x=0; $x<3; $x++){
                    $c=hexdec(substr($color,(2*$x),2))-$dif;
                    $c=($c<0) ? 0 : dechex($c);
                    $rgb .= (strlen($c)<2) ? '0'.$c : $c;
                }

                return '#'.$rgb;
            }
        }
        
        
        if (!constant('LESS_CSS')){
            //if custom theme color set, ignore cookie and color scheme
            if (theme_option('style_color') && theme_option('color_type')==2){
                $filename=get_template_directory().'/css/color-schemes/custom_color.css';
                
                $handle=fopen($filename,"r");
                if (filesize($filename)){
                    $css=fread($handle,filesize($filename));
                    
                    
                    $css=str_replace('@import "','@import "'.get_template_directory_uri().'/css/color-schemes/',$css);
                                        
                    while(strpos($css,'#fc00ff')!==false){
                        $css=str_replace('#fc00ff',theme_option('style_color'),$css);
                    }
                    
                    while(strpos($css,'#ca00cc')!==false){
                        $css=str_replace('#ca00cc',ChangeColorLightness(theme_option('style_color'),10),$css);
                    }
                    
                    while(strpos($css,'#e300e6')!==false){
                        $css=str_replace('#e300e6',ChangeColorLightness(theme_option('style_color'),5),$css);
                    }
                    
                    while(strpos($css,'#970099')!==false){
                        $css=str_replace('#970099',ChangeColorLightness(theme_option('style_color'),20),$css);
                    }
                    
                    $css=str_replace('../../',get_template_directory_uri().'/',$css);
                    $css=str_replace("\n","",$css);
                    $css=str_replace("\r","",$css);
                }
                fclose($handle);
                                
                define("CUSTOM_CSS",$css);
            
            } else {
                if ($color_scheme){            
                   wp_enqueue_style('core',get_template_directory_uri().'/css/color-schemes/'.$color_scheme.'.css',array(),'1');
                } else {            
                   wp_enqueue_style('core',get_template_directory_uri().'/css/color-schemes/turquoise.css',array(),'1');
                }    
            }
            
            
            
        }
        
      
        //googlemaps disabled for now for faster loading
        wp_enqueue_script('googlemaps','http://maps.googleapis.com/maps/api/js?sensor=false',false,false,true);
        wp_enqueue_script('jquery-ui',get_template_directory_uri().'/js/jquery-ui-1.10.2.custom.js',array('jquery'),'1',true);
        wp_enqueue_script('easing',get_template_directory_uri().'/js/jquery.easing-1.3.min.js',array('jquery'),'1',true);
        wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js',false,'1',true);
        wp_enqueue_script('isotope',get_template_directory_uri().'/js/jquery.isotope.min.js',false,'1',true);
        wp_enqueue_script('flexslider',get_template_directory_uri().'/js/jquery.flexslider.js',array('jquery'),'1',true);
        wp_enqueue_script('elevatezoom',get_template_directory_uri().'/js/jquery.elevatezoom.js',array('jquery'),'1',true);
        wp_enqueue_script('sharrre',get_template_directory_uri().'/js/jquery.sharrre.js',array('jquery'),'1',true);        
        wp_enqueue_script('gmap3',get_template_directory_uri().'/js/jquery.gmap3.js',array('jquery'),'1',true);        
        wp_enqueue_script('imagesloaded',get_template_directory_uri().'/js/imagesloaded.js',array('jquery'),'1',true);
        wp_enqueue_script('matchheight',get_template_directory_uri().'/js/jquery.matchHeight-min.js',array('jquery'),'1',true);
        
        
        if (trim(theme_option('navigation_sticky'))){
            wp_enqueue_script('navigation_sticky',get_template_directory_uri().'/js/jquery.sticky-kit/jquery.sticky-kit.min.js',array('jquery'),'1',true);   
        }
        /*
        if (theme_option('shop_zoom')=='lightbox'){
            wp_enqueue_script('prettyphoto',get_template_directory_uri().'/js/prettyphoto/js/jquery.prettyPhoto.js',array('jquery'),'1',true);   
        }*/

        wp_enqueue_script('cookie',get_template_directory_uri().'/js/jquery.cookie.js',array('jquery'),'1',true);

        wp_enqueue_script('la_boutique',get_template_directory_uri().'/js/la_boutique.js',array('jquery'),'1',true);                

        
        
        wp_localize_script('la_boutique','laboutiqueAjax',array(
            // URL to wp-admin/admin-ajax.php to process the request
            //'site_url'=>get_site_url(),            
            'template_directory_uri'=>get_template_directory_uri(),
            'header_delay'=>theme_option('header_delay'),
            'header_animation'=>trim(theme_option('header_animation')),
            
            'header_arrows'=>trim((theme_option('header_arrows')) ? true : false),
            'header_pagination'=>(trim(theme_option('header_pagination')) ? true : false),
            'navigation_sticky'=>(trim(theme_option('navigation_sticky')) ? true : false),
            'ajaxurl'=>admin_url('admin-ajax.php'),
            // generate a nonce with a unique ID "laboutiqueajax-newsletter-subscribe-nonce"
            // so that you can check it later when an AJAX request is sent
            'newsletterSubscribeNonce'=>wp_create_nonce('newsletterSubscribeNonce'),
            
            'emailNotValid'=>__('Please check your email address', DOMAIN),
            'somethingWrong'=>__('Please report us about this problem.', DOMAIN),
            'newsletterOk'=>__('Thanks. You now set to recieve our newsletter.', DOMAIN),
            
            //comments validation
            'authorRequired'=>__('Author is required!', DOMAIN),
            'ratingRequired'=>__('Rating is required!', DOMAIN),
            'commentRequired'=>__('Comment is required!', DOMAIN),
            'shop_zoom'=>theme_option('shop_zoom'),
            'succesTitle'=>__("Success!",DOMAIN),
            'errorTitle'=>__("Something went wrong.",DOMAIN),
                )
        );
    }

    add_action('wp_enqueue_scripts','laboutique_scripts_styles');

    function laboutique_newsletter(){

        if (isset($_POST['subscriberEmail'])&&isset($_POST['newsletterSubscribeNonce'])){
            // get the submitted parameters
            $subscriberEmailValid=false;
            $subscriberEmail=$_POST['subscriberEmail'];
            $nonce=$_POST['newsletterSubscribeNonce'];

            $adminEmail=get_bloginfo('admin_email');
            $websiteName=get_bloginfo('name');

            if (is_email($subscriberEmail)){
                $subscriberEmailValid=true;
            }
   

            // check to see if the submitted nonce matches with the
            // generated nonce we created earlier
            if (wp_verify_nonce($nonce,'newsletterSubscribeNonce')==false){

                die('Busted!');
            } elseif (!$subscriberEmailValid){
                
                // generate the response
                $response=json_encode(array('success'=>false,'emailvalid'=>false));
            } else {

                $notificationsRecipient=theme_option('newsletter_custom_email');

                if (!$notificationsRecipient){
                    $to=$adminEmail;
                } else {
                    $to=$notificationsRecipient;
                }


                $subject=sprintf(__('New subscriber on %s website', DOMAIN),$websiteName);
                $body=sprintf(__('Hi, you have a visitor signed up for newsletter on %1$s website. New subscriber\'s email: %2$s', DOMAIN),$websiteName,$subscriberEmail);

                $mail=wp_mail($to,$subject,$body);


                if ($mail){
                    // generate the response
                    $response=json_encode(array('success'=>true,'emailvalid'=>true));
                } else {
                    // generate the response
                    $response=json_encode(array('success'=>false,'emailvalid'=>true));
                }
            }

            // response output
            header("Content-Type: application/json");
            echo $response;
        }
        exit;
    }

    add_action('wp_ajax_nopriv_laboutique_newsletter','laboutique_newsletter');
    add_action('wp_ajax_laboutique_newsletter','laboutique_newsletter');
    
    
    
    /**
    * ----------------------------------------------------------------------
    * Visual Editor Stylesheet
    */

    add_action( 'init', 'laboutique_add_editor_styles' );
    
    if ( ! function_exists( 'laboutique_add_editor_styles' ) ){
        function laboutique_add_editor_styles() {
            add_editor_style( 'editor-style.css' );
        }
    }


    if ( ! function_exists( 'laboutique_customformatTinyMCE' ) ){
	function laboutique_customformatTinyMCE($init) {
            if (array_key_exists('theme_advanced_buttons2',$init)){
                // add <hr> and removeformat button to the first line		
                $init['theme_advanced_buttons2'] = preg_replace('/(formatselect,)/', '', $init['theme_advanced_buttons2']);
            }

            return $init;
        }
    }
    add_filter('tiny_mce_before_init', 'laboutique_customformatTinyMCE' );


   // Create "Styles" drop-down
    add_filter( 'mce_buttons_2', 'laboutique_mce_editor_buttons' );
    if ( ! function_exists( 'laboutique_mce_editor_buttons' ) ):
            function laboutique_mce_editor_buttons( $buttons ) {
                            array_unshift( $buttons, 'styleselect' );
                            return $buttons;
            }
    endif; //function_exists

    if (!function_exists('laboutique_mce_before_init')):

        function laboutique_mce_before_init($settings){

            $style_formats=array(
                // array('title' => 'Red header', 'block' => 'h1', 'styles' => array('color' => '#ff0000')),
                array(
                    'title'=>'Paragraph',
                    'block'=>'p',
                ),
                array(
                    'title'=>'Lead paragraph',
                    'block'=>'p',
                    'classes'=>'lead',
                ),
                array(
                    'title'=>'Larger text size',
                    'inline'=>'span',
                    'classes'=>'larger',
                ),
                array(
                    'title'=>'Smaller text size',
                    'inline'=>'span',
                    'classes'=>'smaller',
                ),
                array(
                    'title'=>'Font weight: lighter',
                    'inline'=>'span',
                    'classes'=>'lighter',
                ),
                array(
                    'title'=>'Font weight: bolder',
                    'inline'=>'span',
                    'classes'=>'bolder',
                ),
                array(
                    'title'=>'Font weight: thin',
                    'inline'=>'span',
                    'classes'=>'thin',
                ),
                array(
                    'title'=>'Font weight: light',
                    'inline'=>'span',
                    'classes'=>'light',
                ),
                array(
                    'title'=>'Font weight: normal',
                    'inline'=>'span',
                    'classes'=>'normal',
                ),
                array(
                    'title'=>'Font weight: bold',
                    'inline'=>'span',
                    'classes'=>'bold',
                ),
                array(
                    'title'=>'With colored line',
                    'inline'=>'span',
                    'classes'=>'wpb_heading',
                ),
                array(
                    'title'=>'Uppercase',
                    'inline'=>'span',
                    'classes'=>'uppercase',
                ),
                array(
                    'title'=>'Margin top: 0',
                    'inline'=>'span',
                    'classes'=>'mt_0',
                ),
                array(
                    'title'=>'Margin bottom: 0',
                    'inline'=>'span',
                    'classes'=>'mb_0',
                ),
                array(
                    'title'=>'Header 2',
                    'block'=>'h2',
                ),
                array(
                    'title'=>'Header 3',
                    'block'=>'h3',
                ),
                array(
                    'title'=>'Header 4',
                    'block'=>'h4',
                ),
                array(
                    'title'=>'Header 5',
                    'block'=>'h5',
                ),
                array(
                    'title'=>'Header 6',
                    'block'=>'h6',
                ),
                array(
                    'title'=>'Font-size: h1+',
                    'inline'=>'span',
                    'classes'=>'h0',
                ),
                array(
                    'title'=>'Font-size: h1',
                    'inline'=>'h1',
                   // 'classes'=>'h1',
                ),
                array(
                    'title'=>'Font-size: h2',
                    'inline'=>'span',
                    'classes'=>'h2',
                ),
                array(
                    'title'=>'Font-size: h3',
                    'inline'=>'span',
                    'classes'=>'h3',
                ),
                array(
                    'title'=>'Font-size: h4',
                    'inline'=>'span',
                    'classes'=>'h4',
                ),
            );

            $settings['style_formats']=json_encode($style_formats);

            return $settings;
        }

    endif; //function_exists
    
    // Add styles/classes to the "Styles" drop-down
    add_filter('tiny_mce_before_init','laboutique_mce_before_init');

    function laboutique_twitter_feed(){

        $twitteruser=theme_option('twitter_username');
        $notweets=3;
        $consumerkey=theme_option('twitter_consumer_key');
        $consumersecret=theme_option('twitter_consumer_secret');
        $accesstoken=theme_option('twitter_user_token');
        $accesstokensecret=theme_option('twitter_user_secret');

        if ($twitteruser&&$consumerkey&&$consumersecret&&$accesstoken&&$accesstokensecret){

            $connection=new TwitterOAuth($consumerkey,$consumersecret,$accesstoken,$accesstokensecret);

            $tweets=$connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

            $t=new stdClass();
            $t->response=new stdClass();
            $t->response->statuses=$tweets;

            header("Content-Type: application/json");
            echo json_encode($t);
            exit;
        }
    }

    add_action('wp_ajax_nopriv_laboutique_twitter_feed','laboutique_twitter_feed');
    add_action('wp_ajax_laboutique_twitter_feed','laboutique_twitter_feed');

    function laboutique_search_products(){

        $args=array('post_type'=>'product','s'=>$_POST['s']);
        $loop=new WP_Query($args);

        $output=array();


        while ($loop->have_posts()) : $loop->the_post();


            $output[]=array(
                'title'=>get_the_title(),
                'thumbnail'=>get_the_post_thumbnail(get_the_ID(),'shop_thumbnail'),
                'url'=>get_permalink(get_the_ID())
            );

        endwhile;

        wp_reset_query();

        header("Content-Type: application/json");
        echo json_encode($output);
        exit;
    }

    add_action('wp_ajax_nopriv_laboutique_search_products','laboutique_search_products');
    add_action('wp_ajax_laboutique_search_products','laboutique_search_products');

    /**
     * Register two widget areas.
     *
     * @since La Boutique 1.1
     *
     * @return void
     */
    function laboutique_widgets_init(){

        register_sidebar(array(
            'name'=>__('Home page sidebar', DOMAIN),
            'id'=>'sidebar-4',
            'description'=>__('Appears on home page.', DOMAIN),
            'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
            'after_widget'=>'</aside>',
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>',
        ));
        
        register_sidebar(array(
            'name'=>__('Shop sidebar', DOMAIN),
            'id'=>'sidebar-3',
            'description'=>__('Appears in product category pages.', DOMAIN),
            'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
            'after_widget'=>'</aside>',
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>',
        ));

        register_sidebar(array(
            'name'=>__('Posts sidebar', DOMAIN),
            'id'=>'sidebar-2',
            'description'=>__('Appears on posts and pages in the sidebar.', DOMAIN),
            'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
            'after_widget'=>'</aside>',
            'before_title'=>'<h3 class="widget-title">',
            'after_title'=>'</h3>',
        ));

        
        
        register_sidebar(array(
            'name'=>__('Footer - column 1', DOMAIN),
            'id'=>'footer-1',
            'description'=>__('Appears in footer on all pages.', DOMAIN),
            'before_widget'=>'<div id="%1$s" class="footer_widget footer_widget_%2$s">',
            'after_widget'=>'</div>',
            'before_title'=>'<h6>',
            'after_title'=>'</h6>',
        ));
        
        register_sidebar(array(
            'name'=>__('Footer - column 2', DOMAIN),
            'id'=>'footer-2',
            'description'=>__('Appears in footer on all pages.', DOMAIN),
            'before_widget'=>'<div id="%1$s" class="footer_widget footer_widget_%2$s">',
            'after_widget'=>'</div>',
            'before_title'=>'<h6>',
            'after_title'=>'</h6>',
        ));
        
        register_sidebar(array(
            'name'=>__('Footer - column 3', DOMAIN),
            'id'=>'footer-3',
            'description'=>__('Appears in footer on all pages.', DOMAIN),
            'before_widget'=>'<div id="%1$s" class="footer_widget footer_widget_%2$s">',
            'after_widget'=>'</div>',
            'before_title'=>'<h6>',
            'after_title'=>'</h6>',
        ));
        
        register_sidebar(array(
            'name'=>__('Footer - column 4', DOMAIN),
            'id'=>'footer-4',
            'description'=>__('Appears in footer on all pages.', DOMAIN),
            'before_widget'=>'<div id="%1$s" class="footer_widget footer_widget_%2$s">',
            'after_widget'=>'</div>',
            'before_title'=>'<h6>',
            'after_title'=>'</h6>',
        ));
        
    }

    add_action('widgets_init','laboutique_widgets_init');
    /*
    function override_wordpress_widgets(){
        // Ensure our parent class exists to avoid fatal error
        if (class_exists('WP_Widget_Recent_Comments')){            
            if (file_exists(get_template_directory().'/framework/widgets/widget-recent-comments.php')){
                include_once( get_template_directory().'/framework/widgets/widget-recent-comments.php' );
                register_widget('Custom_WP_Widget_Recent_Comments');
            }           
        }
    }
    add_action('widgets_init','override_wordpress_widgets',17);*/
    
    if (file_exists(get_template_directory().'/framework/widgets/widget-newsletter.php')){
        include_once(get_template_directory().'/framework/widgets/widget-newsletter.php' );
    }
    
    if (file_exists(get_template_directory().'/framework/widgets/widget-social.php')){
        include_once(get_template_directory().'/framework/widgets/widget-social.php' );
    }
    
    if (file_exists(get_template_directory().'/framework/widgets/widget-woocommerce-subcategories.php')){        
        include_once(get_template_directory().'/framework/widgets/widget-woocommerce-subcategories.php' );
    }

    if (!function_exists('laboutique_header')) :
        function laboutique_header($args=array()){
            $header=theme_option('header');

            $slides=array();


            if ($header){
                foreach ($header as $k_header_record=> $header_record){
                    $slide=array();

                    foreach (array('header_image','header_title','header_subtitle','header_button_text','header_button_text_url','header_button_secondary_text','header_button_secondary_text_url','header_text_position') as $k=> $v){
                        $value=theme_option($v);
                        $slide[$v]=$value[$k_header_record];
                    }

                    $slides[]=$slide;
                }
            }


            if ($slides){
                echo '
                <!-- Slider -->
                <section class="flexslider">
                    <ul class="slides">';

                foreach ($slides as $slide){
                    if ($slide['header_image']['url']){
                        echo '<li>
                            <img src="'.esc_url($slide['header_image']['url']).'" alt="'.esc_attr($slide['header_title']).'" />
                            <div class="container">
                                <div class="caption">
                                    <div class="row">
                                        <div class="span8';
                        
          
                        if ($slide['header_text_position']=='2')
                            echo ' offset4 text-right';

                        echo '">';

                        if (trim($slide['header_title'])){
                            echo '<h3';
                            
                            if (!trim($slide['header_subtitle'])){
                                echo ' class="standalone"';
                            }
                            
                            echo '>'.$slide['header_title'].'</h3><br />';
                        }

                        if (trim($slide['header_subtitle'])){
                            echo '<p>'.$slide['header_subtitle'].'</p><br />';
                        }

                        if (trim($slide['header_button_secondary_text']))
                            echo '<a class="btn btn-small" title="'.esc_attr($slide['header_button_secondary_text']).'" href="'.esc_url($slide['header_button_secondary_text_url']).'">'.$slide['header_button_secondary_text'].'</a> ';

                        if (trim($slide['header_button_text']))
                            echo '<a class="btn btn-primary btn-small" title="'.esc_attr($slide['header_button_text']).'" href="'.esc_url($slide['header_button_text_url']).'">'.$slide['header_button_text'].' &nbsp; <em class="icon-chevron-right"></em></a>';

                        echo '</div></div>
                                </div>
                            </div>
                        </li>';
                    }
                }

                echo '</ul>
                </section>
                <!-- End class="flexslider" -->';
            }
        }

    endif;









    if (!function_exists('laboutique_social_icons')) :

        /**
         * Display social icons.
         *
         * @since La Boutique 1.1
         *
         * @return void
         */
        function laboutique_social_icons($args=array()){



            $output='';

            foreach (array('Twitter','Facebook','Pinterest','YouTube','Vimeo','Flickr','Google+','Dribbble','Forrst','Tumblr','Digg','Linkedin','Instagram') as $k=> $v){
                $option_id=str_replace("+","plus",str_replace(" ","_",strtolower($v)));


                $option_value=theme_option($option_id);

                if ($option_value){
                    $output.='<li>
                         <a class="'.$option_id.'" href="'.$option_value.'" target="_blank" title="'.$v.'">'.$v.'</a>								
                     </li>';
                }
            }


            if ($output){
                $list='<ul';

                if ($args['class']){
                    $list.=' class="'.$args['class'].'"';
                }

                $list.='>';

                return $list.$output.'</ul>';
            }
            
    
        }

    endif;


    if (!function_exists('laboutique_paging_nav')) :

        /**
         * Display navigation to next/previous set of posts when applicable.
         *
         * @since La Boutique 1.1
         *
         * @return void
         */
        function laboutique_paging_nav(){
            global $wp_query;
            
            // Don't print empty markup if there's only one page.
            if ($wp_query->max_num_pages<2)
                return;
            ?>
                <nav class="paging-navigation" role="navigation">

                    <div class="nav-links">

                <?php if (get_next_posts_link()) :?>
                            <div class="nav-previous"><?php next_posts_link(__('Load more', DOMAIN));?></div>
                <?php endif;?>

                <?php if (get_previous_posts_link()) :?>
                            <div class="nav-next"><?php previous_posts_link(__('Newer posts', DOMAIN));?></div>
                <?php endif;?>

                    </div><!-- .nav-links -->
                </nav><!-- .navigation -->
            <?php
        }

    endif;

    if (!function_exists('laboutique_post_nav')) :

        /**
         * Display navigation to next/previous post when applicable.
         *
         * @since La Boutique 1.1
         *
         * @return void
         */
        function laboutique_post_nav(){
            global $post;

            // Don't print empty markup if there's nowhere to navigate.
            $previous=( is_attachment() ) ? get_post($post->post_parent) : get_adjacent_post(false,'',true);
            $next=get_adjacent_post(false,'',false);

            if (!$next&&!$previous)
                return;
            ?>

                <?php previous_post_link('%link',_x('Previous post','Previous post link', DOMAIN));?>
                <?php next_post_link('%link',_x('Next post','Next post link', DOMAIN));?>

                <?php
            }

        endif;

        if (!function_exists('laboutique_entry_meta')) :

            /**
             * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
             *
             * Create your own laboutique_entry_meta() to override in a child theme.
             *
             * @since La Boutique 1.1
             *
             * @return void
             */
            function laboutique_entry_meta(){
                // Post author
                if ('post'==get_post_type()){
                    echo '<li><i class="icon-user"></i> &nbsp; ';
                    echo get_the_author();
                    echo '</li>';
                }



                if (!has_post_format('link')&&'post'==get_post_type()){
                    echo '<li><i class="icon-calendar"></i> &nbsp; ';
                    laboutique_entry_date();
                    echo '</li>';
                }
            }

        endif;

        if (!function_exists('laboutique_entry_date')) :

            function laboutique_entry_date($echo=true){
                if (has_post_format(array('chat','status')))
                    $format_prefix=_x('%1$s on %2$s','1: post format name. 2: date', DOMAIN);
                else
                    $format_prefix='%2$s';
          
                $date=esc_html(sprintf($format_prefix,get_post_format_string(get_post_format()),get_the_date()));

                if ($echo)
                    echo $date;

                return $date;
            }

        endif;

        if (!function_exists('laboutique_the_attached_image')) :

            /**
             * Print the attached image with a link to the next attached image.
             *
             * @since La Boutique 1.1
             *
             * @return void
             */
            function laboutique_the_attached_image(){
                /**
                 * Filter the image attachment size to use.
                 *
                 * @since La Boutique 1.1
                 *
                 * @param array $size {
                 *     @type int The attachment height in pixels.
                 *     @type int The attachment width in pixels.
                 * }
                 */
                $attachment_size=apply_filters('laboutique_attachment_size',array(724,724));
                $next_attachment_url=wp_get_attachment_url();
                $post=get_post();

                /*
                 * Grab the IDs of all the image attachments in a gallery so we can get the URL
                 * of the next adjacent image in a gallery, or the first image (if we're
                 * looking at the last image in a gallery), or, in a gallery of one, just the
                 * link to that image file.
                 */
                $attachment_ids=get_posts(array(
                    'post_parent'=>$post->post_parent,
                    'fields'=>'ids',
                    'numberposts'=>-1,
                    'post_status'=>'inherit',
                    'post_type'=>'attachment',
                    'post_mime_type'=>'image',
                    'order'=>'ASC',
                    'orderby'=>'menu_order ID'
                ));

                // If there is more than 1 attachment in a gallery...
                if (count($attachment_ids)>1){
                    foreach ($attachment_ids as $attachment_id){
                        if ($attachment_id==$post->ID){
                            $next_id=current($attachment_ids);
                            break;
                        }
                    }

                    // get the URL of the next image attachment...
                    if ($next_id)
                        $next_attachment_url=get_attachment_link($next_id);

                    // or get the URL of the first image attachment.
                    else
                        $next_attachment_url=get_attachment_link(array_shift($attachment_ids));
                }

                printf('<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',esc_url($next_attachment_url),the_title_attribute(array('echo'=>false)),wp_get_attachment_image($post->ID,$attachment_size)
                );
            }

        endif;

        /**
         * Return the post URL.
         *
         * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
         * the first link found in the post content.
         *
         * Falls back to the post permalink if no URL is found in the post.
         *
         * @since La Boutique 1.1
         *
         * @return string The Link format URL.
         */
        function laboutique_get_link_url(){
            $content=get_the_content();
            $has_url=get_url_in_content($content);

            return ( $has_url ) ? $has_url : apply_filters('the_permalink',get_permalink());
        }

        /**
         * Enqueue Javascript postMessage handlers for the Customizer.
         *
         * Binds JavaScript handlers to make the Customizer preview
         * reload changes asynchronously.
         *
         * @since La Boutique 1.1
         *
         * @return void
         */
        function laboutique_customize_preview_js(){
            wp_enqueue_script('laboutique-customizer',get_template_directory_uri().'/js/theme-customizer.js',array('customize-preview'),'20130226',true);
        }

        add_action('customize_preview_init','laboutique_customize_preview_js');



        //widget shortcodes
        function widget($atts){

            global $wp_widget_factory;

            extract(shortcode_atts(array(
                'widget_name'=>FALSE
                            ),$atts));

            $widget_name=esc_html($widget_name);

            if (!is_a($wp_widget_factory->widgets[$widget_name],'WP_Widget')):
                $wp_class='WP_Widget_'.ucwords(strtolower($class));

                if (!is_a($wp_widget_factory->widgets[$wp_class],'WP_Widget')):
                    return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct",DOMAIN),'<strong>'.$class.'</strong>').'</p>';
                else:
                    $class=$wp_class;
                endif;
            endif;

            ob_start();
            the_widget($widget_name,array(),array(                
                'before_widget'=>'',
                'after_widget'=>'',
                'before_title'=>'',
                'after_title'=>''
            ));
            $output=ob_get_contents();
            ob_end_clean();
            return $output;
        }

        add_shortcode('widget','widget');
    
        
        function laboutique_adminscripts(){            
            wp_enqueue_style('laboutique_adminstyles',get_template_directory_uri().'/css/adminstyle.css');  
            wp_enqueue_script('options',get_template_directory_uri().'/framework/options/options.js',array('jquery'),'100',true);                
        }

        add_action('admin_enqueue_scripts','laboutique_adminscripts');
    