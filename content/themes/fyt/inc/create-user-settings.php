<?php
/*---MODIF QUENTIN---*/

// Ajouter le lien pour récupérer le mot de passe, si l'utilisateur ne s'en souvient plus
function lien_mot_de_passe_perdu( $formbottom ) {
	$formbottom .= '<a href="' . wp_lostpassword_url() . '">Mot de passe perdu ?</a>';
	return $formbottom;
}
add_filter( 'login_form_bottom', 'lien_mot_de_passe_perdu' );


function create_user_meta($user_id) {
    $data = [['dejeuner', 'diner']];

    update_user_meta($user_id, 'location', '75001');
    update_user_meta($user_id, 'user_interests', $data);
    update_user_meta($user_id, 'notif_new_event', true);
    update_user_meta($user_id, 'notif_sub_event', true);
    update_user_meta($user_id, 'notif_new_sub', true);
    update_user_meta($user_id, 'notif_new_message', true);
    update_user_meta($user_id, 'notif_new_comment', true);
}
add_action('user_register', 'create_user_meta');

// Css personnalisé page login WP
function custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/public/css/app.css?ver=1.0" />';
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/public/fonts/" />';
}
add_action('login_head', 'custom_login');

function add_footer_login()  {
    $url = home_url();

    echo "<div class='actions'>";
        echo "<a href='".$url."' id='login-back' class=''>Accueil</a>";
        echo "<a href='".$url."/wp/wp-login.php?action=lostpassword' id='login-forget' class='opacity'>Mot de passe perdu ?</a>";
    echo "</div>";
}
add_action('login_footer','add_footer_login');

add_filter('login_errors', function($error) {
    global $errors;
    $err_codes = $errors->get_error_codes();

    if(in_array( 'incorrect_password', $err_codes)) {
        $url = site_url();
        $error = "Mauvais identifiants ?";
    }

    return $error;
});
