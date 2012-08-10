<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title><?php wp_title( ' &mdash; ', true, 'right' ); ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

	<!-- TypeKit embed code -->
	<script type="text/javascript" src="//use.typekit.net/hqj1xrn.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_head();
	?>
</head>
<body <?php body_class(); ?>>

	<div id="wrap">
		<header id="header">
			<h1 id="sitetitle"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<?php if ( has_nav_menu( 'primary' ) ): ?>
				<nav id="mainnav">
					<?php
						$opts = array(
							'theme_location' => 'primary',
							'container' => '',
						);
						wp_nav_menu( $opts );
					?>
					<input id="searchbox" type=type placeholder="Search...">
				</nav>
			<?php endif; ?>
		</header>
		<div id="main">