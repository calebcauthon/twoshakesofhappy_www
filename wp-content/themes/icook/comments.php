<?php if(comments_open( ) || have_comments()) : ?>
<div class="comments-area">
	<?php if ( post_password_required() ) : ?>
				<p><?php _e( 'This post is password protected. Enter the password to view any comments ', 'icook' ); ?></p>
			</div>

		<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
		endif;?>

		<?php if(!(is_page( ) && get_comments_number( ) == 0)) : ?>
	    	<h3><?php comments_number( '0', '1', '%' ) ?> <?php _ex('Comments','blog','icook') ?>  </h3>
		<?php endif; ?>
		<?php if ( have_comments() && comments_open()) : ?>
			<div class="comments_navigation">
				<?php paginate_comments_links(); ?>
			</div>
            <ul class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'tt_custom_comments' , 'avatar_size'=>'65','style'=>'ul') ); ?>
			</ul>
		<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) && have_comments()) :?>
			<div class="comments_navigation">
				<?php paginate_comments_links(); ?>
			</div>
            <ul class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'tt_custom_comments_closed' , 'avatar_size'=>'65','style'=>'ul') ); ?>
			</ul>
		<?php endif; ?>

		<?php
		$args = array(
			'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="row"><div class="col-md-4"><label for="author"><p>Name</label><span class="line-limit"><input class="comments-line comments-line-1" name="author" id="author" type="text" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" aria-required="true"></span></div>',
				'email' => '<div class="col-md-4"><label for="name"><p>E-mail</label><span class="line-limit"><input class="comments-line comments-line-2" name="email" id="email" type="text" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" aria-required="true"></span></div>',
				'url' => '<div class="col-md-4"><label for="url"><p>Website</label><span class="line-limit"><input class="comments-line comments-line-3" name="website" type="text" id="url" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '" ></span></div></div>'
					)
			),
			'comment_notes_after' => '',
			'comment_notes_before' => '',
			'title_reply' => '<h3>Add a comment</h3>',
			'comment_field' => '<label for="comment"><p>Comment</p></label><span class="line-limit"><textarea name="comment" id="comment" class="comments-area commenttextarea"></textarea></span>',
			'comment_name' => '<label for="name" class="lines">Name<br /><input type="text" name="name" class="line"></label>',
			'label_submit' => _x('Post comment','comment-form','icook')
		);
		
		
		comment_form( $args );
		?>

</div><!-- .comments area -->
<?php endif; ?>