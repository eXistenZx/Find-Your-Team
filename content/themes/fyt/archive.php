<?php

get_header();


$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_exp = explode('/', $url);
$url_count = count($url_exp);
$category = $url_exp[$url_count - 2];

// Get current URL
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// Explode URL at '/'
$url_exp = explode('/', $url);
// Get array's length
$url_count = count($url_exp);
// We know the current category slug are in penultimate position, so we search the good index
$category = $url_exp[$url_count - 2];
// Get datas of current's category
$term = get_term_by('slug', $category, 'event-categories');
?>

<main class="archive-container">
    <h1 class="archive-title">Événements de la catégorie : <br><?= $term->name; ?></h1>
    <div class="archive-events">

        <?php
            $term_id =  $term->term_id;
            $term_slug = $term->slug;

            $args = array (
              'post_type'  => 'event',
              'event-categories' => $category,
            );

            $cpt_post_query = new WP_Query($args);

            if ( $cpt_post_query->have_posts() ) : while ( $cpt_post_query->have_posts() ) : $cpt_post_query->the_post();
        ?>

        <div class="archive-event">
            <h5 class="archive-event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p class="archive-event-date"><?= get_the_date('d M Y'); ?></p>
            <p class="archive-event-time"><?= get_the_time('H:i'); ?></p>
            <figure class="event-image">
              <?php the_post_thumbnail('thumbnail'); ?>
            </figure>
            <p class="archive-event-excerpt"><?php the_excerpt(); ?></p>
            <p class="archive-event-owner">Organisateur : <?php the_author(); ?></p>
        </div>

        <?php
            endwhile;endif;
            wp_reset_postdata();
         ?>
    </div>
</main>

<?php get_footer(); ?>
