<aside class="sidebar-right">
  <h2 class="sidebar__title-right">Participants</h2>
  <?php
  global $wpdb;
    $post_id = $post->ID;
    $sql = "SELECT event_id FROM wp_em_events WHERE post_id = %s";
    $event_id = $wpdb->get_results($wpdb->prepare($sql, $post_id), ARRAY_A);
    // var_dump('<pre>',$event_id);
    $sql_book = "SELECT person_id FROM wp_em_bookings WHERE event_id = %s";
    $person_id_sub = $wpdb->get_results($wpdb->prepare($sql_book, $event_id[0]['event_id']));
    // var_dump($person_id_sub);
   ?>

   <ul class="subscriber-list">
     <?php
     foreach ($person_id_sub as $person) :
       $user_data = get_userdata($person->person_id);
       // var_dump($user_data);
       ?>
       <li class="mb-3"><?= get_avatar($user_data); ?><span class="ml-3 subscriber_name"><?= $user_data->display_name;?></span></li>

     <?php endforeach; ?>
   </ul>

</aside>
