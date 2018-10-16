<div class="last-events">

<?php
$display_count = 6;
// $display_count = get_theme_mod('fyt_next_posts_number');
$page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$offset = ( $page - 1 ) * $display_count;



// Arguments WP_Query
$args_query_next_events = [
  'post_type'       => 'location',
  'orderby'         =>  'date',
  'showposts'       =>  $display_count,
  'post'            =>  $page,
  'offset'          =>  $offset,
  'prev_next'       =>  True
];

// Loop query
$wp_query = new WP_Query($args_query_next_events);
if ($wp_query->have_posts()):
  while($wp_query->have_posts()):
    $wp_query->the_post();
?>

      <div class="event" style="background-color:<?php echo get_theme_mod('fyt_event_background_color');?>">

        <h4 class="event-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>

        <div class="event-date">
          <p><?php echo get_the_date('d M Y'); ?></p>
        </div>

        <div class="event-location">
           <?php echo single_post_title(); ?>
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
        Créé(e) par : <?php the_author() ?>
      </div>
    </div>


    <?php
    endwhile; endif;
    wp_reset_postdata();
    ?>

</div>
