<?php


// Modifie les liens du menu pour ajouter une classe navbar-item
function add_menuclass($ulclass) {
   return str_replace('<a ', '<a class="navbar-item"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

// Modifier le nombre de mots des extraits
function length_excerpt($length) {
	return 20;
}
add_filter('excerpt_length', 'length_excerpt');


// Modification du la search bar de WP
function custom_search($form)
{
$form = "<form method = 'get' id = 'searchform' action = ' ".site_url()." ' >";
$form .= "<input type = 'text' value=' ". esc_attr(apply_filters('the_search_query', get_search_query())) ." ' name='s' id='s' />";
$form .= "<input type = 'submit' id='searchsubmit' value=' ".esc_attr(__('Rechercher'))." ' />";
$form .= "</div>";
$form .= "</form>";

return $form;
}
add_filter('get_search_form', 'custom_search');

// Personnalisation des menus du BO en fonction du status de l'utilisateur
function custom_menu_page_removing() {
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'tools.php' );
    if (!current_user_can('customize')) {
        remove_menu_page( 'index.php' );
        remove_menu_page( 'profile.php' );
    }
}
add_action( 'admin_menu', 'custom_menu_page_removing' );

// Si l'utilisateur courant n'est pas admin alors on enleve le lien vers son profil dans la barre admin
function remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('new-content');
    $wp_admin_bar->remove_menu('wp-logo');

    if (!current_user_can('customize')) {
        $wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
        $wp_admin_bar->remove_menu('updates');          // Remove the updates link
    }
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

function wpb_remove_screen_options() {
    if(!current_user_can('customize')) {
        return false;
    }
    return true;
}
add_filter('screen_options_show_screen', 'wpb_remove_screen_options');

// Affichage de l'admin bar en fonction du rôle de l'utilisateur courant
function wpc_show_admin_bar() {
    if(current_user_can('customize')) {
        return false;
    }
    else {
        return false;
    }
}
add_filter('show_admin_bar' , 'wpc_show_admin_bar');
