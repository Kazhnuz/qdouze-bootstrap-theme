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

/* 4. Social Network */

function crunchify_social_sharing_buttons($content) {
	global $post;
	if(is_singular() || is_home()){
	
		// Get current page URL 
		$crunchifyURL = urlencode(get_permalink());
 
		// Get current page title
		$crunchifyTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
		$whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 
		// Add sharing button at the end of page/page content
		$content .= '<!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
		$content .= '<div class="crunchify-social">';
		$content .= '<h5>SHARE ON</h5> <a class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$content .= '<a class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		$content .= '<a class="crunchify-link crunchify-whatsapp" href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
		$content .= '<a class="crunchify-link crunchify-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		$content .= '<a class="crunchify-link crunchify-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
		$content .= '<a class="crunchify-link crunchify-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
		$content .= '<a class="crunchify-link crunchify-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank">Pin It</a>';
		$content .= '</div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'crunchify_social_sharing_buttons');
