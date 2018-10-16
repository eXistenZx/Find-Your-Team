<?php
/*
MODIFICATION POUR RENDRE L'API AUTOMATIQUE SELON LE LIEU DE RESIDENCE DE L'UTILISATEUR
  - DÉCOMMENTER ET REMPLACER 'location' PAR LA KEY CORRESPONDANTE AU CODE POSTAL DE L'UTILISATEUR (LIGNE 10)
  - SUPPRIMER LIGNE 11
*/

// Récupération de la ville de l'utilisateur
$current_user = wp_get_current_user();
$user_location_CP = !empty(get_user_meta($current_user->ID, 'location', true)) ? get_user_meta($current_user->ID, 'location', true) : '75001';
// $user_location_CP = '06000';
// $user_location_CITY = '';
// Fonction utilisant l'api google pour convertir le nom d'une ville en coordonnées (lat, long)
function extract_longlat_from_city_name($zip_code_user)
{
  global $user_location_CITY;

  $url_api_geo="https://geo.api.gouv.fr/communes?codePostal=" . $zip_code_user . "&fields=centre&format=json&geometry=centre";

  $json_geo = file_get_contents($url_api_geo);
  $parsed_json_geo = json_decode($json_geo, true);

  $city_long = $parsed_json_geo[0]['centre']['coordinates'][0];
  $city_lat = $parsed_json_geo[0]['centre']['coordinates'][1];
  $user_location_CITY = $parsed_json_geo[0]['nom'];

  // Concaténation de la string en vue de l'intégrer à l'url de l'api météo
  $city_longlat = 'lat';
  $city_longlat .= '=';
  $city_longlat .= $city_lat;
  $city_longlat .= 'lng';
  $city_longlat .= '=';
  $city_longlat .= $city_long;

  return $city_longlat;

} //function extract_longlat_from_city_name

$coords = extract_longlat_from_city_name($user_location_CP);


// récupération des données météo au format json de la ville de l'utilisateur
$url_api = 'https://www.prevision-meteo.ch/services/json/' . $coords;

// URL API pour test (coordonnées ville Nice)
// $url_api = 'https://www.prevision-meteo.ch/services/json/lat=43.7101728lng=7.2619532';

// Appel à l'API
$json = file_get_contents($url_api);
$parsed_json = json_decode($json, true);

// Enregistrement des icones et condition des jours 0 à 3 dans des variables
$day_0_icon  =  $parsed_json['fcst_day_0']['icon'];
$day_0_condition  =  $parsed_json['fcst_day_0']['condition'];
$day_1_icon  =  $parsed_json['fcst_day_1']['icon'];
$day_1_condition  =  $parsed_json['fcst_day_1']['condition'];
$day_2_icon  =  $parsed_json['fcst_day_2']['icon'];
$day_2_condition  =  $parsed_json['fcst_day_2']['condition'];
$day_3_icon  =  $parsed_json['fcst_day_3']['icon'];
$day_3_condition  =  $parsed_json['fcst_day_3']['condition'];

global $day_0_icon,
$day_0_condition,
$day_1_icon,
$day_1_condition,
$day_2_icon,
$day_2_condition,
$day_3_icon,
$day_3_condition;
