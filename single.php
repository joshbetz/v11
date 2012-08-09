<?php get_header(); ?>

<section id="content">

<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'single' ); ?>

		<nav class="nav-single">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'v11' ); ?></h3>
			<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span>', 'v11' ) . ' %title' ); ?></span>
			<span class="nav-next"><?php next_post_link( '%link', '%title ' . __( '<span class="meta-nav">&rarr;</span>', 'v11' ) ); ?></span>
		</nav><!-- .nav-single -->

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template( '', true );
		?>

	<?php endwhile; ?>
<?php endif; ?>

</section>

<?php get_footer(); ?>