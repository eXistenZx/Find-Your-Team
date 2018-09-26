<?php
// Supprime WP EMOJI
remove_action( 'wp_head', 'print_emoji_detection_script', 7);
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_print_styles', 'print_emoji_styles');

// Supprime le lien vers Windows Live Editor Manifest
remove_action( 'wp_head', 'wlwmanifest_link' );

// Supprime le lien RSD + XML
remove_action( 'wp_head', 'rsd_link' );

// Supprime la meta generator
remove_action( 'wp_head', 'wp_generator' );

// Supprime les extra feed rss
remove_action( 'wp_head', 'feed_links_extra', 3 );

// Supprime les feeds des Posts et des Commentaires
// remove_action( 'wp_head', 'feed_links', 2 );

//
// //Remove WordPress Footer Credits
// function wpo_remove_footer_admin() {
// 	return 'Powered by Find Your Team';
//   echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Designed by <a href="http://www.pierre-tordjman.com" target="_blank">Pierre Quentin Niko et Vito, les artistes de Wordpress</a>';
// }
// add_filter('admin_footer_text', 'wpo_remove_footer_admin');
