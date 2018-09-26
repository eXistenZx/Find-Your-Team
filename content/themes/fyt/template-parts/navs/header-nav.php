<nav class="header-nav">
    <a href="#" class="header-nav-link">Notifications</a>
    <a href="#" class="header-nav-link">Mon compte</a>
<?php if(is_user_logged_in()): ?>
    <a href="#" class="header-nav-link"><?php wp_loginout(home_url(), true); ?></a>
<?php else: ?>
<?php

$menuParameters = [
  'container'       => false,
  'echo'            => false,
  'depth'           => 0,
  'items_wrap'      => '%3$s',
  'theme_location'  => 'primary'
];

$menu = wp_nav_menu($menuParameters);

echo strip_tags($menu, '<a>');

?>
    <!-- <a href="<?= wp_registration_url(); ?>">S'inscrire</a> -->
<?php endif; ?>
</nav>
