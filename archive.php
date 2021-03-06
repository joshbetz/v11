<?php get_header(); ?>

<section id="content">

<?php if ( have_posts() ): ?>

	<header class="page-header">
		<h1 class="page-title">
			<?php
				if ( is_category() ) {
					printf( __( 'Category Archives: %s', 'v11' ), '<span>' . single_cat_title( '', false ) . '</span>' );

				} elseif ( is_tag() ) {
					printf( __( 'Tag Archives: %s', 'v11' ), '<span>' . single_tag_title( '', false ) . '</span>' );

				} elseif ( is_author() ) {
					$author = get_queried_object()->data;
					printf( __( 'Author Archives: %s', '_s' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( $author->ID ) . '" title="' . esc_attr( $author->display_name ) . '" rel="me">' . esc_html( $author->display_name ) . '</a></span>' );

				} elseif ( is_day() ) {
					printf( __( 'Daily Archives: %s', 'v11' ), '<span>' . get_the_date() . '</span>' );

				} elseif ( is_month() ) {
					printf( __( 'Monthly Archives: %s', 'v11' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

				} elseif ( is_year() ) {
					printf( __( 'Yearly Archives: %s', 'v11' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

				} else {
					_e( 'Archives', 'v11' );

				}
			?>
		</h1>

		<?php
			if ( is_category() ) {
				// show an optional category description
				$category_description = category_description();
				if ( ! empty( $category_description ) )
					echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

			} elseif ( is_tag() ) {
				// show an optional tag description
				$tag_description = tag_description();
				if ( ! empty( $tag_description ) )
					echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
			}
		?>
	</header>

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
