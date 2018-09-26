<?php
// Si ma fonction n'existe pas...
if (!function_exists('fyt_setup')) {
  // Theme setup, fonctionnalités etc...
  function fyt_setup() {
    // RSS automatique
    add_theme_support( 'automatic-feed-links' );
    // Génération automatique du titre
    add_theme_support( 'title-tag' );
    // Support des images mise en avant
    add_theme_support('post-thumbnails');
    register_nav_menus([
    	'primary' => __( 'Menu d\'en-tête', 'fyt' ),
    	'sidebar_menu' => __( 'Menu de la sidebar', 'fyt' ),
    	'secondary' => __( 'Menu du pied de page', 'fyt' )
    ]);
  }
}
add_action( 'after_setup_theme', 'fyt_setup' );
// Si ma fonction n'existe pas...
if (!function_exists('fyt_scripts')) {
  // Ajout des css & js au chargement de wp_head()
  function fyt_scripts() {
      wp_enqueue_style( 'fyt-app-css',
        get_theme_file_uri('public/css/app.css'),
        [],
        '1.0');
      wp_enqueue_style( 'fyt-vendor-css',
        get_theme_file_uri('public/css/vendor.css'),
        [],
        '1.0');
      wp_enqueue_script('fyt-vendor-js',
        get_theme_file_uri('public/js/vendor.js'),
        [],
        '1.0');
      wp_enqueue_script('fyt-app-js',
        get_theme_file_uri('public/js/app.js'),
        ['fyt-vendor-js'],
        '1.0');
  }
}
  add_action('wp_enqueue_scripts', 'fyt_scripts');

function enqueue_bootstrap() {
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.css' );
  // Ces deux lignes ne sont utiles que si vous utilisez les fonctionnalites JavaScript
  wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.js', 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap' );
