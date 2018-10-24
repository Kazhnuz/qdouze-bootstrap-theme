<?php get_header(); ?> <!-- ouvrir header,php -->
<main class="col-md-8">
    <h1 class="page-title page-title-flex">
      <span><i class="fa fa-fw fa-tag"></i> <?php echo single_cat_title(); ?></span>
      <?php 
      $tag = get_category( get_query_var( 'tag' ) );
      $tag_id = $tag->ID;
    
      echo '<a href="' . get_tag_link( $tag_id ) . 'feed/" title="RSS de la categorie" />' . '<i class="fa fa-fw fa-rss"></i></a>' ; 
    ?>
    </h1>
    
    <?php include(TEMPLATEPATH . '/components/posts-list.php'); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
