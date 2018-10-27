<?php if ( is_single() ) { ?>
  <?php if(!has_post_thumbnail( $post->ID )) {
    $image = get_template_directory_uri() . "/img/default-preview.png";
  } else {
    $image = get_the_post_thumbnail_url();
  }
  ?>
	  
  <meta property='og:url' content='<?php echo get_permalink(); ?>'/>
  <meta property='og:type' content='article'/>
  <meta property='og:title' content='<?php wp_title(''); ?>'/>
  <meta property='og:site_name' content='<?php bloginfo('name'); ?>'/>
  <meta property='og:image' content='<?php echo $image ?>'/>
  <meta property='og:description' content='<?php the_excerpt(); ?>'/>
<?php } ?>
