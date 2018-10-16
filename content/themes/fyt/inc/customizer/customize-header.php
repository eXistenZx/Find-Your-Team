<?php

create_section_header($wp_customize, 'find_your_team_theme_panel');


function create_section_header($wp_customize, $panel_id) {


  // Ajout d'une section pour la gestion des posts sur la front page
  $wp_customize->add_section( 'fyt_header' , [
      'title' => 'Header',
      'panel' => $panel_id,
    ]);

    /* Binome pour CHANGER LE NOM DANS LE HEADER */
    // Déclaration du paramètre 'setting'
    $wp_customize->add_setting( 'fyt_header_title', [] );
    // un élément de formulaire permettant d'attribuer une valeur au setting
    $wp_customize->add_control( 'fyt_header_title', array(
      'type'        => 'text',
      'section'     => 'fyt_header',
      'label'       => 'Titre dans le header',
      // 'description' => 'Select a title for the posts'
    ) );
    /* Fin du parametrage du binome */


  /* Binome pour selectionner LA COULEUR DE FOND DU HEADER */
  // Déclaration du paramètre 'setting'
  $wp_customize->add_setting( 'fyt_header_background_color',
    array(
      'default'  =>  '#FFA500',
      // 'sanitize_callback' => 'sanitize_hex_color',
    ) );
  // un élément de formulaire permettant d'attribuer une valeur au setting
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fyt_header_background_color',
        array(
            'label' => 'Background color du header',
            'section' => 'fyt_header',
            'settings' => 'fyt_header_background_color',
        )
      )
    );
/* Fin du parametrage du binome */


}
