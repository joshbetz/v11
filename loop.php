<article id="post-<?php the_ID(); ?>" <?php post_class( get_post_format() ); ?>>

	<?php
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
				<?php if ( get_the_title() ): ?>
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
				<?php get_template_part( 'content-meta' ); ?>
			</header>
		
	<?php endif; ?>

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

</article>