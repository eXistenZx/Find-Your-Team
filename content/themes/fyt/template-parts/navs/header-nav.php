<a id="company_name" href="<?= home_url(); ?>"><?php echo get_theme_mod('fyt_header_title');?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="d-flex flex-wrap navbar-nav ml-auto">
      <?php if(is_user_logged_in()): ?>
          <div class="menu_if_connected">
              <a href="<?= home_url(); ?>">Accueil</a>
              <?php
                  $menuParameters = [
                    'container'       => false,
                    'echo'            => false,
                    'depth'           => 0,
                    'items_wrap'      => '%3$s',
                    'theme_location'  => 'primary_connected'
                  ];

                  $menu = wp_nav_menu($menuParameters);

                  echo strip_tags($menu, '<a>');
              ?>
              <?php wp_loginout(home_url(), true); ?>
          </div>
      <?php else: ?>
          <div class="menu_not_connected">
              <a href="<?= home_url(); ?>">Accueil</a>
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
          </div>
      <?php endif; ?>
      </li>
  </ul>
</div>
