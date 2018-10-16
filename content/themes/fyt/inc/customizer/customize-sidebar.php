<?php

create_section_sidebar($wp_customize, 'find_your_team_theme_panel');


function create_section_sidebar($wp_customize, $panel_id) {


  // Ajout d'une section pour la gestion des posts sur la front page
  $wp_customize->add_section( 'fyt_sidebar' , [
      'title' => 'Sidebar',
      'panel' => $panel_id,
    ]);

  /* Binome pour l'AFFICHAGE DE LA SIDEBAR */
    // Déclaration du paramètre 'setting'
    $wp_customize->add_setting( 'fyt_sidebar_active', [] );
    // un élément de formulaire permettant d'attribuer une valeur au setting
    $wp_customize->add_control( 'fyt_sidebar_active', array(
        'type'      => 'checkbox',
        'section'   => 'fyt_sidebar',
        'label'     => 'Activer la Sidebar',
        ) );
  /* Fin du parametrage du binome */


  /* Binome pour l'AFFICHAGE DE LA METEO */
    // Déclaration du paramètre 'setting'
    $wp_customize->add_setting( 'fyt_meteo_sidebar_active', [] );
    // un élément de formulaire permettant d'attribuer une valeur au setting
    $wp_customize->add_control( 'fyt_meteo_sidebar_active', array(
        'type'      => 'checkbox',
        'section'   => 'fyt_sidebar',
        'label'     => 'Activer la section Météo',
        ) );
  /* Fin du parametrage du binome */


  /* Binome pour l'AFFICHAGE DU CALENDRIER */
    // Déclaration du paramètre 'setting'
    $wp_customize->add_setting( 'fyt_calendar_sidebar_active', [] );
    // un élément de formulaire permettant d'attribuer une valeur au setting
    $wp_customize->add_control( 'fyt_calendar_sidebar_active', array(
        'type'      => 'checkbox',
        'section'   => 'fyt_sidebar',
        'label'     => 'Activer le calendrier',
        ) );
  /* Fin du parametrage du binome */


  /* Binome pour selectionner LA COULEUR DE FOND DU CALENDRIER */
  // Déclaration du paramètre 'setting'
  $wp_customize->add_setting( 'fyt_calendar_background_color',
    array(
      'default'  =>  '#FFC966',
      // 'sanitize_callback' => 'sanitize_hex_color',
    ) );
  // un élément de formulaire permettant d'attribuer une valeur au setting
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fyt_calendar_background_color',
        array(
            'label' => 'Background color du calendrier',
            'section' => 'fyt_sidebar',
            'settings' => 'fyt_calendar_background_color',
        )
      )
    );
/* Fin du parametrage du binome */


  /* Binome pour selectionner LA COULEUR DE FOND DE LA BARRE DES JOURS */
  // Déclaration du paramètre 'setting'
  $wp_customize->add_setting( 'fyt_calendar_days_background_color',
    array(
      'default'  =>  '#FFA500',
      // 'sanitize_callback' => 'sanitize_hex_color',
    ) );
  // un élément de formulaire permettant d'attribuer une valeur au setting
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fyt_calendar_days_background_color',
        array(
            'label' => 'Background color des jours du calendrier',
            'section' => 'fyt_sidebar',
            'settings' => 'fyt_calendar_days_background_color',
        )
      )
    );
/* Fin du parametrage du binome */

  /* Binome pour selectionner LA COULEUR DES FLECHES DE NAV DES MOIS*/
  // Déclaration du paramètre 'setting'
  $wp_customize->add_setting( 'fyt_calendar_arrows_color',
    array(
      'default'  =>  'white',
      // 'sanitize_callback' => 'sanitize_hex_color',
    ) );
  // un élément de formulaire permettant d'attribuer une valeur au setting
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fyt_calendar_arrows_color',
        array(
            'label' => 'Couleur des flèches de la nav calendrier',
            'section' => 'fyt_sidebar',
            'settings' => 'fyt_calendar_arrows_color',
        )
      )
    );
/* Fin du parametrage du binome */


  /* Binome pour l'AFFICHAGE DU LOGO */
    // Déclaration du paramètre 'setting'
    $wp_customize->add_setting( 'fyt_logo_sidebar_active', [] );
    // un élément de formulaire permettant d'attribuer une valeur au setting
    $wp_customize->add_control( 'fyt_logo_sidebar_active', array(
        'type'      => 'checkbox',
        'section'   => 'fyt_sidebar',
        'label'     => 'Activer le logo',
        ) );
  /* Fin du parametrage du binome */


  /* Binome pour selectionner LA COULEUR DE FOND DE LA SIDEBAR */
  // Déclaration du paramètre 'setting'
  $wp_customize->add_setting( 'fyt_sidebar_background_color',
    array(
      'default'  =>  '#FFA500',
      // 'sanitize_callback' => 'sanitize_hex_color',
    ) );
  // un élément de formulaire permettant d'attribuer une valeur au setting
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fyt_sidebar_background_color',
        array(
            'label' => 'Background color de la sidebar',
            'section' => 'fyt_sidebar',
            'settings' => 'fyt_sidebar_background_color',
        )
      )
    );
/* Fin du parametrage du binome */


  /* Binome pour selectionner LA COULEUR DE FOND DES SECTIONS DE LA SIDEBAR */
  // Déclaration du paramètre 'setting'
  $wp_customize->add_setting( 'fyt_sidebar_sections_background_color',
    array(
      'default'  =>  '#FFC966',
      // 'sanitize_callback' => 'sanitize_hex_color',
    ) );
  // un élément de formulaire permettant d'attribuer une valeur au setting
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fyt_sidebar_sections_background_color',
        array(
            'label' => 'Background color des sections de la sidebar',
            'section' => 'fyt_sidebar',
            'settings' => 'fyt_sidebar_sections_background_color',
        )
      )
    );
/* Fin du parametrage du binome */



}
