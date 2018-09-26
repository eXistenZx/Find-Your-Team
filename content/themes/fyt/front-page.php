<?php get_header(); ?>

<?php if(is_user_logged_in()): ?>

  <main class="front-page-container col-lg-10 ">

<?php
    if (is_user_logged_in()){
      wp_nav_menu( array(
        'menu'            => 'Logged In Menu',
        'container_class' => 'logged-in-menu',
        'theme_location'  => 'logged-in'
      ));
    } else {
      wp_nav_menu( array(
        'menu'            => 'Visitor Menu',
        'container_class' => 'visitor-menu',
        'theme_location'  => 'visitor'
      ));
    };?>

    <div class="cat-list">
      <?php  get_template_part('template-parts/layouts/cat-list') ?>
    </div>

    <!-- <?php get_template_part('template-parts/layouts/next-events-front-page'); ?> -->
    <?php get_template_part('template-parts/layouts/last-events-front-page'); ?>

  </main> <!--front-page-container-->

<?php else: ?>

  <?php  get_template_part('template-parts/pages/login-page'); ?>

<?php endif; ?>

<?php get_footer(); ?>
