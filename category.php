<?php get_header(); ?> <!-- ouvrir header,php -->
<main class="col-md-8">
  <h1 class="page-title">
    <i class="fa fa-fw fa-folder"></i> <?php echo single_cat_title(); ?>
  </h1>

  <?php include(TEMPLATEPATH . '/components/posts-list.php'); ?>

</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
