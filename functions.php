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

/* 3. Excerpt and thumbnail support */

function wpqdouze_post_supports() {
	add_post_type_support( 'post', 'excerpt');
	add_post_type_support( 'post', 'thumbnail');
}

add_action( 'init', 'wpqdouze_post_supports' );

/* 4. Social Network */

function mypost_social_sharing_buttons($content) {
  // Fork of mypost_social_sharing_buttons
  // You can find the original at the following url:
  // https://mypost_.com/how-to-create-social-sharing-button-without-any-plugin-and-script-loading-wordpress-speed-optimization-goal/
  
	global $post;
	if(is_singular() || is_home()){
	
		// Get current page URL 
		$mypost_URL = urlencode(get_permalink());
 
		// Get current page title
		$mypost_Title = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $mypost_Title = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$mypost_Thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$mypost_Title.'&amp;url='.$mypost_URL.'&amp;via=mypost_';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$mypost_URL;
		$bufferURL = 'https://bufferapp.com/add?url='.$mypost_URL.'&amp;text='.$mypost_Title;
		$whatsappURL = 'whatsapp://send?text='.$mypost_Title . ' ' . $mypost_URL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$mypost_URL.'&amp;title='.$mypost_Title;
		$diasporaURL = 'http://sharetodiaspora.github.io/?title=' . $mypost_Title . '&url=' . $mypost_URL;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$mypost_URL.'&amp;media='.$mypost_Thumbnail[0].'&amp;description='.$mypost_Title;
 
		// Add sharing button at the end of page/page content
		$content .= '<!-- based on crunchify social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
		$content .= '<div class="reagir share-buttons">';
		$content .= '<a class="btn btn-twitter" href="'. $twitterURL .'" target="_blank"><i alt="twitter" class="fa fa-fw fa-twitter"></i></a>';
		$content .= '<a class="btn btn-facebook" href="'.$facebookURL.'" target="_blank"><i alt="facebook" class="fa fa-fw fa-facebook"></i></a>';
		$content .= '<a title="Share to Diaspora*" class="btn btn-social btn-diaspora" href="'.$diasporaURL.'" target="_blank"><i class="fa fa-fw fa-diaspora"></i></a>';
		$content .= '<a class="btn btn-whatsapp" href="'.$whatsappURL.'" target="_blank"><i alt="whatsapp" class="fa fa-fw fa-whatsapp"></i></a>';
		// $content .= '<a class="btn btn-buffer" href="'.$bufferURL.'" target="_blank"><i alt="buffer" class="fa fa-fw fa-buffer"></i></a>';
		$content .= '<a class="btn btn-linkedin" href="'.$linkedInURL.'" target="_blank"><i alt="linkedin" class="fa fa-fw fa-linkedin"></i></a>';
		$content .= '<a class="btn btn-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"><i alt="Pin It" class="fa fa-fw fa-pinterest"></i></a>';
		$content .= '</div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'mypost_social_sharing_buttons');
