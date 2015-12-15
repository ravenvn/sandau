<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage La_Boutique
 * @since La Boutique 1.1
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" dir="ltr">
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="author" content="La Boutique theme v1.5" />
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">  
        <link rel="icon" href="favicon.ico" type="image/x-icon" />                	        
        <?php if (theme_option('favicon')){?>
        <?php $favicon=theme_option('favicon');?>
        <link rel="shortcut icon" href="<?php echo esc_url($favicon['url']); ?>" type="image/x-icon" />
        <?php } ?>
        <?php wp_head(); ?>
        <?php if (constant('LESS_CSS')){?>
        <?php 
            if (theme_option('color_scheme')){
                $color_scheme=theme_option('color_scheme');
            } else {
                $color_scheme=theme_option('turquoise');
            }
        ?>
        <link rel="stylesheet/less" type="text/css" href="<?php get_stylesheet_directory_uri(); ?>/css/less/<?php echo $color_scheme?>.less" id="color_scheme" >
        <script src="<?php get_stylesheet_directory_uri(); ?>/js/less.js" type="text/javascript"></script>
        <?php } ?>
        <?php 
            if (constant('THEME_COLORS')){
                echo "<link rel='stylesheet' id='core-theme-css'  href='' type='text/css' media='all' />";
            }
        ?>

        
        <style>      
            <?php
                if (defined('CUSTOM_CSS')){
                    if (constant('CUSTOM_CSS')){
                        echo CUSTOM_CSS;
                    }
                }
            ?>

            <?php                
                //Array ( [font-family] => Finger Paint [google] => true [font-weight] => 400 [font-style] => [subsets] => latin [font-size] => 12px [line-height] => 55px [color] => #1f1daa ) 1
                if (theme_option('style_font') && theme_option('style_font_switch')){                    
                    $style_font=theme_option('style_font');
                     
                    if ($style_font['font-family']){
                        echo 'h1,h2,h3,h4,h5,h6{font-family: '.$style_font['font-family'].';}';
                    }
                }  
            ?>
            <?php                
                //Array ( [font-family] => Finger Paint [google] => true [font-weight] => 400 [font-style] => [subsets] => latin [font-size] => 12px [line-height] => 55px [color] => #1f1daa ) 1
                if (theme_option('style_font_body') && theme_option('style_font_body_switch')){                    
                    $style_font_body=theme_option('style_font_body');
                    
                    if ($style_font_body['font-family']){
                        echo '.order_details #place_order, #order_review #place_order,.wpb_button, .btn,a.button,.widget_shopping_cart .buttons a,.box .form-submit a, .box .box-footer a,.entry-content input[type="submit"],body,html{font-family: '.$style_font_body['font-family'].';}';
                    }
                }  
            ?>
            <?php if (theme_option('style_background_color')){?>
            body{background-color: <?php echo theme_option('style_background_color')?>;}
            <?php } else if ($_COOKIE['core-backgroundcolor'] && constant('THEME_COLORS')){?>
            body{background-color:<?php echo $_COOKIE['core-backgroundcolor']?>;}           
            <?php } ?>
            <?php 
                if (theme_option('style_background_image')){
                    $style_background_image=theme_option('style_background_image');
                    
                    if ($style_background_image['url']){
            ?>
            .main{                
                background-image:url('<?php echo $style_background_image['url']?>');
                <?php if (theme_option('style_background_image_repeat')){?>
                background-repeat: <?php echo theme_option('style_background_image_repeat');?>;
                <?php } ?>
                <?php if (theme_option('style_background_image_position_horizontal') && theme_option('style_background_image_position_vertical')){?>
                background-position: <?php echo theme_option('style_background_image_position_horizontal');?> <?php echo theme_option('style_background_image_position_vertical');?>;
                <?php } ?>
                <?php if (theme_option('style_background_image_attachment')){?>
                background-attachment: <?php echo theme_option('style_background_image_attachment');?>;
                <?php } ?>
            }
            <?php } ?>
            <?php } ?>
            <?php if (theme_option('advanced_css')){?>
                <?php echo theme_option('advanced_css')?>
            <?php } ?>
        </style>
</head>

