<?php get_header(); ?>

<div class="event-presentation">

  <?php get_template_part('template-parts/single/sidebar-left'); ?>

  <?php if (have_posts()): while(have_posts()): the_post(); ?>
    <?php get_template_part('template-parts/single/card'); ?>
  <?php endwhile; endif; ?>

  <?php get_template_part('template-parts/single/sidebar-right'); ?>

  <?php get_template_part('template-parts/single/textarea'); ?>

</div>

<?php get_footer(); ?>
