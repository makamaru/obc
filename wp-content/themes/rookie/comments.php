<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Rookie
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

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

		<?php if (!is_home()) : ?>
			<h3 class="comments-title">
				<?php
					printf( _nx( 'Un commentaire', '%1$s commentaires', get_comments_number(), 'comments title', 'rookie' ),
						number_format_i18n( get_comments_number() ) );
				?>
			</h3>
		<?php else : ?>
		<?php endif; ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'rookie' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Commentaires plus anciens', 'rookie' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Commentaires plus récents &rarr;', 'rookie' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style' 		=> 'ol',
					'short_ping' 	=> true,
					'avatar_size' 	=> 100,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'rookie' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Commentaires plus anciens', 'rookie' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Commentaires plus récents &rarr;', 'rookie' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Les commentaires sont désactivés.', 'rookie' ); ?></p>
	<?php endif; ?>

	<?php
		$args = array();
		if ( '0' == get_comments_number() ) {
			$args['title_reply'] = __( 'Laisser un commentaire', 'rookie' );
		} else {
			$args['title_reply'] = __( 'Laisser un commentaire', 'rookie' );
		}
		comment_form( $args );
	?>

</div><!-- #comments -->
