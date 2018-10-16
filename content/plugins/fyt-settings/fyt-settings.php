<?php
/*
Plugin Name: Find Your Team Setting
Description: Réglages pour le thème fyt: Custom Post Type
Author: 	&#9733; 	&#9733; 	&#9733; 	&#9733; Pierre 	&#9733; Quentin 	&#9733; Vito 	&#9733; Niko	&#9733; 	&#9733; 	&#9733; 	&#9733;
Version: 1.0
*/

//sécurisation du plugin pour les petits hackers malins
if (!defined('WPINC')) {
  die();
}
// Récuperation de la class Event_ctp
require plugin_dir_path(__FILE__) . 'Event_cpt.php';

// Récuperation de la class contenant les custom fields
require plugin_dir_path(__FILE__) . 'CF_event_metabox.php';

// Suppression de la personnalisation CSS native du customizer
function wpc_remove_css_section($wp_customize) {
	$wp_customize->remove_section('custom_css');
}
add_action('customize_register', 'wpc_remove_css_section', 15);


$event_cpt = new Event_cpt();
// Lors de l'activation
// Reviens à dire execute ca : $event_cpt->activation()
register_activation_hook(__FILE__, [$event_cpt, 'activation']);
// Lors de l'activation
// Reviens à dire execute ca : $event_cpt->deactivation()
register_deactivation_hook(__FILE__, [$event_cpt, 'deactivation']);
