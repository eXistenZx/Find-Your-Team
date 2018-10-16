<?php
/*
Template Name: Lieu
*/
get_header(); ?>

<main class="location-container">

    <?php if (have_posts()): while(have_posts()): the_post(); ?>
      <?php get_template_part('template-parts/pages/location-page'); ?>
    <?php endwhile; endif; ?>

    <div class="location-comments">
        <?php comments_template(); ?>
    </div>

  <?php get_template_part('template-parts/sidebar/sidebar'); ?>

</main>

<?php get_footer(); ?>
