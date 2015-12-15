<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage La_Boutique
 * @since La Boutique 1.1
 */
if (DEBUG_INFO) {
	echo "\n<!-- FILE: /content.php ================================================================= -->\n";
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class("post post-full"); ?>>
    <div class="box">
        <?php if ( !is_single() ) : ?>
            <?php //category view */?>
            <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
            
        
            <div class="box-image">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); ?>
                </a>
            </div>
            <?php endif; ?>
        
        <div class="box-header">
            <h3>
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>						
                </a>
            </h3>
            <ul class="post-meta entry-meta">
                <?php laboutique_entry_meta(); ?>
            </ul>
        </div>

        <div class="box-content">
            <p><?php the_excerpt(); ?></p>
        </div>

        <div class="box-footer">
            <div class="pull-right">
                <a class="btn btn-small" href="<?php the_permalink(); ?>" title="">
                    <?php echo __('Read more', DOMAIN)?>
                </a>
            </div>
        </div>
        <?php else : ?>

        <div class="box-header">
            <h2>
                <?php if ( is_single() ) : ?>
		<?php the_title(); ?>
		<?php else : ?>
		
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		
		<?php endif; // is_single() ?>				
            </h2>
            <ul class="post-meta entry-meta">
                <?php edit_post_link( __( 'Edit', DOMAIN ), '<li class="edit-link"><i class="icon-edit"></i> &nbsp; ', '</li>' ); ?>
                <?php laboutique_entry_meta(); ?>                                
                <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>                   
                    <span class="cat-links"><i class="icon-bookmark"></i> &nbsp; <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', DOMAIN ) ); ?></span>                    
                <?php endif; ?>                
            </ul>

            <!-- .entry-meta -->
        </div>

        <div class="box-content">

            <header class="entry-header">
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
                    <?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>
	

            </header><!-- .entry-header -->

            <?php if ( is_search() ) : // Only display Excerpts for Search ?>
            <div class="entry-summary">
                    <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
            <?php else : ?>
            <div class="entry-content">
                    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', DOMAIN ) ); ?>
                    <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', DOMAIN ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
            </div><!-- .entry-content -->
            <?php endif; ?>
            
            
            <?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
        </div>
        
        <footer class="entry-meta box-footer">
                <?php if ( comments_open() && ! is_single() ) : ?>
                        <div class="comments-link pull-right">
                                <?php comments_popup_link(  __( 'Leave a comment', DOMAIN ) , __( 'One comment so far', DOMAIN ), __( 'View all % comments', DOMAIN ),'btn btn-small' ); ?>
                        </div><!-- .comments-link -->
                <?php endif;  ?>

                <?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
                        <?php get_template_part( 'author-bio' ); ?>
                <?php endif; ?>
                        
                        
                <?php if (is_single()):?>
                        <?php laboutique_post_nav(); ?>                     
                <?php endif;?>
        </footer><!-- .entry-meta -->
        
        <?php endif; // is_single() ?>
    </div>
</article>


	
