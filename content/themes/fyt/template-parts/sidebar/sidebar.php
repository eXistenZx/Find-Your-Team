<?php if(is_user_logged_in()) : ?>
<aside class="main-sidebar <?php if (!get_theme_mod('fyt_sidebar_active')) {
  echo 'non-active'; } ?>" style="background-color:<?php echo get_theme_mod('fyt_sidebar_background_color');?>">

          <div class="search-form-2">
            <form class="" action="<?= site_url('/recherche/') ?>" method="get">
                <input type="text" name="search" placeholder="Rechercher" class="search-input">
                <button type="submit" name="button" class="search-btn fa fa-search"></button>
            </form>
        </div>

  <div class="sidebar-menu-list" style="background-color:<?php echo get_theme_mod('fyt_sidebar_sections_background_color');?>">
    <ul>
      <li><a href="<?=site_url()?>/wp-admin/post-new.php?post_type=event">Créer un événement</a></li>
      <li><a href="<?php echo get_permalink(350); ?>">Mes événements</a></li>
    </ul>
  </div>

  <div class="siderbar-connected-users" style="background-color:<?php echo get_theme_mod('fyt_sidebar_sections_background_color');?>">
    <h6>Liste des utilisateurs connectés</h6>

    <?php
    $users=$wpdb->get_results( "SELECT display_name FROM wp_users WHERE user_status='1'");

      $users = array_map( function ($item) {return $item->display_name; }, $users); ?>
      <ul>
         <?php
        foreach( $users as $logged_user )
        {
        ?>
        <li><a href="<?php echo get_permalink(149);?>"><?php echo $logged_user ?></a></li>
       <?php } ?>
     </ul>

  </div>

  <?php get_template_part('template-parts/sidebar/meteo-sidebar'); ?>

  <div class="em-calendar <?php if (!get_theme_mod('fyt_calendar_sidebar_active')) {
    echo 'non-active'; } ?>">
    <?php echo do_shortcode('[events_calendar long_events=1]'); ?>
  </div>
  <div class="logo-sidebar <?php if (!get_theme_mod('fyt_logo_sidebar_active')) {
    echo 'non-active'; } ?>">
    <img class="" src="<?php echo get_theme_file_uri('app/assets/images/logo.png'); ?>" alt="logo">
  </div>
</aside>
<?php else: ?>
<?php endif; ?>
