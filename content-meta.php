<div class="post-meta">
	<span class="meta-date"><?php echo ( time() - get_the_time( 'U' ) < 86400 ? human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ago' : get_the_time( get_option( 'date_format' ) ) ); ?></span>
	<span class="meta-shortlink"><span class="icon" aria-hidden="true" data-icon="&#x22;"></span><span class="assistive-text">Shortlink: </span><?php echo the_shortlink(); ?></span>
	<?php the_tags( '<div class="meta-tags"><span class="icon" aria-hidden="true" data-icon="&#x23;"></span><span class="assistive-text">Tags: </span>', ', ', '</div>' ); ?>
</div>