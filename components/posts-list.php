<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
  <article class="list-article" id="post-<?php the_ID(); ?>">
    <aside class="list-article-thumbnail">
      <?php the_post_thumbnail( ); ?>
    </aside>
    
    <div class="list-article-main">
      <h2 class="list-article-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>""><?php the_title(); ?></a></h2>
      <div class="list-article-metadata">
        <p class="categories">
          <?php $category = get_the_category();
            echo"<a href= '" . esc_url( get_category_link( $category[0]->term_id ) ) . "' class='badge badge-blue badge-category'>" . $category[0]->cat_name . "</a>"; ?>
        </p>
        <p class="author-time"><?php the_time('j F Y') ?> par <?php the_author() ?></p>
      </div>
      <div class="list-article-content"><?php the_excerpt(); ?></div>
    </div>
  </article>

  <?php endwhile; ?>

  <div class="navigation">
    <?php the_posts_pagination(); ?>
  </div>
  <?php endif; ?>
