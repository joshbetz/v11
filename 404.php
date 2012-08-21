<?php get_header(); ?>

<section id="content">

	<article <?php post_class(); ?>>
		<header>
			<h1><?php _e( '404: Four oh Four.', 'v11' ); ?></h1>
		</header>
		<div class="article">
			<p><?php _e( "It seems you've reached a page that doesn't exist. Try using the search form below.", 'v11' ); ?></p>
			<form action="<?php echo home_url(); ?>">
				<input type=text name=s> <input type=submit value="Search">
			</form>
		</div>
	</article>

</section>

<?php get_footer(); ?>