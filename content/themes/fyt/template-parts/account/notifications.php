<?php
    // Retreive all current user informations
    $current_user = wp_get_current_user();
    // Check if datas has been submitted with notifications preferences form
    if( isset($_POST['user-notifications']) && $_POST['user-notifications'] == 'update-notifications') {
        // New event notification
        if(isset($_POST['new-events'])) {
            update_user_meta($current_user->ID, 'notif_new_event', $_POST['new-events']);
        }
        else {

            update_user_meta($current_user->ID, 'notif_new_event', false);
        }
        // Notification if there is update about an event where the user is registered
        if(isset($_POST['sub-events'])) {
            update_user_meta($current_user->ID, 'notif_sub_event', $_POST['sub-events']);
        }
        else {

            update_user_meta($current_user->ID, 'notif_sub_event', false);
        }
        // Notification when an other user be register on an own event
        if(isset($_POST['new-sub'])) {
            update_user_meta($current_user->ID, 'notif_new_sub', $_POST['new-sub']);
        }
        else {

            update_user_meta($current_user->ID, 'notif_new_sub', false);
        }
        // New private message notification
        if(isset($_POST['new-message'])) {
            update_user_meta($current_user->ID, 'notif_new_message', $_POST['new-message']);
        }
        else {

            update_user_meta($current_user->ID, 'notif_new_message', false);
        }
        // New comment nitification
        if(isset($_POST['new-comment'])) {
            update_user_meta($current_user->ID, 'notif_new_comment', $_POST['new-comment']);
        }
        else {

            update_user_meta($current_user->ID, 'notif_new_comment', false);
        }
    }

?>
<div class="notifications">
    <h5 class="user-sub-section-title">Notifications</h5>
    <form class="" action="" method="post">
        <h6 class="notification-sub-part">Événements :</h6>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="new-events" value="true" id="cb-new-event"
            <?php $is_define = get_user_meta($current_user->ID, 'notif_new_event'); if($is_define[0] == true) echo 'checked'; ?>>
            <label class="form-check-label" for="cb-new-event">
                Tous les nouveaux événements
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="sub-events" value="true" id="cb-sub-events"
            <?php $is_define = get_user_meta($current_user->ID, 'notif_sub_event'); if($is_define[0] == true) echo 'checked'; ?>>
            <label class="form-check-label" for="cb-sub-events">
                Les événements auxquels je suis inscrit(e)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="new-sub" value="true" id="cb-new-sub"
            <?php $is_define = get_user_meta($current_user->ID, 'notif_new_sub'); if($is_define[0] == true) echo 'checked'; ?>>
            <label class="form-check-label" for="cb-new-sub">
                Nouvel(le) inscrit(e) à un événement que j'ai créé
            </label>
        </div>

        <h6 class="notification-sub-part">Messages :</h6>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="new-message" value="true" id="cb-new-message"
            <?php $is_define = get_user_meta($current_user->ID, 'notif_new_message'); if($is_define[0] == true) echo 'checked'; ?>>
            <label class="form-check-label" for="cb-new-message">
                Nouveau message privé
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="new-comment" value="true" id="cb-new-comment"
            <?php $is_define = get_user_meta($current_user->ID, 'notif_new_comment');  if($is_define[0] == true) echo 'checked'; ?>>
            <label class="form-check-label" for="cb-new-comment">
                Nouveau commentaire les événements auxquels je suis inscrit(e)
            </label>
        </div>
        <button type="submit" name="btnregister" class="btn btn-success">Enregistrer les modifications</button>
        <input type="hidden" name="user-notifications" value="update-notifications">
    </form>
</div>
