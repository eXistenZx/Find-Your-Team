<?php
/*
Template Name: Login Page
*/

// the_post();
get_header();
?>

<div class="user-registration-container col-lg-6">
    <div class="row justify-content-center">

    	<?php
    	$error= '';
    	$success = '';
        // Variable qui sert à determiner si la création du compte est ok
        global $reg_ok;

    	global $wpdb, $PasswordHash, $current_user, $user_ID;

    	if(isset($_POST['task']) && $_POST['task'] == 'register' ) {

    		$password1 = $wpdb->esc_like(trim($_POST['password1']));
    		$password2 = $wpdb->esc_like(trim($_POST['password2']));
    		$first_name = $wpdb->esc_like(trim($_POST['first_name']));
    		$last_name = $wpdb->esc_like(trim($_POST['last_name']));
    		$email = $wpdb->esc_like(trim($_POST['email'].'@fyt.com'));
    		$username = $wpdb->esc_like(trim($_POST['username']));

    		if( $email == "" || $password1 == "" || $password2 == "" || $username == "" || $first_name == "" || $last_name == "") {
    			$error = 'Merci de remplir tous les champs.';
    		} else if(strpos($email, '@') == false) {
                $error = 'Merci d\'indiquer uniquement ce qui se trouve avant le @.';
            } else if(username_exists($username)) {
                $error = 'Ce nom d\'utilisateur n\'est pas disponible';
            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    			$error = 'Adresse email invalide.';
    		} else if(email_exists($email) ) {
    			$error = 'Cet email est déjà utilisé.';
    		} else if($password1 <> $password2 ){
    			$error = 'Mots de passe non identiques.';
    		} else {
    			$user_id = wp_insert_user( array (
                    'first_name' => apply_filters('pre_user_first_name', $first_name),
                    'last_name' => apply_filters('pre_user_last_name', $last_name),
                    'user_pass' => apply_filters('pre_user_user_pass', $password1),
                    'user_login' => apply_filters('pre_user_user_login', $username),
                    'user_email' => apply_filters('pre_user_user_email', $email),
                    'role' => 'subscriber'
                ) );
    			if( is_wp_error($user_id) ) {
    				$error= 'Un erreur est survenue lors de l\'inscription.';
    			} else {
    				do_action('user_register', $user_id);

    				$success = 'Votre compte à bien été créé ! <br>Vous allez être redirigé sur la page de connexion.';
                    $reg_ok = true;
    			}
    		}
    	}
    	?>

        <h3 class="form-title text-center col-lg-12">Formulaire d'inscription</h3>

        <div class="col-lg-12 text-center">
            <?php if($reg_ok) : ?>
                <p>Votre compte à bien été créé ! <br>Retournez sur la page d'accueil pour vous connecter.</p>
            <?php else : ?>
                <?= $error ?>
            <?php endif; ?>
        </div>
	    <form class="reg-form d-flex flex-wrap col-lg-8" method="post">

            <!-- Formulaire BOOTSTRAP -->

            <div class="input-group mb-3 col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Prénom</span>
                </div>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">
            </div>
            <div class="input-group mb-3 col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nom</span>
                </div>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>">
            </div>
            <div class="input-group col-lg-12 mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Adresse mail</span>
                </div>
              <input type="text" class="form-control" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
              <div class="input-group-append">
                <span class="input-group-text">@fyt.com</span>
              </div>
            </div>
            <div class="input-group mb-3 col-lg-12">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nom d'utilisateur</span>
                </div>
                <input type="text" class="form-control" id="username" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">
            </div>
            <div class="input-group mb-3 col-lg-12">
                <div class="input-group-prepend">
                    <span class="input-group-text">Mot de passe</span>
                </div>
                <input type="password" class="form-control" id="password1" name="password1">
            </div>
            <div class="input-group mb-3 col-lg-12">
                <div class="input-group-prepend">
                    <span class="input-group-text">Confirmation</span>
                </div>
                <input type="password" class="form-control" id="password2" name="password2">
            </div>

            <button type="submit" name="btnregister" class="btn btn-success col-2 mr-auto ml-auto mt-3">S'inscrire</button>
            <input type="hidden" name="task" value="register" />
        <!-- Fin Formulaire BOOTSTRAP -->
        </form>
    </div>
</div>

<?php
// global $reg_ok;
// // Si création de compte ok alors on redirige sur la front-page (formulaire de connexion)
// if ($reg_ok == true) {
//     header('Refresh:3; url='.home_url());
// }
get_footer();
