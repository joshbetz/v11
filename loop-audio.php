<article id="post-<?php the_ID(); ?>" <?php post_class( 'audio' ); ?>>

	<?php

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

		get_template_part( 'loop-base' );

	?>

</article>
