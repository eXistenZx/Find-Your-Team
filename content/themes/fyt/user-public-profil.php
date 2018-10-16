<?php
/*
Template Name: Page utilisateur
*/
 ?>
<?php get_header(); ?>

<section class="container-upp">
<?php
    global $user_location_CITY;
    $user_id = get_current_user_id();
    $user_info = get_userdata($user_id);  ?>

    <div class="row">
        <div class="col-sm-5">

            <div class="Prez">
              <p id="user-name"><?php echo $user_info->last_name . ' ' . $user_info->first_name?></p><br>

              <h2>Rôle</h2>
              <p id="user-role"><?php echo implode( $user_info->roles).'<br />';?></p>

              <h2>Centres d'intérêts</h2>
              <?php
                $current_id = get_current_user_id();

                $user_interests_array = get_user_meta($current_id, 'user_interests');

                foreach ($user_interests_array as $user_interests) {
                  foreach ($user_interests as $interests) {
                    ?>
                    <li><?php echo $interests; ?></li>
                    <?php
                  }
                }
              ?>

              <h2>Localisation</h2>
              <p id="user-location"><?php echo $user_info->location . ", " . $user_location_CITY ?></p>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="avatar">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Steve_Jobs_Headshot_2010-CROP2.jpg/220px-Steve_Jobs_Headshot_2010-CROP2.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <div class="contact-user">
                <button type="button"  class="btn  btn-lg"><a href="mailto:?subject=Un%20ami%20vous%20fait%20partager%20:%20&body=Découvrez%20"> Inviter à un événement</a></button>
                <br>
                <br>
                <button type="button"   class="btn  btn-lg"><a href="<?php echo get_permalink(240); ?>">Contacter par message</a></button>
            </div>
        </div>
        <div class="col-sm-7">
          <div class="user-lasts-events">
          <?php $args_query_last_events = [
                'post_type'       => 'event',
                'author'          => $user_id,
                'orderby'         =>  'date',
                'showposts'       =>  3,
                'prev_next'       => True
            ];?>
              <p id="last-public-events">Derniers événements créer</p>
                <?php $query_last_events = new WP_Query($args_query_last_events);
                if ($query_last_events->have_posts()):
                  while($query_last_events->have_posts()):
                    $query_last_events->the_post();?>
              <p class="ule"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
              <?php  endwhile; endif;
              wp_reset_postdata();?>
          </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/sidebar/sidebar'); ?>

<?php get_footer(); ?>
