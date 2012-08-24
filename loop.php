<article id="post-<?php the_ID(); ?>" <?php post_class( get_post_format() ); ?>>

	<?php
		$format = get_post_format();
		switch( $format ) {
			case 'video':
				$video = get_post_meta( $post->ID, '_format_video_embed', true );
				if ( !empty( $video ) ) {
					$url = esc_url( $video );
					if ( $embed = wp_oembed_get( $url ) )
						echo $embed;
					elseif ( !empty( $url ) ) {
						printf( '<video controls src="%s"></video>', $url );
					} else {
						echo $video;
					}
				}
				
				break;
			case 'audio':
				$audio = get_post_meta( $post->ID, '_format_audio_embed', true );
				if ( !empty ( $audio ) ) {
					$url = esc_url( $audio );
					if ( $embed = wp_oembed_get( $url ) )
						echo $embed;
					elseif ( !empty( $url ) ) {
						printf( '<audio controls src="%s"></audio>', $url );
					} else {
						echo $audio;
					}
				}
				
				break;
			case 'quote':
				$source = get_post_meta( $post->ID, '_format_quote_source_name', true );
				$url = get_post_meta( $post->ID, '_format_quote_source_url', true );
				
				if ( $url )
					echo "<blockquote cite='$url'>";
				else
					echo "<blockquote>";
				
				the_content();
				
				if ( $url && $source )
					printf( '<cite><a href="%s">%s</a></cite>', esc_url( $url ), $source );
				elseif ( $source )
					echo "<cite>$source</cite>";
				
				echo "</blockquote>";
				break;
			case 'status':
				echo '<div class="article">';
				the_content();
				echo '</div>';
				break;
		}

		if ( has_post_thumbnail() ) {
			echo "<div class='post-thumbnail'>";
			the_post_thumbnail();
			echo "</div>";
		}
	?>

	<?php if ( is_page() ): ?>

		<header>
			<h1><?php the_title(); ?></h1>
		</header>

	<?php else: ?>
		
			<header>
				<?php if ( 'quote' != $format && 'status' != $format && get_the_title() ): ?>
					<?php if ( get_post_format() == "link" ):
						$link = get_post_meta($post->ID, '_format_link_url', true);
						if ( empty( $link ) ) $link = v11_url_grabber( get_the_content() ); ?>
						<h1><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h1>
					<?php elseif ( is_single() ): ?>
						<h1><?php the_title(); ?></h1>
					<?php else: ?>
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<?php endif; ?>
				<?php endif; ?>
				<div class="post-meta">
					<span class="meta-date"><?php echo ( time() - get_the_time( 'U' ) < 86400 ? human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ago' : get_the_time( get_option( 'date_format' ) ) ); ?></span>
					<span class="meta-shortlink"><?php echo the_shortlink(); ?></span>
				</div>
			</header>
		
	<?php endif; ?>

	<?php if ( 'quote' != $format && 'status' != $format ): ?>
		<?php if ( ! is_search() ): ?>
			<div class="article">
				<?php the_content( __( '<p class="readmore">Continue reading <span class="meta-nav">&#10095;</span></p>', 'v11' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', '_s' ), 'after' => '</div>' ) ); ?>
			</div>
		<?php else: ?>
			<div class="article">
				<?php the_excerpt(); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>

</article>