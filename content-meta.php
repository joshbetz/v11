<?php
	$comment_count = get_comments_number();
	$link = get_comments_link();

	$comment_count_title = $comment_count == 1 ? 'One' : $comment_count;

	if ( $comment_count )
		printf( '<div class="comment-count"><a href="%s" title="%s">%s</a></div>', get_comments_link(), $comment_count_title . ' Comments', $comment_count );
?>
<div class="post-meta">
	<span class="meta-date"><?php echo ( current_time( 'timestamp' ) - get_the_time( 'U' ) < 86400 ? human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ago' : get_the_time( get_option( 'date_format' ) ) ); ?></span>
	<span class="meta-shortlink"><span class="icon" aria-hidden="true" data-icon="&#x22;"></span><span class="assistive-text">Shortlink: </span><?php echo the_shortlink(); ?></span>
	<?php the_tags( '<span class="meta-tags"><span class="icon" aria-hidden="true" data-icon="&#x23;"></span><span class="assistive-text">' . __( 'Tags:', 'v11' ) . ' </span>', ', ', '</span>' ); ?>
</div>