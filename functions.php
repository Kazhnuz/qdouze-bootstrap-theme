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
      'before_title'  => '<h1 class="section card-header">',
      'after_title'   => '</h1>',
    ));
    

