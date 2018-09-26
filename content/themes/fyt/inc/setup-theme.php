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
