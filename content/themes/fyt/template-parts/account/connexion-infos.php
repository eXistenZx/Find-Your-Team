<?php
$current_user = wp_get_current_user();
$error = '';
$update_ok = false;
global $wpdb;
// Check if we receive datas from the good form
if( isset($_POST['task']) && $_POST['task'] == 'update') {
    // save current user's data and sanitize it
    $userdata = [
        'ID' => $current_user->ID,
        'first_name' => sanitize_text_field($_POST['first_name']),
        'last_name' => sanitize_text_field($_POST['last_name']),
        'display_name' => sanitize_text_field($_POST['username']),
    ];

    // We update the password exclusively if a new password has been filled out
	if ( isset( $_POST['password1'] ) && ! empty( $_POST['password1'] ) ) {
        // Security check
        if ( !($_POST['password1'] <> $_POST['password2']) && !(strlen($_POST['password1']) < 6) && preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['password1']) ) {
            $user_password = trim( $_POST['password1']);
            $userdata[ 'user_pass' ] = apply_filters('pre_user_pass', $user_password);
            $update_ok = true;
        }
        else {
            $error = 'Votre mot de passe ne remplit pas les conditions de sécurité.';
        }
	}

	// Updating user's data
	wp_update_user( $userdata );
}
// Save current user's informations for the display
$current_user = wp_get_current_user();
?>
<h3 class="user-account-title">Vos informations de compte</h3>

    <div class="login-info">
        <h5 class="user-sub-section-title">Vos informations de connexion</h5>
        <?= $error; ?>
        <form action="" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Prénom</span>
                </div>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $current_user->user_firstname; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nom</span>
                </div>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $current_user->user_lastname; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Pseudo</span>
                </div>
                <input type="text" class="form-control" id="username" name="username" value="<?= $current_user->display_name; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Email</span>
                </div>
              <input type="text" class="form-control" value="<?= $current_user->user_email; ?>" readonly>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Mot de passe</span>
                </div>
                <input type="password" class="form-control" id="password1" name="password1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Confirmation</span>
                </div>
                <input type="password" class="form-control" id="password2" name="password2">
            </div>

            <button type="submit" name="btnregister" class="btn btn-success">Enregistrer les modifications</button>
            <input type="hidden" name="task" value="update" />
        </form>
    </div>

<?php
if ($update_ok == true) : ?>
<script type='text/javascript'>
    function register_redirect() {
        var url =  window.location.origin + '/fyt';
        window.location.replace(url);
    };
    setTimeout(register_redirect(), 20000);
</script>
<?php endif; ?>
