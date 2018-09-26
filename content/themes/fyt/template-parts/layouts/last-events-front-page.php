
<section class="last-events-front-page col-lg-9">
  <h4 class="last-events-title">Derniers événements passés</h4>
  <div class="container">

    <?php
      $args_query_last_events = [
        'post_type' => 'post',
        'posts_per_page' => 8
        ,
      ];
      ?>
      <ul>

      <?php
      $query_last_events = new WP_Query($args_query_last_events);
      if ($query_last_events->have_posts()):
        while($query_last_events->have_posts()):
          $query_last_events->the_post();
      ?>
        <li class="item">
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
        </li>
      </ul>




    <?php  endwhile; endif;
      wp_reset_postdata();
    ?>
  </div>

  </div>
</section>
