<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
			return;
?>
<section id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h1 class="comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'v11' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h1>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'v11_comment', 'style' => 'ol' ) ); ?>
			<?php
				// If comments are closed and there are comments, let's leave a little note.
				if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
				<li class="nocomments"><p><?php echo get_theme_mod( 'v11_closed_comments', __( 'Comments are closed.', 'v11' ) ); ?></p></li>
			<?php endif; ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'v11' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( sprintf( __( '%s Older Comments', 'v11' ), V11_LEFT_NAV_ARROW ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( sprintf( __( 'Newer Comments %s', 'v11' ), V11_RIGHT_NAV_ARROW ) ); ?> </div>
		</nav>
		<?php endif; // check for comment navigation ?>
	<?php endif; // have_comments() ?>

	<?php comment_form(); ?>

</section><!-- #comments .comments-area -->
