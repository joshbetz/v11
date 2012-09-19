<?php get_header(); ?>

<section id="content">

<?php if ( have_posts() ): ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'loop', get_post_format() ); ?>
	<?php endwhile; ?>

	<?php v11_content_nav(); ?>

<?php else: ?>

	<?php get_template_part( 'no-results' ); ?>

<?php endif; ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
