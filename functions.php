<?php 
/* functions.php
 *
 * All the function of Quarante-Douze
 *
 */
 

/* 1. Sidebar support */

  if ( function_exists('register_sidebar') )
    register_sidebar(array(
      'before_widget' => '<section id="%1$s" class="widget %2$s card card-secondary">',
      'after_widget'  => '</section>',
      'before_title'  => '<div class="section card-header"><h1>',
      'after_title'   => '</h1></div>',
    ));
    
/* 2. Niveau support (for featured posts) */

register_taxonomy(
  'niveau',
  'post',
  array(
    'label' => 'Niveau',
      'labels' => array(
      'name' => 'Niveaux',
      'singular_name' => 'Niveaux',
      'all_items' => 'Tous les niveaux',
      'edit_item' => 'Éditer le niveau',
      'view_item' => 'Voir le niveau',
      'update_item' => 'Mettre à jour le niveau',
      'add_new_item' => 'Ajouter un niveau',
      'new_item_name' => 'Nouveau niveau',
      'search_items' => 'Rechercher parmi les niveaux',
      'popular_items' => 'Niveaux les plus utilisés'
    ),
  'hierarchical' => false
  )
);

register_taxonomy_for_object_type( 'niveau', 'post' );

/* 3. Excerpt support */

function wpqdouze_post_supports() {
	add_post_type_support( 'post', 'excerpt');
}

add_action( 'init', 'wpqdouze_post_supports' );
