<h4 class="next-events-title">
<?php echo get_theme_mod('fyt_next_posts_title');?>
</h4>
<div class="next-events">

<?php
$display_count = get_theme_mod('fyt_events_number');
$page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$offset = ( $page - 1 ) * $display_count;

// ----------------------------------
global $wpdb;
date_default_timezone_set('Europe/Paris');

// Requête SQL pour récupérer les IDs des posts event déclarés à une date ultérieure
$post_ids = $wpdb->get_results("SELECT post_id FROM wp_postmeta WHERE meta_key = '_event_start' AND meta_value >= NOW()");

// Conversion de l'objet en tableau
$post_ids = array_map( function ($item) {return (int)$item->post_id; }, $post_ids);

// Arguments WP_Query
$args_query_next_events = [
  'post_type'       => 'event',
  'post__in'        => $post_ids,
  'orderby'         =>  'date',
  'showposts'       =>  $display_count,
  'post'            =>  $page,
  'offset'          =>  $offset,
  'prev_next'       => True
];

// Loop query
$wp_query = new WP_Query($args_query_next_events);
if ($wp_query->have_posts()):
  while($wp_query->have_posts()):
    $wp_query->the_post();
    $post_id = get_the_id();
?>

      <div class="event" style="background-color:<?php echo get_theme_mod('fyt_event_background_color');?>">

        <h4 class="event-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>

        <div class="event-date">
          <p><?php echo get_the_date('d M Y'); ?></p>
        </div>

        <div class="event-time">
          <p><?php echo get_the_time('H:i'); ?></p>
        </div>

        <div class="event-cat">
          <?php echo get_the_category_list(); ?>
        </div>

        <div class="event-place">
          <?php

           $sql = $wpdb->get_results("SELECT location_name FROM wp_em_locations WHERE location_id = (SELECT location_id FROM wp_em_events WHERE post_id = $post_id)");

           foreach ($sql as $value) {
             $place = $value->location_name;
            }
           echo "<strong>" . $place . "</strong>";
           ?>
         </div>

        <div class="event-location">
          <?php

           $sql = $wpdb->get_results("SELECT location_address, location_postcode, location_town FROM wp_em_locations WHERE location_id = (SELECT location_id FROM wp_em_events WHERE post_id = $post_id)");

           foreach ($sql as $value) {
             $address = $value->location_address;
             $zip_code = $value->location_postcode;
             $city = $value->location_town;
            }
           echo $address . ', ' . $zip_code . ', ' . $city;
           ?>
         </div>


        <figure class="event-image">
          <?php the_post_thumbnail('thumbnail'); ?>
        </figure>

        <div class="event-description">
          <p><?php the_excerpt(); ?></p>
        </div>

        <div class="event-location">
          <?php  ?>
        </div>

       <div class="event-author">
        Organisé par : <?php the_author() ?>
      </div>
    </div>


    <?php
    endwhile; endif;
    wp_reset_postdata();
    ?>


</div>
