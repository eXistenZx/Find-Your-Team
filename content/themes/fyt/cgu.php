<?php
/*
Template Name: CGU
*/
get_header();
?>
<main class="cgu-container">
    <?php
        if (have_posts()): while (have_posts()): the_post();
            get_template_part('template-parts/pages/cgu');
        endwhile;endif;
     ?>
</main>
<?php get_footer(); ?>
