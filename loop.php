<article id="post-<?php the_ID(); ?>" <?php post_class( get_post_format() ); ?>>

	<?php
		$format = get_post_format();
		switch( $format ) {
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
			case 'quote':
				$source = get_post_meta( $post->ID, '_format_quote_source_name', true );
				$url = get_post_meta( $post->ID, '_format_quote_source_url', true );
				echo "<blockquote>";
				the_content();
				if ( $url && $source )
					printf( '<cite><a href="%s">%s</a></cite>', esc_url( $url ), $source );
				elseif ( $source )
					echo "<cite>$source</cite>";
				echo "</blockquote>";
				break;
		}
	?>

	<?php if ( is_page() ): ?>

		<header>
			<h1><?php the_title(); ?></h1>
		</header>

	<?php else: ?>
		
			<header>
				<?php if ( 'quote' != $format && 'status' != $format ): ?>
					<?php if ( get_post_format() == "link" ):
						$link = get_post_meta($post->ID, '_format_link_url', true); ?>
						<h1><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h1>
					<?php elseif ( is_single() ): ?>
						<h1><?php the_title(); ?></h1>
					<?php else: ?>
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<?php endif; ?>
				<?php endif; ?>
				<div class="post-meta">
					<span class="date"><?php echo ( time() - get_the_time( 'U' ) < 86400 ? human_time_diff( get_the_time( 'U' ) ) . ' ago' : get_the_time( get_option( 'date_format' ) ) ); ?></span>
					<span class="shortlink"><?php echo the_shortlink(); ?></span>
				</div>
			</header>
		
	<?php endif; ?>

	<?php if ( 'quote' != $format ): ?>
		<?php if ( ! is_search() ): ?>
			<div class="article">
				<?php the_content( __( '<p class="readmore">Continue reading <span class="meta-nav">&#10095;</span></p>', 'v11' ) ); ?>
				<?php wp_link_pages(); ?>
			</div>
		<?php else: ?>
			<div class="article">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>

</article>