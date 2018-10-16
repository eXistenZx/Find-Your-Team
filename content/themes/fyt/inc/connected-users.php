<?php

// UTILISATEURS CONNECTES
function add_session_users()
{
    global $wpdb;
    if(is_user_logged_in())
    {
        $user_id = get_current_user_id();
        $wpdb->query("UPDATE wp_users SET `user_status` = '1' WHERE `wp_users`.`ID` = $user_id;");
    }
     $user_id;
}
add_action('init','add_session_users');


function delete_session_users() {
global $wpdb;
    if(is_user_logged_in())
    {
        $user_id = get_current_user_id();
        $wpdb->query("UPDATE wp_users SET `user_status` = '0' WHERE `wp_users`.`ID` = $user_id;");
    }
 $user_id;
}
add_action('wp_logout', 'delete_session_users');

function get_user_link($user_id) {
     if (!$user = get_userdata($user_id))
          return false;
     $name = $user->data->display_name;
     $login = $user->data->user_login;
     $link = ''.$name."";
     return $link;
}
function user_link($user_id) {
     print get_user_link($user_id);
}
