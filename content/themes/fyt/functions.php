<?php

// API météo
// require get_theme_file_path('inc/api-meteo.php');

// Theme-cleaner
require get_theme_file_path('inc/theme-cleaner.php');

// Scripts & styles
require get_theme_file_path('inc/enqueue.php');

// Mise en place du setup de thème
require get_theme_file_path('inc/setup-theme.php');



// API météo
require get_theme_file_path('inc/api-meteo.php');

// Theme-cleaner
// require get_theme_file_path('inc/theme-cleaner.php');


register_nav_menus( array(
  'logged-in'  => __( 'Logged-in Menu Area',  'fyt' ),
  'visitor' => __( 'Visitor Menu Area', 'fyt' ),
));
