<div class="login-page-container">
  <div class="row">
    <div class="home-description col-12 col-lg-6">
        <h3 class="home-description-title">Pourquoi ?</h3>
        <?php if(is_user_logged_in()): ?>
            <h1>Vous etes connecté !</h1>
        <?php endif; ?>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        <br>
        <br>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="home-form-login col-12 col-lg-4 ">
        <?php wp_login_form(); ?>
    </div>
  </div>

</div> <!--container-->

<?php get_footer(); ?>
