<?php

create_section_contact($wp_customize, 'find_your_team_theme_panel');

function create_section_contact($wp_customize, $panel_id) {

    $wp_customize->add_section( 'fyt_contact', [
        'title' => 'Page Contact',
        'panel' => $panel_id
    ]);

    $wp_customize->add_setting('fyt_contact_email', [
        'default'   => 'contact@fyt.com'
    ]);
    $wp_customize->add_control('fyt_contact_email', [
        'type'      => 'text',
        'section'   => 'fyt_contact',
        'label'     => 'Email pour contacter l\'administrateur'
    ]);

    $wp_customize->add_setting('fyt_contact_phone', [
        'default'   => '0673531447'
    ]);
    $wp_customize->add_control('fyt_contact_phone', [
        'type'      => 'text',
        'section'   => 'fyt_contact',
        'label'     => 'Numéro de téléphone de contact'
    ]);

    $wp_customize->add_setting('fyt_contact_mailpost_company_name', [
        'default'   => 'Find Your Team'
    ]);
    $wp_customize->add_control('fyt_contact_mailpost_company_name', [
        'type'      => 'text',
        'section'   => 'fyt_contact',
        'label'     => 'Nom de votre entreprise'
    ]);

    $wp_customize->add_setting('fyt_contact_mailpost_company_address_street', [
        'default'   => '105 rue de Tolbiac'
    ]);
    $wp_customize->add_control('fyt_contact_mailpost_company_address_street', [
        'type'      => 'text',
        'section'   => 'fyt_contact',
        'label'     => 'Numéro et nom de rue'
    ]);

    $wp_customize->add_setting('fyt_contact_mailpost_company_address_zipcode', [
        'default'   => '75013'
    ]);
    $wp_customize->add_control('fyt_contact_mailpost_company_address_zipcode', [
        'type'      => 'text',
        'section'   => 'fyt_contact',
        'label'     => 'Code postal'
    ]);

    $wp_customize->add_setting('fyt_contact_mailpost_company_address_city', [
        'default'   => 'Paris'
    ]);
    $wp_customize->add_control('fyt_contact_mailpost_company_address_city', [
        'type'      => 'text',
        'section'   => 'fyt_contact',
        'label'     => 'Ville'
    ]);
}
