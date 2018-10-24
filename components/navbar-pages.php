<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand" href="#" id="" ><img src="<?php echo get_template_directory_uri();?>/img/brand-icon.png" alt="Quarante-Douze"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php $pages = get_pages();
      if ( $pages ) {
        foreach( $pages as $page ) {
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="' . get_page_link( $page->ID ) . '">'. $page->post_title .'</a>';
          echo '</li>';
        }
      }?>
    </ul>
  </div>
  </div>
</nav>
