<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		switch( get_post_format() ) {
			case 'image':
				echo "<div class='post-thumbnail'>";
				the_post_thumbnail();
				echo "</div>";
				break;
			case 'video':
				echo wp_oembed_get( get_post_meta( $post->ID, '_format_video_embed', true ) );
				break;
			case 'audio':
				echo wp_oembed_get( get_post_meta( $post->ID, '_format_audio_embed', true ) );
				break;
		}
	?>

	<?php if ( is_page() ): ?>

		<header>
			<h1><?php the_title(); ?></h1>
		</header>

	<?php else: ?>
		
			<header>
				<?php if ( get_post_format() == "link" ):
					$link = get_post_meta($post->ID, '_format_link_url', true); ?>
					<h1><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h1>
				<?php elseif ( is_single() ): ?>
					<h1><?php the_title(); ?></h1>
				<?php else: ?>
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<?php endif; ?>
				<div class="post-meta">
					<span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span>
					<span class="shortlink"><?php echo the_shortlink( str_replace( array( 'https://', 'http://' ), '', wp_get_shortlink() ) ); ?></span>
				</div>
			</header>
		
	<?php endif; ?>

	<?php if ( ! is_search() ): ?>
		<div class="article">
			<?php the_content( __( '<p class="readmore">Continue reading <span class="meta-nav">&rarr;</span></p>', 'v11' ) ); ?>
		</div>
	<?php else: ?>
		<div class="article">
			<?php the_excerpt(); ?>
		</div>
	<?php endif; ?>

</article>