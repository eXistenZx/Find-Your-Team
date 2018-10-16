<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php bloginfo('description'); ?></title>
  <link rel="shortcut icon" href="<?= home_url() . '/favicon.ico' ?>" type="image/x-icon">
  <?php wp_head(); ?>
</head>
<body>
    <!-- HEADER -->
    <header class="header">
        <nav class=" navbar fixed-top navbar-expand-lg navbar-light" style="background-color:<?php echo get_theme_mod('fyt_header_background_color');?>">
            <?php get_template_part('template-parts/navs/header-nav'); ?>
        </nav>
    </header>
    <!-- FIN HEADER -->
