<?php get_header(); ?>

<section id="content">

<?php if ( have_posts() ): ?>
	
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'loop', get_post_format() ); ?>
	<?php endwhile; ?>

	<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'v11' ); ?></h3>
			<div class="nav-previous alignleft"><span class="meta-nav">&#10094;</span> <?php next_posts_link( __( 'Older posts', 'v11' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts', 'v11' ) ); ?> <span class="meta-nav">&#10095;</span></div>
		</nav><!-- #nav-above -->
	<?php endif; ?>

<?php else: ?>

	<?php get_template_part( 'no-results' ); ?>

<?php endif; ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>