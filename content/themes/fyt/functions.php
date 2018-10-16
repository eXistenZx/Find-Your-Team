<?php

// API météo
require get_theme_file_path('inc/api-meteo.php');

// Theme-cleaner
require get_theme_file_path('inc/theme-cleaner.php');

// Scripts & styles
require get_theme_file_path('inc/enqueue.php');

// Mise en place du setup de thème
require get_theme_file_path('inc/setup-theme.php');

// API google maps
require get_theme_file_path('inc/api-google-maps.php');

// Création login user
require get_theme_file_path('inc/create-user-settings.php');

// Customizer
require get_theme_file_path('inc/customizer/customizer.php');

// Connected users
require get_theme_file_path('inc/connected-users.php');


register_nav_menus( array(
  'logged-in'  => __( 'Logged-in Menu Area',  'fyt' ),
  'visitor' => __( 'Visitor Menu Area', 'fyt' ),
));

// sauvegarde des commentaires en BDD
add_action('comment_post','saveCommentMeta');

function saveCommentMeta($comment_id){
  add_comment_meta($comment_id,'author',true);
}

// Redirect if user is connect
function redirect_admin(){
  if(is_admin()&&!current_user_can('level_10')){
    wp_redirect(WP_HOME);
  }
}
add_action('wp_head','redirect_admin');

function add_favicon() {
  echo '<link rel="shortcut icon" href="' . home_url() . '/favicon.ico' . '" />';
}
// run function to the admin and login hooks
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');


// AJOUT DU STYLE SUR LES PASTILLES CATEGORIES DES EVENTS FRONT PAGE VIA CUSTOMIZER
function my_styles_method() {
	wp_enqueue_style(
		'custom-style',
		get_template_directory_uri('public/css/app.css')
	);
        $color_bg_cat_item = get_theme_mod('fyt_event_cat_background_color');
        $color_txt_cat_item = get_theme_mod('fyt_event_cat_font_color');
        $color_bg_calendar = get_theme_mod('fyt_calendar_background_color');
        $color_bg_calendar_days = get_theme_mod('fyt_calendar_days_background_color');
        $color_arrows_calendar = get_theme_mod('fyt_calendar_arrows_color');
        $custom_css = "
					.cat-item {
						background-color: $color_bg_cat_item !important;
            }
						.cat-link-item {
							color: $color_txt_cat_item !important;
						}
            .days-names {
              background-color: $color_bg_calendar_days !important;
            }
            .em-calendar table {
              background-color: $color_bg_calendar !important;
            }
            .em-calnav {
              color: $color_arrows_calendar;
            }
								";
        wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'my_styles_method' );
