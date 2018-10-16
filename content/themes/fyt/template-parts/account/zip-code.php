    <?php
    // Retreive all informations about current user
    $current_user = wp_get_current_user();

    // Check if there is an update about zip code, if the new zip code has 5 characters and if they are integers
    if( !empty($_POST['user-location']) && (strlen($_POST['user-location']) == 5) && ctype_digit($_POST['user-location'])) {

        update_user_meta($current_user->ID, 'location', $_POST['user-location']);
    }

    // Save meta field 'location' content for the display
    $user_location = get_user_meta($current_user->ID, 'location');
     ?>
    <div class="location">
        <h5 class="user-sub-section-title">Votre localisation (code postal)</h5>
    <form class="" action="" method="post">
      <div class="form-group">
          <input type="text" class="form-control text-center" name="user-location" value="<?= $user_location[0]; ?>">
      </div>
      <button type="submit" name="btnregister" class="btn btn-success">Enregistrer les modifications</button>
  </form>
    </div>
