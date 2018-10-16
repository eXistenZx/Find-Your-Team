<?php
/*
Template Name: Recherche
*/
get_header();

// Data's cheking
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM wp_em_events WHERE event_name LIKE '%".$search."%'";
    $results = $wpdb->get_results($sql);
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}
?>

<div class="search-container">
    <header class="search-header">
        <h1 class="search-title">Resultat de la recherche pour "<span><?= $_GET['search']; ?></span>"</h1>
        <div class="search-form">
            <form class="" action="<?= home_url('/recherche/'); ?>" method="get">
                <input type="text" name="search" placeholder="Rechercher" class="search-input">
                <button type="submit" name="button" class="search-btn fa fa-search"></button>
            </form>
        </div>
    </header>

    <div class="search-results">
        <?php if(!empty($results)) : ?>
            <?php foreach($results as $result) : ?>
                <div class="result">
                    <h3 class="result-title"><a href="<?= home_url('/event/'.$result->event_slug.'/'); ?>"><?= $result->event_name; ?></a></h3>
                    <p>Du <?= $result->event_start_date ?> au <?= $result->event_end_date ?></p>
                    <?php if ($result->event_all_day) : ?>
                    <p>Toute la journée</p>
                    <?php else: ?>
                        <p>Début : <?= $result->event_start_time ?></p>
                        <p>Fin : <?= $result->event_end_time ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach;?>
        <?php else : ?>
            <p class="empty-search-message">Aucun résultat pour : "<?= $search; ?>"</p>
        <?php endif; ?>
    </div>

    <div class="event-suggestion">
        <h3 class="event-suggestion-title">Ces événements pourraient aussi vous intéresser</h3>

        <div class="suggestion-results">
            <?php
                $args = [
                    'post_type' => 'event',
                    'orderby' => 'DESC',
                    'showposts' => 8
                ];

                $wp_query = new WP_Query($args);

                if ($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();
            ?>
            <div class="suggestion">
                <h3 class="suggestion-title"><a href="<?= the_permalink(); ?>"><?= the_title();?></a></h3>
                <p>Le <?= get_the_date(); ?></p>
                <div class="suggestion-image">
                    <?php the_post_thumbnail('thumbnail'); ?>
                </div>
                <p>À partir de <?= the_time(); ?></p>
            </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
