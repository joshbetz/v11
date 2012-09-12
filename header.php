<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title( ' &mdash; ', true, 'right' ); ?></title>
	<meta name="viewport" content="width=device-width">
	<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>

	<?php if ( get_theme_mod( 'v11_cardo', false ) ): ?><link href='http://fonts.googleapis.com/css?family=Cardo:400,400italic,700' rel='stylesheet' type='text/css'><?php endif; ?>
	<?php if ( get_theme_mod( 'v11_tinos', false ) ): ?><link href='http://fonts.googleapis.com/css?family=Tinos:400,700,400italic' rel='stylesheet' type='text/css'><?php endif; ?>
	
	<?php wp_head(); ?>

	<?php if ( get_theme_mod( 'title_color', false ) ): ?><style>#sitetitle a { color: <?php echo get_theme_mod( 'title_color' ); ?> }</style><?php endif; ?>
	<?php if ( get_theme_mod( 'link_color', false ) ): ?><style>a { color: <?php echo get_theme_mod( 'link_color' ); ?> }</style><?php endif; ?>
</head>
<body <?php body_class(); ?>>

	<div id="wrap">
		<header id="header">
			<h1 id="sitetitle"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<nav id="mainnav">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'fallback_cb' => 'wp_page_menu' ) ); ?>
				<?php get_search_form(); ?>
			</nav>
		</header>
		<div id="main">