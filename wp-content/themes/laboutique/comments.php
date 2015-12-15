<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage La_Boutique
 * @since La Boutique 1.1
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;

if (DEBUG_INFO) {
	echo "\n<!-- FILE: /comments.php ================================================================= -->\n";
}
?>
<?php     
    ob_start();
    
    comment_form(array(
        'comment_notes_after'=>'',
        'comment_notes_before'=>'',
        'title_reply'=>'<div class="box-header"><h3>Join the discussion</h3><h5>Let your opinion be heard, add your comment!</h5></div>',

        'fields'=>array(
                'author' => '<div class="row-fluid"><div class="span4"><div class="control-group">' . '<label for="author" class="control-label">' . __( 'Name' , DOMAIN) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                            '<div class="controls"><input class="span12" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></div></div></div>',
                'email'  => '<div class="span4"><div class="control-group"><label for="email" class="control-label">' . __( 'Email' , DOMAIN) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                            '<div class="controls"><input class="span12" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" /></div></div></div>',
                'url'    => '<div class="span4"><div class="control-group"><label for="url" class="control-label">' . __( 'Website' , DOMAIN) . '</label> ' .
                            '<div class="controls"><input class="span12" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div></div></div></div>',
        ),

        'comment_field'=>'<div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <label class="control-label" for="content">'._x( 'Comment', 'noun' ).'</label>
                        <div class="controls">
                            <textarea class="span12" id="comment" name="comment" id="content" aria-required="true"></textarea>
                        </div>
                    </div>
                </div>
            </div>'
    )); 
    $comment_form=trim(ob_get_contents());
    ob_end_clean();
?>
<?php if ( have_comments() || str_replace(" ","",$comment_form)) : ?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
    
        
    
    
        <section class="post-comments">
            <div class="box">
                <div class="box-header">
                    <h3><?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', DOMAIN ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?></h3>
                </div>
                <div class="box-content">
                    <div class="comment-items">
                            <?php
                                    wp_list_comments( 
                                            array(
                                                'callback'=>'format_comment',
                                                //'avatar_size' => 60,    
                                                'max_depth'=>1
                                            )
                                            /*array(
                                            'style'       => 'div',
                                            'short_ping'  => true,
                                            'avatar_size' => 60,
                                    ) */);
                            ?>
                    </div>
                </div>
                <!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php _e( 'Comment navigation', DOMAIN ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', DOMAIN ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', DOMAIN ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<?php /*<p class="no-comments"><?php _e( 'Comments are closed.' , DOMAIN ); ?></p>*/?>
		<?php endif; ?>
                
                               
            </div>
        </section>
    <?php endif; ?>
    <?php if ($comment_form):?>
    <section class="post-comment-form">
        <div class="box">
            <?php echo $comment_form;?>
                                   
        </div>
    </section>
    <?php endif; ?>
    
</div>
<!-- #comments -->

<?php endif;?>

	

	

