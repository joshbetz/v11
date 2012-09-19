<article id="post-<?php the_ID(); ?>" <?php post_class( 'status' ); ?>>

	<?php
		echo '<div class="article">';
		the_content();
		echo '</div>';
	?>

	<header>
		<?php get_template_part( 'content-meta' ); ?>
	</header>

</article>
