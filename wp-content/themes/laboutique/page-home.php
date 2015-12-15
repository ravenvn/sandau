<?php
/*
Template Name: Store home page
*/
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage La_Boutique
 * @since La Boutique 1.1
 */
    if (DEBUG_INFO) {
            echo "\n<!-- FILE: /page-home.php ================================================================= -->\n";
    }
    
    if (!function_exists('remove_title_tag')){
        function remove_title_tag(){
            return false;
        }
    }
    
    add_filter( 'wp_title', 'remove_title_tag', 10, 2 );

    $shop_home_products=theme_option('shop_home_products');
    
    $products_per_page=trim(theme_option('shop_products_per_page'));
    
    if (!$products_per_page){
        $products_per_page=9;
    }
             
    $paged = $_GET['paged'];
    
    if (!$paged){
        $paged=get_query_var('page');
    }
    
    if (!$paged){
        $paged=1;
    }
    
    $args1 = array(
        'post_type' => 'product',
        'paged'          => $paged,
        'posts_per_page' => (int)$products_per_page,
        'orderby' =>'date',
        'order' => 'DESC'
    );
    
    
    if ($shop_home_products=='selected'){
        $args1['meta_query'] = array(
            array(
              'key' => 'homepage_product',
              'value' => 'yes',
            )
        );
    }    
    
    $query1 = new WP_Query( $args1 );

    get_header(); 

?>
<section class="home"> 
<?php     
    if (theme_option('header_slider_type')!=3){
        if (theme_option('header_slider_type')==2){

            echo '<div id="revslider_cont">';
                putRevSlider(theme_option('header_slider_revslider_alias'));    
            echo '</div>';  
        } else {
            laboutique_header();         
        }       
    }
?>
<?php if (theme_option('home_promos')){?>    

<!-- Promos -->
<section class="promos">
    <div class="container">
        <div class="row">
            <?php foreach(array('first','second','third') as $k=>$v){?>
                <div class="span4">
                    <div class="<?php echo $v; ?>">
                        <div class="box border-top">
                            <?php if (theme_option('home_promos_'.$v.'_icon')){?>
                            <i class="icon <?php echo esc_attr(theme_option('home_promos_'.$v.'_icon')); ?>"></i>
                            <?php } else if (theme_option('home_promos_'.$v.'_image')){?>
                            <?php $image=theme_option('home_promos_'.$v.'_image');?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="" />
                            <?php } ?>
                            <div class="hgroup title">
                                <?php if (theme_option('home_promos_'.$v.'_title')){?>
                                <h3><?php echo theme_option('home_promos_'.$v.'_title'); ?></h3>
                                <?php } ?>
                                <?php if (theme_option('home_promos_'.$v.'_subtitle')){?>
                                <h5><?php echo theme_option('home_promos_'.$v.'_subtitle'); ?></h5>
                                <?php } ?>
                            </div>
                            <?php if (theme_option('home_promos_'.$v.'_text')){?>
                            <p><?php echo theme_option('home_promos_'.$v.'_text'); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            

          
        </div>
    </div>
</section>
<!-- End class="promos" -->
<?php } ?>
<div class="container">
    <div class="row">
        <?php if (theme_option('shop_home_sidebar')=='left'){?>
        <div class="span3">
            <?php dynamic_sidebar('sidebar-4'); ?>               
        </div>
        <?php } ?>
        <div class="span9">
            <?php

          
            ?>
 
        
            <?php if ( have_posts() ) : ?>
                            

                <ul class="post-list product-list" id="isotope_content">
                    <?php
                            /**
                             * woocommerce_before_shop_loop hook
                             *
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                            //do_action( 'woocommerce_before_shop_loop' );
                    ?>
                    <?php /* The loop */ ?>
                    <?php while ( $query1->have_posts() ) : $query1->the_post(); ?>
                        <li class="standard item<?php if (get_post_meta( get_the_ID(), 'featured_product', true )=='yes'){?> featured<?php } ?>">
                            <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>            
                            <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                        </li>
                    <?php endwhile; ?>

                    <?php
                    /**
                     * woocommerce_after_shop_loop hook
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    //do_action( 'woocommerce_after_shop_loop' );
                    ?>
                </ul>
            <?php if (theme_option('shop_home_load_more')){ ?>
                
                <?php
                 
    
                    $max_page = $query1->max_num_pages;                    
                    $nextpage = intval($paged) + 1;
                    
                    if ( !is_single() && ( $nextpage <= $max_page ) ) {                            
                        $attr = apply_filters( 'next_posts_link_attributes', '' );
                        echo '<nav class="paging-navigation" role="navigation"><div class="nav-links"><div class="nav-previous"><a href="' . next_posts( $max_page, false ) . "\" $attr>" . preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', __('Load more', DOMAIN)) . '</a></div></div></nav>';
                    }
                ?>
                
            <?php } ?>


            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                    <?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>

            <?php endif; ?>
        </div>
        <?php if (!theme_option('shop_home_sidebar')||theme_option('shop_home_sidebar')=='right'){?>
        <div class="span3">
            <?php dynamic_sidebar('sidebar-4'); ?>               
        </div>
        <?php } ?>
    </div>        
</div>
    </section>
<?php get_footer(); ?>