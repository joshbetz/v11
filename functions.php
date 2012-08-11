<?php

require 'includes/bio-widget.php';
require 'includes/icons-widget.php';

/**
 * V11 Theme
 */
class V11_Theme {

	const VERSION = 1.0;
	
	function __construct() {
		add_action('init', array( $this, 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_title', array( $this, 'twentytwelve_wp_title' ), 10, 2 );
		add_action( 'after_setup_theme', array( $this, 'theme_setup' ) );
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	function init() {
		add_filter( 'the_title', array( $this, 'remove_widows' ) );
		add_action( 'pre_get_posts', array( $this, 'remove_twitter_cat' ) );
		add_filter( 'post_link', array( $this, 'link_post_links' ) );
		add_filter( 'the_permalink', array( $this, 'link_permalinks' ) );
		add_filter( 'the_title', array( $this, 'link_titles' ), 10, 2 );
		add_filter( 'nav_menu_css_class', array( $this, 'menu_item_has_children' ), 10, 3 );
		add_filter( 'wp_page_menu_args', array( $this, 'home_page_menu_item' ) );
	}

	function theme_setup() {
		//TODO: add editor style
		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();

		// This theme uses post formats
		add_theme_support( 'post-formats', array( 'link', 'image', 'video', 'audio' ) );

		// Post thumbnails are displayed above the article.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 700, 280 );

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() for the main nav.
		register_nav_menu( 'primary', __( 'Primary Menu', 'v11' ) );
	}

	function enqueue_scripts() {
		wp_register_style( 'v11', get_stylesheet_directory_uri() . '/css/style.css', false, self::VERSION );
		wp_enqueue_style( 'v11' );

		wp_register_script( 'v11', get_stylesheet_directory_uri() . '/js/site.js', array( 'jquery', 'prettyprint', 'fitvids' ), self::VERSION, true );
		wp_enqueue_script( 'v11' );

		wp_register_script( 'prettyprint', get_stylesheet_directory_uri() . '/js/google-code-prettify/prettify.js', false, false, true );
		wp_register_style( 'prettyprint', get_stylesheet_directory_uri() . '/js/google-code-prettify/prettify.css' );
		wp_enqueue_script( 'prettyprint' );
		wp_enqueue_style( 'prettyprint' );
		
		wp_register_script( 'html5shiv', get_stylesheet_directory_uri() . '/js/html5shiv.js' );
		wp_register_script( 'googlecse', 'http://www.google.com/jsapi', false, false, true );
		wp_register_script( 'v11search', get_stylesheet_directory_uri() . '/js/google-search.js', array( 'googlecse' ), self::VERSION, true );
		wp_register_script( 'fitvids', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), false, true );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'html5shiv' );
		wp_enqueue_script( 'googlecse' );
		wp_enqueue_script( 'v11search' );
		wp_enqueue_script( 'fitvids' );
	}

	function twentytwelve_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() )
			return $title;

		// Add the blog name.
		$title .= get_bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( __( 'Page %s', 'v11' ), max( $paged, $page ) );

		return $title;
	}

	function widgets_init() {
		register_sidebar( array(
			'name' => __( 'Main Sidebar', 'v11' ),
			'id' => 'sidebar-1',
			'description' => __( 'Appears on posts and pages except the optional Homepage template, which uses its own set of widgets', 'v11' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		) );
	}

	function menu_item_has_children( $classes, $item, $args ) {
		if ( $args->has_children )
			$classes[] = 'menu-item-has-children';
		return $classes;
	}

	function home_page_menu_item( $args ) {
		$args['show_home'] = true;
		return $args;
	}

	function remove_widows($title){
		$title_length = strlen( $title );
		$anchor_array = explode(' ', $title);

		// Join the last two words with a &nbsp;
		if( sizeof( $anchor_array ) > 1 ){
			$last_word = array_pop( $anchor_array );
			$title_new = join( ' ', $anchor_array ) . '&nbsp;' . $last_word;
			$title = substr_replace( $title, $title_new, 0, $title_length );
		}

		return $title;
	}

	function remove_twitter_cat(){
		global $wp_query;

		// Figure out if we need to exclude twitter - exclude from
		// archives (except category archives), feeds, and home page
		if( is_home() || is_feed() || ( is_admin() && isset( $_REQUEST['cat'] ) && $_REQUEST['cat'] != '14' ) ||
				( is_archive() && !is_category() ) ) {
			 $wp_query->query_vars['cat'] = '-14';
		}
	}

	function link_post_links( $link ) {
		global $post;
		
		if ( is_feed() && has_post_format( 'link', $post->ID ) ) {
			return get_post_meta($post->ID, '_format_link_url', true);
		}
		
		return $link;
	}

	function link_permalinks( $link ) {
		global $post;
		
		if ( has_post_format( 'link', $post->ID ) ) {
			return get_post_meta($post->ID, '_format_link_url', true);
		}
		
		return $link;
	}

	function link_titles( $title, $id ) {
		if ( has_post_format( 'link', $id ) && !is_admin() ) {
			if ( is_feed() )
				return '&rarr; ' . $title;
			elseif ( is_home() || is_archive() || is_single( $id) )
				return '&rarr;&nbsp' . $title;
		}
		
		return $title;
	}
}

new V11_Theme();

if ( ! function_exists( 'v11_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own v11_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function v11_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
	<?php
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
		?>
			<p><?php _e( 'Pingback:', 'v11' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'v11' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo "<b>" . get_avatar( $comment, 70 ) . "</b>";
					printf( '<cite class="fn">%1$s</cite>', get_comment_author_link() );

					$datetime = time() - strtotime( get_comment_time( 'c' ) ) < 86400 ? human_time_diff( strtotime( get_comment_time( 'c' ) ) ) . ' ago' : get_comment_date();
					printf( '<a class="date" href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						$datetime
					);
				?>
			</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'v11' ); ?></p>
			<?php endif; ?>

			<section class="comment-content">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'v11' ), '<p class="edit-link">', '</p>' ); ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'v11' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</section>

		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
	?>
	</li>
<?php
}
endif;
