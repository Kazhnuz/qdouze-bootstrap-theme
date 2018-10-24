<?php get_header(); ?> <!-- ouvrir header,php -->
<main class="col-md-8">
  <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
  
  <article class="article-content" id="post-<?php the_ID(); ?>">
  <h1 class="page-title"><i class="fa fa-fw fa-file-text"></i> <?php the_title(); ?></h1>
    
    <div class="article-body">
      <?php the_content(); ?>
    </div>
  </article>
  
  <?php endwhile; ?>
  <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
