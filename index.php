<?php get_header(); ?>

<section id="content">

<?php if ( have_posts() ): ?>
	
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'loop' ); ?>
	<?php endwhile; ?>

	<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif; ?>

<?php endif; ?>

</section>

<?php get_footer(); ?>