<?php
/*
Plugin Name: Dynamic Menu for Logged In Users
Plugin URI: http://cozmoslabs.com
Description: Serve different menus for logged in / logged out users!
Author: Cristian Antohe
Version: 1.0
Author URI: http://www.cozmoslabs.com/
*
 * Copyright (c) 2011-2013 Cristian Antohe - Cozmoslabs.com
 *
 *     This file is a plugin for WordPress.
 *
 *     Dynamic Menu for Logged In Users is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 2 of the License, or (at your option)
 *     any later version.
 *
 *     Dynamic Menu for Logged In Users is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
*/
// we're cloning existing theme_locations and creating _loggedin ones.
add_action( 'init', 'register_loggedin_menus', 9999 );
function register_loggedin_menus() {
  $default_menus = get_registered_nav_menus();
  $loggedin_menus = array();

  foreach ($default_menus as $slug => $name){
  $loggedin_menus[$slug . '_dmlu_loggedin'] = $name . ' Loggedin';
  }

  register_nav_menus(
	$loggedin_menus
  );
}
// depending on the current menu arguments, if there exists a _loggedin theme location we're using that when user is logged in.
add_filter('wp_nav_menu_args', 'serve_different_menu');
function serve_different_menu($content){
	$loggedin_theme_location = $content['theme_location'] . '_dmlu_loggedin';
	$active_menu_locations = get_nav_menu_locations();

	if ( is_user_logged_in() && !empty($content['theme_location']) && $active_menu_locations[$loggedin_theme_location] != 0 && array_key_exists($loggedin_theme_location, $active_menu_locations) ) {
		$content['theme_location'] = $content['theme_location'] . '_dmlu_loggedin';
		return $content;
	} else {
		return $content;
	}
}
