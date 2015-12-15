<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage La_Boutique
 * @since La Boutique 1.1
 */
if (DEBUG_INFO) {
	echo "\n<!-- FILE: /page.php ================================================================= -->\n";
}
get_header(); ?>
<?php
    $woo_page_ids=array();
    
    $unstyled=array(
        'woocommerce_shop_page_id',
        'woocommerce_cart_page_id',
        'woocommerce_checkout_page_id',
        'woocommerce_pay_page_id',
        'woocommerce_lost_password_page_id',      
        'woocommerce_change_password_page_id',
        'woocommerce_logout_page_id'
    );
    
    if (!is_user_logged_in() ){
        $unstyled[]='woocommerce_myaccount_page_id';
    }
    
    foreach($unstyled as $k=>$v){
        
        if ($id=get_option($v)){                                                
            $woo_page_ids[]=$id;
        }
        
        if ($wp_query->post->ID==$id){
            $$v=1;
        }
        
    }


    //check if this is woocommerce page
    $is_woocommerce=false;
    
    foreach(array('[woocommerce_my_account]','[woocommerce_checkout]') as $k=>$v){
        if (!empty($wp_query->post)){
            if (!empty($wp_query->post->post_content)){
                if (strpos($v,$wp_query->post->post_content)!==false){
                    $is_woocommerce=true;
                }
            }
        }
    }
    
    
    $hide_sidebar=false;
    
    if ( function_exists('rwmb_meta') ) {
        // Get 'hide sidebar' metabox value
        $hide_sidebar = rwmb_meta( 'laboutique_page_sidebar_settings', 'type=checkbox_list' );
    }
    
    if (trim(theme_option('staticpages_sidebar'))){
        $hide_sidebar=true;
    }

    
?>
<?php if (in_array($wp_query->post->ID,$woo_page_ids)){ ?>
    <?php /* The loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>                
            <?php the_content(); ?>                
        <?php endwhile; ?>
<?php } else {?>
<!-- Static page 1 -->
<section class="static_page_1">


    <div class="container">
        <div class="row">
            <div class="span12">
                <section class="static-page">
                    <div class="row-fluid">
                        <?php if (!$hide_sidebar){?>
                        <div class="span3 visible-desktop hidden-phone hidden-table">
                            <?php if ($is_woocommerce && is_user_logged_in()){?>
                                <?php laboutique_my_account_sidebar_nav(array(
                                    'class'=>'nav nav-tabs nav-stacked',
                                ))?>
                            <?php } else {?>
                                <?php wp_nav_menu( array(
                                    'theme_location'=>'pages_sidebar',
                                    'menu_class'=>'nav nav-tabs nav-stacked',
                                    'fallback_cb'=>'false'                               
                                ));?>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="<?php if (!$hide_sidebar){?>span9<?php } else {?>span12<?php } ?>">
                            <div class="content">


                                <div id="content" class="site-content" role="main">                                    

                                        <?php /* The loop */ ?>
                                        <?php while ( have_posts() ) : the_post(); ?>

                                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                                    <header class="entry-header">
                                                            <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                                                            <div class="entry-thumbnail">
                                                                    <?php the_post_thumbnail(); ?>
                                                            </div>
                                                            <?php endif; ?>

                                                        <?php
                                                            
                                                            if ( function_exists('rwmb_meta') ) {
                                                                    // Get 'Diable page title' metabox value
                                                                    $title_settings = rwmb_meta( 'laboutique_page_title_settings', 'type=checkbox_list' );
                                                            } else {
                                                                    $title_settings = '';
                                                            }
                                                                                                  
                                                        ?>
                                                            <?php if (!$title_settings){?>
                                                            <h1 class="entry-title"><?php the_title(); ?></h1>
                                                            <?php } ?>
                                                    </header><!-- .entry-header -->

                                                    <div class="entry-content">
                                                            <?php the_content(); ?>
                                                            <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', DOMAIN ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                                                    </div><!-- .entry-content -->

                                                    <footer class="entry-meta">
                                                            <?php the_tags();?>
                                                            <?php edit_post_link( __( 'Edit', DOMAIN ), '<span class="edit-link">', '</span>' ); ?>
                                                    </footer><!-- .entry-meta -->

                                                </article><!-- #post -->

                                                
                                        <?php endwhile; ?>

                                </div><!-- #content -->					


                            </div>
                        </div>
                        <?php if (!$hide_sidebar){?>
                        <div class="span3 hidden-desktop visible-phone visible-tablet">
                           <?php if ($is_woocommerce && is_user_logged_in()){?>
                                <?php laboutique_my_account_sidebar_nav(array(
                                    'class'=>'nav nav-tabs nav-stacked',
                                ))?>
                            <?php } else {?>
                                <?php wp_nav_menu( array(
                                    'theme_location'=>'pages_sidebar',
                                    'menu_class'=>'nav nav-tabs nav-stacked',
                                    'fallback_cb'=>'false'                               
                                ));?>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </section>
            </div>
        </div>
    </div>


</section>    
<!-- End Static page 1 -->
<?php } ?>  


<?php //get_sidebar(); ?>
<?php get_footer(); ?>