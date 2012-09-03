<?php get_header(); ?>

<section id="content">

	<article <?php post_class(); ?>>
		<header>
			<h1><?php _e( '404: Four oh Four.', 'v11' ); ?></h1>
		</header>
		<div class="article">
			<p><?php _e( "It seems you've reached a page that doesn't exist. Try using the search form below.", 'v11' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</article>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>