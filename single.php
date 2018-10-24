<?php get_header(); ?> <!-- ouvrir header,php -->
<main class="col-md-8">
  <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
  
  <article class="article-content" id="post-<?php the_ID(); ?>">
  <h1 class="page-title"><i class="fa fa-fw fa-file-text"></i> <?php the_title(); ?></h1>
  
  <div class="article-thumbnail" >
    <?php the_post_thumbnail( ); ?>
  </div>
  
  <aside class="article-excerpt">
    <?php the_excerpt(); ?>
    
    <hr />
  </aside>
    
    <div class="article-body">
      <?php the_content(); ?>
    </div>
  </article>
  
  <?php endwhile; ?>
  <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
