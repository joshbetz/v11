<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php
    switch( get_post_format() ) {
      case 'image':
        the_post_thumbnail();
        break;
      case 'video':
        //TODO
        echo get_post_meta( $post->ID, '_format_video_embed', true );
        break;
      case 'audio':
        //TODO
        echo get_post_meta( $post->ID, '_format_audio_embed', true );
        break;
    }
  ?>

  <?php if ( is_page() ): ?>

  	<header>
  		<h1><?php the_title(); ?></h1>
  	</header>

  <?php elseif ( is_single() ): ?>

  	<header>
  		<h1><?php the_title(); ?></h1>
  		<span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span>
  	</header>

  <?php else: ?>
    
      <header>
        <?php if ( get_post_format() == "link" ):
          $link = get_post_meta($post->ID, '_format_link_url', true); ?>
          <h1><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h1>
        <?php else: ?>
          <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        <?php endif; ?>
        <span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span>
      </header>
    
  <?php endif; ?>

  <div class="article">
    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'v11' ) ); ?>
  </div>

</article>