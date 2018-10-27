<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Ne pas t&eacute;l&eacute;charger cette page directement, merci !');
if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

<h2><?php _e('Prot&eacute;g&eacute; par mot de passe'); ?></h2>
<p><?php _e('Entrer le mot de passe pour voir les commentaires'); ?></p>

<?php return;
	}
}

	/* This variable is for alternating comment background */

$oddcomment = 'alt';

?>

<!-- You can start editing here. -->

<section class="comment-list">

  <?php if ($comments) : ?>
    <h1 class="page-title" id="comments"><i class="fa fa-fw fa-comments"></i> <?php comments_number('Pas de commentaire', 'Un commentaire', '% commentaires' );?></h1>
    <?php foreach ($comments as $comment) : ?>
      <article class="card card-comment <?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
        <aside class="media card-meta">
	        <div class="media-left">  <? echo get_avatar( get_the_author_meta('user_email'), $size = '50'); ?></div>
	        <div class="media-body"><author class="media-heading">Post&eacute; par <?php comment_author_link() ?></author><time> Le <?php comment_date('j F, Y') ?> <?php _e('&agrave;');?> <?php comment_time() ?> </time></div>
        </aside>
        <?php if ($comment->comment_approved == '0') : ?>
		      <div class="alert alert-warning"><?php _e('Votre commentaire est en cours de mod&eacute;ration'); ?></div>
 		    <?php endif; ?>
        
        <div class="comment-body">
        
          <?php comment_text() ?>
          
          <p class="mb-0 align-right"><?php edit_comment_link('<i class="fa fa-fw fa-pencil"></i>','',''); ?></p>
        </div>
      </article>

<?php /* Changes every other comment to a different class */
	if ('alt' == $oddcomment) $oddcomment = '';
	else $oddcomment = 'alt';
?>

<?php endforeach; /* end for each comment */ ?>

<?php else : // this is displayed if there are no comments so far ?>

<?php if ('open' == $post->comment_status) : ?>
	<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>

	<!-- If comments are closed. -->
<p class="nocomments alert alert-danger">Les commentaires sont ferms !</p>

	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<h1 id="respond" class="page-title"><i class="fa fa-fw fa-plus"></i> Laissez un commentaire</h1>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">connect&eacute;</a> pour laisser un commentaire.</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>

<div class="alert alert-info alert-flex" role="alert">
  <p class="mb-0"><i class="fa fa-info fa-fw" ></i> Connect&eacute; en tant que <a class="alert-link" href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.</p> 
  <p class="mb-0 align-right"><a class="alert-link" href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="D&eacute;connect&eacute; de ce compte"><i class="fa fa-fw fa-power-off"></i></a></p>
</div>



<?php else : ?>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-user"></i></span>
  </div>
  <input type="text" class="form-control" name="author" id="author" placeholder="Nom <?php if ($req) echo "(requis)"; ?>" aria-label="Username" value="<?php echo $comment_author; ?>" size="40" tabindex="1" />
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-envelope"></i></span>
  </div>
  <input type="text" class="form-control" name="email" id="email" placeholder="Courriel (ne sera pas publi&eacute;) <?php if ($req) echo "(requis)"; ?>" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" />
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-fw fa-globe"></i></span>
  </div>
  <input type="text" class="form-control" name="url" id="url" placeholder="Site Web" value="<?php echo $comment_author_url; ?>" size="40" tabindex="2" />
</div>

<?php endif; ?>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text"><i class="fa fa-fw fa-comment"></i></span>
  </div>
  <textarea class="form-control" name="comment" id="comment" aria-label="Contenu du commentaire" placeholder="Contenu du commentaire" tabindex="4"></textarea>
</div>

<p class="align-right"><input name="submit" class="btn btn-primary" type="submit" id="submit" tabindex="5" value="Envoyer" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

</section>

<?php endif; // if you delete this the sky will fall on your head ?>
