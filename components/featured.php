<div id="featured-articles" class="preview-container">
  <?php
  query_posts(array( 
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'niveau',
            'terms' => 'featured',
            'field' => 'slug',
        )
    ),
    'orderby' => 'date',
    'post_count' => '2',
    'order' => 'DESC' 
  ));
  
  if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  
  <article class="preview">
    <a href="<?php the_permalink(); ?>" class="preview-link">
      <div class="preview-item" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">
		    <div class="preview-overlay">
		      <div class="preview-categories">
		        <?php $category = get_the_category();
          echo"<span class='badge badge-category'>" . $category[0]->cat_name . "</span>"; ?>
          </div>
		    
		      <h2 class="preview-title"><?php the_title();/*3*/ ?></h2>
		    </div>
      </div>
		</a>
  </article>
  
  
  <?php endwhile; ?> <?php wp_reset_query(); /*4*/ ?>
</div>
 
 


