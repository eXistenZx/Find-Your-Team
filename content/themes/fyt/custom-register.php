<?php
/*
Template Name: Inscription
*/
get_header();
?>
<?php
    	$error= '';
    	$success = '';
        // This variable define if the account's creation is ok
        $reg_ok = false;
        /*---FORM'S DATAS PROCESSING---*/
    	global $wpdb;
        // check if data have been send et if it's the good form
    	if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
            // Delete whites spaces
    		$password1 = trim($_POST['password1']);
    		$password2 = trim($_POST['password2']);
    		$first_name = trim($_POST['first_name']);
    		$last_name = trim($_POST['last_name']);
    		$email = trim($_POST['email'].'@fyt.com');
    		$username = trim($_POST['username']);
            // Error's checking
    		if( $email == "" || $password1 == "" || $password2 == "" || $username == "" || $first_name == "" || $last_name == "") {
    			$error = 'Merci de remplir tous les champs.<br>';
    		} else if(strpos($email, '@') == false) {
                $error .= 'Merci d\'indiquer uniquement ce qui se trouve avant le @.<br>';
            } else if(username_exists($username)) {
                $error .= 'Ce nom d\'utilisateur n\'est pas disponible.<br>';
            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    			$error .= 'Adresse email invalide.<br>';
    		} else if(email_exists($email) ) {
    			$error .= 'Cet email est déjà utilisé.<br>';
    		} else if($password1 <> $password2 ){
    			$error .= 'Mots de passe non identiques.<br>';
    		} else if(strlen($password1) < 6) {
                $error .= "Vous devez définir un mot de passe de 6 caracteres minimum.<br>";
            } else if(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password1)) {
                $error .= 'Votre mot de passe doit contenir au moins une majuscule, un chiffre, et un caractère spécial.<br>';
            } else {
                // save user data after apply filter on
    			$user_id = wp_insert_user( array (
                    'first_name' => apply_filters('pre_user_first_name', $first_name),
                    'last_name' => apply_filters('pre_user_last_name', $last_name),
                    'user_pass' => apply_filters('pre_user_pass', $password1),
                    'user_login' => apply_filters('pre_user_login', $username),
                    'user_email' => apply_filters('pre_user_email', $email),
                    'role' => 'contributor'
                ) );
        /*---END OF FORM'S DATAS PROCESSING---*/
                // if they are errors display message, if not do registration and display success message
    			if( is_wp_error($user_id) ) {
    				$error= 'Une erreur est survenue lors de l\'inscription.';
    			} else {
    				do_action('user_register', $user_id);
    				$success = 'Votre compte à bien été créé ! <br>Vous allez être redirigé sur la page de connexion.<br>Cliquez sur le bouton "Accueil" si ce n\'est pas le cas.';
                    $reg_ok = true;
    			}
    		}
    	}
?>

<div class="user-registration-container col-sm-8 col-md-10">
    <div class="row justify-content-center">
        <h3 class="form-title text-center col-lg-12">Formulaire d'inscription</h3>
        <div class="col-lg-12 text-center">
            <?php if($reg_ok) : ?>
                <p><?= $success ?></p>
                <a class="btn btn-success mb-5" href="<?= home_url(); ?>">Accueil</a>
            <?php else : ?>
                <p><?= $error ?></p>
            <?php endif; ?>
        </div>
	    <form action="" class="register-form d-flex flex-wrap col-lg-10 col-xl-8" method="post">
            <div class="input-group mb-3 col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Prénom</span>
                </div>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>" required>
            </div>
            <div class="input-group mb-3 col-lg-6">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nom</span>
                </div>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>" required>
            </div>
            <div class="input-group col-lg-12 mb-3">
                <div id="text-input-mail" class="input-group-prepend">
                    <span  class="input-group-text">Email</span>
                </div>
              <input type="text" class="form-control" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
              <div id="domain-input-mail" class="input-group-append">
                <span class="input-group-text">@fyt.com</span>
              </div>
            </div>

            <div class="input-group mb-3 col-lg-12">
                <div class="input-group-prepend">
                    <span class="input-group-text">Pseudo</span>
                </div>
                <input type="text" class="form-control" id="username" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>" required>
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

            <button type="submit" name="btnregister" class="btn btn-success col-3 col-xl-2 mr-auto ml-auto mt-3">S'inscrire</button>

            <input type="hidden" name="task" value="register" />

        </form>
    </div>
</div>

<!-- CONNECTION'S FORM REDIRECTION-->
<?php
// If account's creation is ok, we redirect to front-page (connection's form)
if ($reg_ok == true) {
?>
<script language="JavaScript">
    function register_redirect() {
        var url =  window.location.origin + '/fyt';
        window.location.replace(url);
    };
    setTimeout(register_redirect(), 10000);
</script>
<?php
}
?>
<!-- END OF CONNECTION'S FORM REDIRECTION -->

<?php get_footer(); ?>
