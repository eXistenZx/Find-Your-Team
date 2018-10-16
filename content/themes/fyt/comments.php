<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage fyt
 * @since 1.0
 * @version 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
	?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( 'One Réponse to &ldquo;%s&rdquo;', 'comments title', 'fyt' ), get_the_title() );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Réponse to &ldquo;%2$s&rdquo;',
						'%1$s Réponses to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'fyt'
					),
					number_format_i18n( $comments_number ),
					get_the_title()
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments(
					array(
						'avatar_size' => 50,
						'style'       => 'ol',
						'short_ping'  => true,
					)
				);
			?>
		</ol>

		<?php

	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'fyt' ); ?></p>
	<?php
	endif;

  $comments_args = array(

    // redefine your own textarea (the comment body)
    'comment_field' => '<p class="comment-form-comment"><label for="comment"> </label><br />
                        <textarea id="comment" cols="40" rows="8" name="comment" aria-required="true"></textarea></p>',
  );

  comment_form($comments_args)
	?>

</div><!-- #comments -->
