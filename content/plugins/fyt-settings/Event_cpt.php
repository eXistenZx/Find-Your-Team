<?php

class Event_cpt
{
  public function __construct()
  {
    add_action('init', [$this, 'create_event_cpt']);
  }

  // Post Type Key: event
  function create_event_cpt() {

  	$labels = array(
  		'name' => __( 'event', 'Post Type General Name', 'textdomain' ),
  		'singular_name' => __( 'Événement', 'Post Type Singular Name', 'textdomain' ),
  		'menu_name' => __( 'Événements', 'textdomain' ),
  		'name_admin_bar' => __( 'Événement', 'textdomain' ),
  		'archives' => __( 'Archives des événement', 'textdomain' ),
  		'attributes' => __( 'Attributs des événements', 'textdomain' ),
  		'parent_item_colon' => __( 'Parents des événements:', 'textdomain' ),
  		'all_items' => __( 'Tous les événements', 'textdomain' ),
  		'add_new_item' => __( 'Ajouter un nouvel événement', 'textdomain' ),
  		'add_new' => __( 'Ajouter', 'textdomain' ),
  		'new_item' => __( 'Nouvel événement', 'textdomain' ),
  		'edit_item' => __( 'Modifier un événement', 'textdomain' ),
  		'update_item' => __( 'Mettre à jour un événement', 'textdomain' ),
  		'view_item' => __( 'Voir l\'événement', 'textdomain' ),
  		'view_items' => __( 'Voir les événements', 'textdomain' ),
  		'search_items' => __( 'Rechercher dans les événements', 'textdomain' ),
  		'not_found' => __( 'Aucun événement trouvé.', 'textdomain' ),
  		'not_found_in_trash' => __( 'Aucun événement trouvé dans la corbeille.', 'textdomain' ),
  		'featured_image' => __( 'Image de mise en avant', 'textdomain' ),
  		'set_featured_image' => __( 'Définir l’image de mise en avant', 'textdomain' ),
  		'remove_featured_image' => __( 'Supprimer l’image de mise en avant', 'textdomain' ),
  		'use_featured_image' => __( 'Utiliser comme image de mise en avant', 'textdomain' ),
  		'insert_into_item' => __( 'Insérer dans l\'événement', 'textdomain' ),
  		'uploaded_to_this_item' => __( 'Téléversé sur cet événement', 'textdomain' ),
  		'items_list' => __( 'Liste des événements', 'textdomain' ),
  		'items_list_navigation' => __( 'Navigation dans la liste des événements', 'textdomain' ),
  		'filter_items_list' => __( 'Filtrer la liste des événements', 'textdomain' ),
  	);
  	$args = array(
  		'label'                  => __( 'Événements', 'textdomain' ),
  		'description'            => __( '', 'textdomain' ),
  		'labels'                 => $labels,
  		'menu_icon'              => 'dashicons-groups',
  		'supports'               => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
            'author',
            'comments',
            'trackbacks',
            'page-attributes',
            'post-formats',
            'custom-fields',
      ),
  		'taxonomies'              => array(
        'Apéro',
        'Soirée',
        'Déjeuner',
        'Petit-déjeuner',
        'Resto',
        'Loisirs',
        'Divers',
        'Sport',
        'After work',
        'Pause café',
        'Réunion',
        'Week-end',
        'Dîner',
      ),
  		'public'                  => true,
  		'show_ui'                 => true,
  		'show_in_menu'            => true,
  		'menu_position'           => 5,
  		'show_in_admin_bar'       => true,
  		'show_in_nav_menus'       => true,
  		'can_export'              => true,
  		'has_archive'             => true,
  		'hierarchical'            => false,
  		'exclude_from_search'     => false,
  		'show_in_rest'            => true,
  		'publicly_queryable'      => true,
  		'capability_type'         => 'post',
      'has_archive'             => true
  	);
  	register_post_type( 'event', $args );

  }



  public function activation() {
    $this->create_event_cpt();
    //Rafraichir les permaliens
    flush_rewrite_rules();
  }
  public function deactivation() {
    //Rafraichir les permaliens
    flush_rewrite_rules();
  }

}
