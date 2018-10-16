<?php
function find_your_team_customize_register($wp_customize) {
$wp_customize->add_panel('find_your_team_theme_panel', [
  'title' => '&#10024;  FIND YOUR TEAM  &#10024;', //titre
  'description' => 'Panel de gestion pour le thème find your team', //desc
  'priority' => 1, //Emplacement);
  ]);


   /**
   * SECTION HEADER
   */
   require 'customize-header.php';


   /**
   * SECTION NEXT POSTS
   */
   require 'customize-section-events-posts.php';

   /**
   * SECTION SIDEBAR
   */
   require 'customize-sidebar.php';
   /**
   * Page de contact
   */
   require 'customize-contact.php';


}
add_action('customize_register', 'find_your_team_customize_register');
