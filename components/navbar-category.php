<nav class="navbar navbar-expand-lg navbar-dark bg-grey" id="navbar-category">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav nav-justified w-100">
      <?php
        $categories = get_categories( array(
          'orderby' => 'name',
          'order'   => 'ASC'
        ) );

        foreach( $categories as $category ) {
          echo '<li class="nav-item"><a class="nav-link" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';   
        }?>
    </ul>
  </div>
</nav>
