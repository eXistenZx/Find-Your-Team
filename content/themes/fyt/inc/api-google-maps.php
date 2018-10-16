<?php 
function my_acf_google_map_api( $api ){

	$api['key'] = 'AIzaSyDKq4qIknSIJ_Xalpc7vNqOc2Tc50xY-fc';

	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
