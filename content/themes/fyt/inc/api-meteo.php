<?php

// Fonction utilisant l'api google pour convertir le nom d'une ville en coordonnées (lat, long)
function getXmlCoordsFromAdress($address)
{
  $coords=array();
  $base_url="http://maps.googleapis.com/maps/api/geocode/xml?";
  // ajouter &region=FR si ambiguité (lieu de la requete pris par défaut)
  $request_url = $base_url . "address=" . urlencode($address).'&sensor=false';
  $xml = simplexml_load_file($request_url) or die("url not loading");
  //print_r($xml);
  $coords['lat']=$coords['lon']='';
  $coords['status'] = $xml->status ;

  if($coords['status']=='OK') // Pour afficher une validation éventuelle utiliser $coords['status']
  {
     $coords['lat'] = $xml->result->geometry->location->lat ;
     $coords['lon'] = $xml->result->geometry->location->lng ;
  }

  return $coords;
}



// Récupération de la ville saisie dans le formulaire
// $city = $_POST['city-event'];

// Extraction de la latitude et longitude en fonction de la ville
$coords = getXmlCoordsFromAdress('nice'); // Remplacer le nom de la ville par $city quand le formulaire sera crée

// Concaténation de la string en vue de l'intégrer à l'url de l'api météo
$city_longlat = 'lat';
$city_longlat .= '=';
$city_longlat .= $coords['lat'];
$city_longlat .= 'lng';
$city_longlat .= '=';
$city_longlat .= $coords['lon'];


// $url_api = 'https://www.prevision-meteo.ch/services/json/' . $city_longlat;
$url_api = 'https://www.prevision-meteo.ch/services/json/lat=43.7101728lng=7.2619532';

// var_dump($city_longlat);
// die();

// Appel à l'API
$json = file_get_contents($url_api);
$parsed_json = json_decode($json, true);

// echo '<pre>';var_dump($parsed_json);
// die();

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
// echo $day_0_icon,
// $day_0_condition,
// $day_1_icon,
// $day_1_condition,
// $day_2_icon,
// $day_2_condition,
// $day_3_icon,
// $day_3_condition;
//
// die();
