<?php
// Retreive informations about current user
$current_user = wp_get_current_user();
    // Check if informations has been updated with interest's form
    if( isset($_POST['user-interests']) && $_POST['user-interests'] == 'update-interests') {
        $results = (empty($_POST['interests']) ? '' : $_POST['interests']);
        update_user_meta($current_user->ID, 'user_interests', $results);
    }
    // Save meta field 'user_interests' for the display
    $user_interests = get_user_meta($current_user->ID, 'user_interests');
 ?>
<div class="center-interest">
    <h5 class="user-sub-section-title">Vos centres d'intérêts</h5>
    <form class="" action="" method="post">

    <?php
    // Save categories from "event-categories" taxonomy
    $events_interests = get_terms('event-categories', ['hide_empty' => 'false']);
    // Replace the french alphabet by english alphabet
    foreach ($events_interests as $key => $category) :?>
        <?php
            $interest = strtolower($category->name);
            $interest = str_replace(' ', '-', $interest);
            $interest = str_replace('é', 'e', $interest);
            $interest = str_replace('è', 'e', $interest);
            $interest = str_replace('î', 'i', $interest);
        ?>
        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                name="interests[]"
                value="<?= $interest ?>"
                id="interest-<?= $interest ?>"
                <?php
                    foreach($user_interests as $value) {
                        if (in_array($interest, $value)) {
                            echo 'checked';
                        }
                    }
                ?>
            >
            <label class="form-check-label" for="interest-<?= $interest ?>">
                <?= $category->name; ?>
            </label>
        </div>
    <?php endforeach; ?>
    <button type="submit" name="btnregister" class="btn btn-success">Enregistrer les modifications</button>
    <input type="hidden" name="user-interests" value="update-interests">
</form>
</div>
