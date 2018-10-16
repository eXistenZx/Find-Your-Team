<?php
/*
Template Name: Mes événements
*/
?>
<?php get_header(); ?>

<main class="member-events-container">

    <h3 class="section-title">Mes participations</h3>
    <div class="member-events-list">

    <?php
        // get current user's ID and get all of his bookings
        $current_id = get_current_user_id();
        $array_results = $wpdb->get_results($wpdb->prepare('SELECT * FROM wp_em_bookings WHERE person_id = %s', $current_id));
        $event_id = [];
        // Get all event's ID where the current user have subscribe
        foreach ($array_results as $result) {
            $event_id[] = $result->event_id;
        }
        // Get all informations about current user's booked events
        foreach ($event_id as $value) {
            $events[] = $wpdb->get_results($wpdb->prepare('SELECT * FROM wp_em_events WHERE event_id = %s', $value));
        }
        // if they are events, display excerpt (with links) of it, if not just a message
        if (!empty($events)) :
            foreach ($events as $key=>$value) : ?>
                <div class="user-events">
                    <h5 class="user-event-title">
                        <a href="<?= site_url('/event/').$value[0]->event_slug; ?>"><?= $value[0]->event_name; ?></a>
                    </h5>
                    <p class="user-event-date">Du <?= $value[0]->event_start; ?> au <?= $value[0]->event_end; ?></p>
                </div>
            <?php
            endforeach;
            else : ?>
                <p>Vous n'êtes inscrit(e) à aucun événement.</p>
        <?php endif; ?>
    </div>

    <h3 class="section-title">Les événements que j'ai créé(e)</h3>
    <div class="member-events-list">
        <?php
            // Save ID of current user
            $current_user_id = get_current_user_id();
            // Get all events where the current user is the owner
            $sql_results = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_em_events WHERE event_owner = %s", $current_user_id));
            // if there is results, we display it esle we display the message
            if(!empty($sql_results)) :
            foreach ($sql_results as $value) : ?>

                <div class="user-events">
                    <h5 class="user-event-title"><a href="<?= home_url('/event/').$value->event_slug; ?>"><?= $value->event_name; ?></a></h5>
                    <p class="user-event-date">Du <?= $value->event_start; ?> au <?= $value->event_end; ?></p>
                </div>
            <?php endforeach; else : ?>
            <p class="no-message">Vous n'avez pas créé(e) d'événements.</p>
        <?php endif; ?>
        </div>

</main>
<?php get_template_part('template-parts/sidebar/sidebar'); ?>


<?php get_footer(); ?>
