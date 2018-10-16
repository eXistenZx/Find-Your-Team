<?php

create_section_posts($wp_customize, 'find_your_team_theme_panel');


function create_section_posts($wp_customize, $panel_id) {


  // Ajout d'une section pour la gestion des posts sur la front page
  $wp_customize->add_section( 'fyt_events_posts' , [
      'title' => 'Événements affichés sur la front page',
      'panel' => $panel_id,
    ]);

  /* Binome pour l'AFFICHAGE DES NEXT EVENTS SUR LA FRONT-PAGE */
    // Déclaration du paramètre 'setting'
    $wp_customize->add_setting( 'fyt_next_posts_active', [] );
    // un élément de formulaire permettant d'attribuer une valeur au setting
    $wp_customize->add_control( 'fyt_next_posts_active', array(
        'type'      => 'checkbox',
        'section'   => 'fyt_events_posts',
        'label'     => 'Activer la section "Prochains événements"',
        ) );
  /* Fin du parametrage du binome */

  /* Binome pour CHANGER LE TITRE NEXT EVENTS */
  // Déclaration du paramètre 'setting'
  $wp_customize->add_setting( 'fyt_next_posts_title', [] );
  // un élément de formulaire permettant d'attribuer une valeur au setting
  $wp_customize->add_control( 'fyt_next_posts_title', array(
    'type'        => 'text',
    'section'     => 'fyt_events_posts',
    'label'       => 'Titre de la section next events',
    // 'description' => 'Select a title for the posts'
  ) );
  /* Fin du parametrage du binome */

  /* Binome pour l'AFFICHAGE DES LAST EVENTS SUR LA FRONT-PAGE */
    // Déclaration du paramètre 'setting'
    $wp_customize->add_setting( 'fyt_last_posts_active', [] );
    // un élément de formulaire permettant d'attribuer une valeur au setting
    $wp_customize->add_control( 'fyt_last_posts_active', array(
        'type'      => 'checkbox',
        'section'   => 'fyt_events_posts',
        'label'     => 'Activer la section "Derniers événements"',
        ) );
  /* Fin du parametrage du binome */

  /* Binome pour CHANGER LE TITRE LAST EVENTS */
    // Déclaration du paramètre 'setting'
    $wp_customize->add_setting( 'fyt_last_posts_title', [] );
    // un élément de formulaire permettant d'attribuer une valeur au setting
    $wp_customize->add_control( 'fyt_last_posts_title', array(
        'type'        => 'text',
        'section'     => 'fyt_events_posts',
        'label'       => 'Titre de la section last events',
        // 'description' => 'Select a title for the posts'
        ) );
  /* Fin du parametrage du binome */


  // /* Binome pour mentionner le LIEN DU TITRE */
  //   // Déclaration du paramètre 'setting'
  //   $wp_customize->add_setting( 'fyt_next_posts_link', [] );
  //   // un élément de formulaire permettant d'attribuer une valeur au setting
  //   $wp_customize->add_control( 'fyt_next_posts_link', array(
  //       'type'        => 'dropdown-pages',
  //       'section'     => 'fyt_events_posts',
  //       'label'       => 'Lien du titre',
  //       // 'description' => 'Select a title link for the posts'
  //       ) );
  // /* Fin du parametrage du binome */


  /* Binome pour selectionner le NOMBRE DE POSTS A AFFICHER */
    // Déclaration du paramètre 'setting'
    $wp_customize->add_setting( 'fyt_events_number', [] );
    // un élément de formulaire permettant d'attribuer une valeur au setting
    $wp_customize->add_control( 'fyt_events_number', array(
        'type'        => 'number',
        'section'     => 'fyt_events_posts',
        'label'       => 'Nombre de posts par section',
        'default'     => '4'
        // 'description' => 'Select number of the posts to show'
      ) );
  /* Fin du parametrage du binome */


  /* Binome pour selectionner LA COULEUR DE FOND DES EVENTS */
  // Déclaration du paramètre 'setting'
  $wp_customize->add_setting( 'fyt_event_background_color',
    array(
      'default'  =>  '#ffc966',
      // 'sanitize_callback' => 'sanitize_hex_color',
    ) );
  // un élément de formulaire permettant d'attribuer une valeur au setting
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fyt_event_background_color',
        array(
            'label' => 'Background color des événements',
            'section' => 'fyt_events_posts',
            'settings' => 'fyt_event_background_color',
        )
      )
    );
/* Fin du parametrage du binome */


  /* Binome pour selectionner LA COULEUR DE FOND DES CATÉGORIES */
  // Déclaration du paramètre 'setting'
  $wp_customize->add_setting( 'fyt_event_cat_background_color',
    array(
      'default'  =>  '#FFA500',
      // 'sanitize_callback' => 'sanitize_hex_color',
    ) );
  // un élément de formulaire permettant d'attribuer une valeur au setting
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fyt_event_cat_background_color',
        array(
            'label' => 'Background color des pastilles de catégories',
            'section' => 'fyt_events_posts',
            'settings' => 'fyt_event_cat_background_color',
        )
      )
    );
/* Fin du parametrage du binome */


  /* Binome pour selectionner LA COULEUR DE LA POLICE DES CATÉGORIES */
  // Déclaration du paramètre 'setting'
  $wp_customize->add_setting( 'fyt_event_cat_font_color',
    array(
      'default'  =>  '#FFFFFF',
      // 'sanitize_callback' => 'sanitize_hex_color',
    ) );
  // un élément de formulaire permettant d'attribuer une valeur au setting
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'fyt_event_cat_font_color',
        array(
            'label' => 'Couleur de la police des pastilles de catégories',
            'section' => 'fyt_events_posts',
            'settings' => 'fyt_event_cat_font_color',
        )
      )
    );
/* Fin du parametrage du binome */
}
