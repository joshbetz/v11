<?php
	$comment_count = get_comments_number();
	$link = get_comments_link();

	$comment_count_title = $comment_count == 1 ? 'One' : $comment_count;

	if ( $comment_count )
		printf( '<div class="comment-count"><a href="%s" title="%s">%s</a></div>', get_comments_link(), $comment_count_title . ' Comments', $comment_count );
?>
<div class="post-meta">
	<?php
		$datetime = current_time( 'timestamp' ) - get_the_time( 'U' ) < 86400 ? human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ago' : get_the_time( get_option( 'date_format' ) );
		printf( '<time pubdate datetime="%1$s" class="meta-date">%2$s</time>',
			get_the_time( 'c' ),
			$datetime
		);
	?>

	<span class="meta-shortlink"><span class="icon" aria-hidden="true" data-icon="&#x22;"></span><span class="assistive-text">Shortlink: </span>
		<?php
			$permalinks = ! ( get_option('permalink_structure') == '' );
			if ( $permalinks ) {
				echo the_shortlink();
			} else {
				global $v11_theme;
				$permalink = get_permalink( $post->ID );
				echo $v11_theme->shortlink_remove_protocol( $permalink, $permalink, $permalink, $permalink );
			}
		?>
	</span>

	<?php the_tags( '<span class="meta-tags"><span class="icon" aria-hidden="true" data-icon="&#x23;"></span><span class="assistive-text">' . __( 'Tags:', 'v11' ) . ' </span>', ', ', '</span>' ); ?>
</div>
