<?php
/**
* Template Name: Page des catégories
**/
?>

<?php  get_template_part('template-parts/layouts/cat-list') ?>

<section class="">
  <h4 class="next-events-title">Événements de la catégorie : <?php $title_page ?></h4>
  <div class="next-events row">

    <?php


      $args_query_next_events = [
        'post_type' => 'post',
        'posts_per_page' => 8,
      ];

      $query_next_events = new WP_Query($args_query_next_events);
      if ($query_next_events->have_posts()):
        while($query_next_events->have_posts()):
          $query_next_events->the_post();
      ?>
      <div class="event col-3">
        <div class="icon-meteo">
          <img src="<?php echo $day_0_icon; ?>" alt="">
        </div>
        <div class="event-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </div>

        <div class="event-description">
          <p>date : xx/xx/xxxx</p>
          <p>heure : 00h00</p>
          <p>lieu</p>
        </div>

        <div class="event-img">
          <?php the_post_thumbnail('thumbnail') ?>
        </div>

        <div class="event-excerpt">
          <?php the_excerpt() ?>
        </div>

        </div>

      <?php endwhile; ?>
      	<?php else: ?>
  	    	<p>Aucune article a été trouvé.</p>
  	<?php endif;
      wp_reset_postdata();
    ?>

  </div>
</section>
