<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
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
	?>

	<header>
		<?php get_template_part( 'content-meta' ); ?>
	</header>

</article>
