
<?php if(is_user_logged_in()) : ?>
<aside class="main-sidebar">

  <div class="sidebar-menu-list">
    <ul>
      <li>Créer un événement</li>
      <li>Mes prochains événements</li>
      <li>List item</li>
      <li>List item</li>
    </ul>
  </div>


  <div class="siderbar-connected-users">
    <h6>Liste des utilisateurs connectés</h6>
    <ul>
      <li>user 1</li>
      <li>user 2</li>
      <li>user 3</li>
      <li>user 4</li>
      <li>user 5</li>
      <li>user 6</li>
    </ul>
  </div>

  <?php get_template_part('template-parts/sidebar/meteo-sidebar'); ?>
  <div class="calendar">
    <?php echo do_shortcode("[edac-availability]"); ?>
  </div>
</aside>
<?php else: ?>
<?php endif; ?>