<body <?php body_class(); ?>>            
<div class="wrapper<?php if (theme_option('style_layout')=='boxed'){?> boxed<?php } ?>">
    <div class="header_wrapper">
        <!-- Header -->
        <div class="header">
            <?php if (theme_option('top_bar_publish')){?>
            <!-- Top bar -->
            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="span6 hidden-phone">
                            <p>
                                <?php if (theme_option('top_language_switcher')=='left'){?>
                                    <?php do_action('icl_language_selector'); ?>
                                <?php } ?>
                                <?php echo __(theme_option('top_left'),DOMAIN); ?>
                            </p>
                        </div>

                        <div class="span6">
                            <?php if (theme_option('top_right')){?>
                                <?php laboutique_my_account_nav(array(
                                    'class'=>'inline pull-right'
                                )); ?>     
                            <?php } ?>
                            <?php if (theme_option('top_language_switcher')=='right'){?>
                                <span class="pull-right">                            
                                    <?php do_action('icl_language_selector'); ?>                            
                                </span>
                            <?php } ?>        
                        </div>                                        
                    </div>
                </div>
            </div>
            <!-- End class="top" -->
            <?php } ?>

            <!-- Logo & Search bar -->
            <div class="bottom">
                <div class="container<?php if (!theme_option('header_bar_search_publish')){?> search_disabled<?php } ?>">
                    <div class="row">
                        <div class="span8">							
                            <div class="logo">
                                <a href="<?php echo home_url();?>" title="<?php echo esc_attr(theme_option('header_bar_logo_title'))?>">
                                    <?php if (theme_option('header_bar_logo_retina') || theme_option('header_bar_logo')){?>
                                    <img style="<?php if (theme_option('header_bar_logo_margin')){?>margin-top: <?php echo theme_option('header_bar_logo_margin')?>px;<?php } ?> <?php if (theme_option('header_bar_logo_width')){?>width: <?php echo theme_option('header_bar_logo_width')?>px;<?php } ?> " src="<?php if (theme_option('header_bar_logo_retina')){?><?php $url=theme_option('header_bar_logo_retina'); ?><?php } else {?><?php $url=theme_option('header_bar_logo')?><?php } ?><?php echo $url['url'];?>" alt="<?php echo esc_attr(theme_option('header_bar_logo_alt'))?>" />
                                    <?php } ?>
                                </a>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="row-fluid">

                                <div class="<?php if (theme_option('header_bar_search_publish')){?> span8 offset2<?php } else {?>span10<?php } ?>">
                                    <?php if (theme_option('header_bar_search_publish')){?>
                                    <!-- Search -->
                                    <div class="search">
                                        <div class="qs_s">

                                            <form method="get" action="<?php echo home_url();?>" role="search">
                                                <input type="text" name="s" id="query" placeholder="<?php echo esc_attr(__('Search',DOMAIN))?>&hellip;" autocomplete="off" value="">
                                                <input type="submit" value="<?php echo esc_attr(__('Search',DOMAIN))?>" id="searchsubmit">
                                                <input type="hidden" value="product" name="post_type">
                                            </form>

                                            <!-- Autocomplete results -->
                                            <div id="autocomplete-results" >	

                                            </div>
                                            <!-- End id="autocomplete-results" -->



                                        </div>
                                    </div>
                                    <!-- End class="search"-->
                                    <?php } ?>
                                </div>



                                <div class="span2">                                
                                    <?php 
                                        laboutique_mini_cart();    
                                    ?>                                
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- End class="bottom" -->


        </div>
        <!-- End class="header" -->



        <!-- Navigation -->
        <nav class="navigation visible-desktop">
            <div class="container">

                <div class="row">
                    <div class="span8">
                        <a href="#" class="main-menu-button"><?php echo __('Navigation', DOMAIN);?></a>
                        <!-- Begin Menu Container -->
                        <div class="megamenu_container">
                       <?php wp_nav_menu( array(
                           'theme_location'=>'primary',
                           'menu_class'=>'main-menu',
                           'depth'=>0,
                           'fallback_cb'=>'false',
                           /*'walker'=> new lbmn_walker( array(
                                'item_type'	=> 'li'
                            )),*/ 
                       ));?>
                        </div>

                    </div>

                    <div class="span4">      
                        <?php 
                            if (function_exists('woocommerce_get_template') && $_SERVER['REQUEST_URI'] && $_SERVER['REQUEST_URI']!='/'){
                                
                                woocommerce_get_template( 'global/breadcrumb.php' );    
                            }
                        ?>


                    </div>
                </div>        

            </div>
        </nav>
        <nav class="navigation hidden-desktop">
            <div class="container">

                <div class="row">
                    <div class="span12">
                        <a href="#" class="main-menu-button"><?php echo __('Navigation', DOMAIN);?></a>
                        <!-- Begin Menu Container -->
                        <div class="megamenu_container">
                       <?php wp_nav_menu( array(
                           'theme_location'=>'mobile',
                           'menu_class'=>'main-menu',
                           'depth'=>0,
                           'fallback_cb'=>'false',

                       ));?>
                        </div>

                    </div>
                </div>        

            </div>
        </nav>
        <!-- End class="navigation" -->
    </div>
    
    <!-- Content section -->		
    <section class="main">