<?php

$menuParameters = [
  'container'       => false,
  'echo'            => false,
  'depth'           => 0,
  'items_wrap'      => '%3$s',
  'theme_location'  => 'cat_menu'
];

$menu = wp_nav_menu($menuParameters);

echo strip_tags($menu, '<a>');
?>
