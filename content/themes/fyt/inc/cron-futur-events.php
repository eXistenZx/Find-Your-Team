<?php

register_activation_hook(__FILE__, 'my_schedule_job');

// Fonction remote
function my_schedule_job() {
	wp_schedule_event( strtotime('00:00:00'), 'daily', 'prefix_my_event' );
}

add_action( 'prefix_my_event', 'change_daily_post_status' );

function change_daily_post_status() {

// CODE-------
}
