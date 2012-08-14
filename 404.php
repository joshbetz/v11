<?php get_header(); ?>

<section id="content">

	<article <?php post_class(); ?>>
		<header>
			<h1>404: Four oh Four.</h1>
		</header>
		<div class="article">
			<p>It seems you've reached a page that doesn't exist. Try using the search form below.</p>
			<form action="<?php echo home_url(); ?>">
				<input type=text name=s> <input type=submit value="Search">
			</form>
		</div>
	</article>

</section>

<?php get_footer(); ?>