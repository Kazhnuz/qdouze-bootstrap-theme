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
    
    <section class="article-taxonomies">
        <div class="article-categories article-taxonomies-container">
          <?php $categories = get_the_category();
          foreach( $categories as $category ) {
            echo "<a href= '" . esc_url( get_category_link( $category->term_id ) ) . "' class='badge badge-category'>" . $category->cat_name . "</a>";
          } ?>
        </div>
      
        <div class="article-tags article-taxonomies-container">
          <?php $tags = get_the_tags();
          if ($tags) {
            foreach( $tags as $tag ) {
              echo "<a href= '" . esc_url( get_tag_link( $tag->term_id ) ) . "' class='badge badge-tag'>" . $tag->name . "</a>";
            }
          } ?>
        </div>
    </section>
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
