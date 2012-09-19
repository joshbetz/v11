<?php get_header(); /* Template Name: Right Sidebar */ ?>

<section id="content">

<?php if ( have_posts() ): ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'loop' ); ?>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template( '', true );
		?>

	<?php endwhile; ?>
<?php endif; ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
