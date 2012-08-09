<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
    <?php if ( get_post_format() == "link" ):
      $link = get_post_meta($post->ID, '_format_link_url', true); ?>
      <h1><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h1>
    <?php else: ?>
      <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
    <?php endif; ?>
    <span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span>
  </header>
  <div class="article">
    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'v11' ) ); ?>
  </div>
</article>