<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage La_Boutique
 * @since La Boutique 1.1
 */
if (DEBUG_INFO) {
	echo "\n<!-- FILE: /footer.php ================================================================= -->\n";
}
?>

    </section>

    <?php if (theme_option('twitter_publish')){?>
    <!-- Twitter bar -->
    <div class="twitter-bar">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="icon">
                        <i class="icon-twitter"></i>
                    </div>
                    <div id="tweets">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End class="twitter-bar" -->
    <?php } ?>
    
    
    <?php if (theme_option('footer_publish')){?>
    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">	
                
                <?php if (theme_option('footer_layout')=='footer-columns-1'){?>
                <div class="span12">
                    <?php dynamic_sidebar('footer-1'); ?>      
                </div>
                <?php } else if (theme_option('footer_layout')=='footer-columns-2'){?>
                <div class="span6">
                    <?php dynamic_sidebar('footer-1'); ?>      
                </div>
                <div class="span6">
                    <?php dynamic_sidebar('footer-2'); ?>      
                </div>
                <?php } else if (theme_option('footer_layout')=='footer-columns-2-alt1'){?>
                <div class="span9">
                    <?php dynamic_sidebar('footer-1'); ?>      
                </div>
                <div class="span3">
                    <?php dynamic_sidebar('footer-2'); ?>      
                </div>
                <?php } else if (theme_option('footer_layout')=='footer-columns-2-alt2'){?>
                <div class="span3">
                    <?php dynamic_sidebar('footer-1'); ?>      
                </div>
                <div class="span9">
                    <?php dynamic_sidebar('footer-2'); ?>      
                </div>
                <?php } else if (theme_option('footer_layout')=='footer-columns-3'){?>
                <div class="span4">
                    <?php dynamic_sidebar('footer-1'); ?>      
                </div>
                <div class="span4">
                    <?php dynamic_sidebar('footer-2'); ?>      
                </div>
                <div class="span4">
                    <?php dynamic_sidebar('footer-3'); ?>      
                </div>
                <?php } else if (theme_option('footer_layout')=='footer-columns-3-alt1'){?>
                <div class="span3">
                    <?php dynamic_sidebar('footer-1'); ?>      
                </div>
                <div class="span3">
                    <?php dynamic_sidebar('footer-2'); ?> 
                </div>
                <div class="span6">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
                <?php } else if (theme_option('footer_layout')=='footer-columns-3-alt2'){?>
                <div class="span6">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
                <div class="span3">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
                <div class="span3">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
                <?php } else if (theme_option('footer_layout')=='footer-columns-4'){?>
                <div class="span3">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
                <div class="span3">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
                <div class="span3">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
                <div class="span3">
                    <?php dynamic_sidebar('footer-4'); ?>
                </div>
                <?php } else if (theme_option('footer_layout')=='footer-columns-4-alt1'){?>
                <div class="span2">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
                <div class="span2">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
                <div class="span4">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
                <div class="span4">
                    <?php dynamic_sidebar('footer-4'); ?>
                </div>
                <?php } ?>
         
            </div>
        </div>
    </div>
    <!-- End id="footer" -->
    <?php } ?>
    
    
    <?php if (theme_option('footer_copy_publish')){?>
    <!-- Credits bar -->
    <div class="credits">
        <div class="container">
            <div class="row">
                <div class="span8">                    
                    <p><?php echo theme_option('footer_copy_left'); ?></p>
                </div>
                <div class="span4 text-right hidden-phone">
                    <p><?php echo theme_option('footer_copy_right'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End class="credits" -->
    <?php } ?>
        
    <!-- Options panel -->                  
    <!-- end class="wrapper"-->
    </div>	
    <?php if (theme_option('advanced_script')){?>    
        <?php echo theme_option('advanced_script')?>    
    <?php } ?>
    <?php if (constant('THEME_COLORS')){?>
    <!-- Options panel -->
    <div class="options-panel">
        <div class="options-panel-content">

            <div class="row-fluid">
                <div class="span12">

                    <h5><?php echo __("Color scheme")?></h5>
                    <ul class="controls">


                            <li class="turquoise"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/turquoise.css">Turquoise</a>
                            <li class="greensea"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/greensea.css">Green sea</a>
                            <li class="emerland"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/emerland.css">Emerland</a>
                            <li class="nephritis"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/nephritis.css">Nephritis</a>
                            <li class="peterriver"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/peterriver.css">Peter river</a>
                            <li class="belizehole"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/belizehole.css">Belizehole</a>
                            <li class="amethyst"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/amethyst.css">Amethyst</a>
                            <li class="wisteria"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/wisteria.css">Wisteria</a>
                            <li class="wetasphalt"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/wetasphalt.css">Wet asphalt</a>
                            <li class="midnightblue"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/midnightblue.css">Midnight blue</a>
                            <li class="sunflower"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/sunflower.css">Sunflower</a>
                            <li class="orange"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/orange.css">Orange</a>
                            <li class="carrot"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/carrot.css">Carrot</a>
                            <li class="pumpkin"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/pumpkin.css">Pumpkin</a>
                            <li class="alizarin"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/alizarin.css">Alizarin</a>
                            <li class="pomegranate"><a href="#<?php echo get_template_directory_uri()?>/css/color-schemes/pomegranate.css">Pomegranate</a>
                    </ul>
                        
                    
                    <h5><?php echo __("Background")?></h5>
                    <ul class="controls-background">
                        <li class="default"><a href="#f0f0f0"></a></li>                            
                        <li class="dark10"><a href="#e5e5e5"></a></li>                            
                        <li class="dark20"><a href="#cccccc"></a></li>                            
                        <li class="dark30"><a href="#b2b2b2"></a></li>                            
                        <li class="dark40"><a href="#999999"></a></li>                            
                        <li class="dark50"><a href="#7f7f7f"></a></li>                            
                        <li class="dark60"><a href="#666666"></a></li>                            
                        <li class="dark70"><a href="#4c4c4c"></a></li>                            
                                                                                                                                                          
                    </ul>
                    
                    <p><?php echo __("Custom colors are supported through theme options.")?></p>
                </div>
            </div>

        </div>

        <div class="options-panel-toggle">
            <a href="#" title=""><span></span></a>
        </div>
    </div>
    <!-- End class="options-panel" -->
    <?php } ?>
    <?php wp_footer(); ?>
</body>
</html>