<?php

echo do_shortcode('[categories_list hide_empty=0 pagination=0]<li>#_CATEGORYLINK</li>[/categories_list]');

?>
<div class="cat-list2">
<?php

global $wpdb;
// Requête SQL pour récupérer les IDs des catégories
$cat_events_id = $wpdb->get_results("SELECT term_taxonomy_id FROM wp_term_taxonomy WHERE taxonomy = 'event-categories'");
// var_dump($cat_events_id);

$cat_events_id = array_map( function ($item) {return (int)$item->term_taxonomy_id; }, $cat_events_id);
// var_dump($cat_events_id);

$cat_events_name = '(';
$cat_events_name .= implode(',', $cat_events_id);
$cat_events_name .= ')';

// echo $cat_events_name;

$cat_events_name_obj = $wpdb->get_results("SELECT name FROM wp_terms WHERE term_id IN $cat_events_name");
// var_dump($cat_events_name_obj);

$cat_events_name_array = array_map( function ($item) {return $item->name; }, $cat_events_name_obj);
// var_dump($cat_events_name_array);

foreach ($cat_events_name_array as $cat_events_name) {
  echo "<li>" .   $cat_events_name . "</li>";
}

?>
</div>
