<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700,900&amp;subset=latin-ext" rel="stylesheet">
  <title><?php bloginfo('description'); ?></title>
  <link rel="shortcut icon" type="image/ico" href="favicon.ico">
  <link rel="icon" type="image/ico" href="favicon.ico">
</head>

<?php wp_head(); ?>

<body>

<header class="header">
  <a href="<?= home_url();?>"><img src="content/themes/fyt/app/assets/images/logo.png" alt="Logo de l'entreprise" class="logo"></a>
  <h1><?php bloginfo('description'); ?></h1>
  <?php get_template_part('template-parts/navs/header-nav'); ?>
</header>

<?php get_template_part('template-parts/sidebar/sidebar') ?>
