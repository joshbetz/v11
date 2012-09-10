<?php

$video = get_post_meta( $post->ID, '_format_video_embed', true );
if ( !empty( $video ) ) {
	$url = esc_url( $video );
	echo "<div class='post-video'>";
	if ( $embed = wp_oembed_get( $url ) )
		echo $embed;
	elseif ( !empty( $url ) ) {
		printf( '<video controls src="%s"></video>', $url );
	} else {
		echo $video;
	}
	echo "</div>";
}

get_template_part( 'loop' );