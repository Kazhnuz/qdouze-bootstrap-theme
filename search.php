<?php get_header(); ?> <!-- ouvrir header,php -->
<main class="col-md-8">
    <h1 class="page-title"><i class="fa fa-fw fa-search"></i><?php _e('', 'sandbox') ?> Recherche pour le terme « <?php echo get_search_query(); ?> »</h1>
    
    <?php include(TEMPLATEPATH . '/components/posts-list.php'); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
