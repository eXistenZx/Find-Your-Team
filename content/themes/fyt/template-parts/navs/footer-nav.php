<a href="<?= home_url(); ?>">Accueil</a>
<?php
    $menuParameters = [
      'container'       => false,
      'echo'            => false,
      'depth'           => 0,
      'items_wrap'      => '%3$s',
      'theme_location'  => 'secondary'
    ];

    $menu = wp_nav_menu($menuParameters);

    echo strip_tags($menu, '<a>');
?>
