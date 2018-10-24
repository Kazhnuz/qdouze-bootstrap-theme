<?php get_header(); ?>
<main class="col-md-9">
  <h1 class="page-title"><i class="fa fa-fw fa-star"></i> À la une</h1>
	<?php include(TEMPLATEPATH . '/components/featured.php'); ?>

  <h1 class="page-title"><i class="fa fa-fw fa-clock-o"></i> Articles récents</h1>
	<?php include(TEMPLATEPATH . '/components/posts-list.php'); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer();  ?>
