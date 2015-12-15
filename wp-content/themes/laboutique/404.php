<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage La_Boutique
 * @since La Boutique 1.1
 */
if (DEBUG_INFO) {
	echo "\n<!-- FILE: /404.php ================================================================= -->\n";
}
get_header(); ?>
        <!-- 404 -->
        <section class="404">
            <div class="container">
                <div class="row">

                    <div class="span6 offset3">
                        <div class="box">
                            <div class="hgroup title">
                                <h3><?php _e( 'Not found', DOMAIN ); ?></h3>
                                <h5><?php _e("Oh no! It looks like something has broken...", DOMAIN); ?></h5>
                            </div>

                            <div class="box-content">
                                <p><?php _e( 'The page you are trying to reach may have been moved, deleted or does not exist.', DOMAIN ); ?></p>
                            </div>

                            <div class="buttons">
                                <div class="pull-left">
                                    <a title=<?php _e( 'Back home', DOMAIN ); ?>" href="<?php echo home_url();?>" class="btn btn-primary btn-small">
                                        <i class="icon-chevron-left"></i> &nbsp; <?php _e( 'Back to the homepage', DOMAIN ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>	
            </div>	
        </section>            
        <!-- End class="404" -->


<?php get_footer(); ?>