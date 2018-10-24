<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php bloginfo('name'); ?><?php wp_title(' - '); ?></title>
	<meta name="description" content="<?php bloginfo('name'); echo " - "; bloginfo('description');?>" />

  <?php wp_head(); ?>

		<!-- mon icon -->
	<link rel="shortcut icon" href="img/favicon.png">

		<!-- framework utilisés -->
	<link href="<?php echo get_template_directory_uri() . "/css/bootstrap.min.css"; ?>" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri() . "/css/fork-awesome.min.css"; ?>" rel="stylesheet"/>

	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet"/>
</head>

<body>
  <div id="wrapper" class="card">
    <header>
      <?php include(TEMPLATEPATH . '/components/navbar-pages.php'); ?>
	    <?php include(TEMPLATEPATH . '/components/logo.php'); ?>
	    <?php include(TEMPLATEPATH . '/components/navbar-category.php'); ?>
    </header>
    <section class="container-fluid">
      <div class="row">
