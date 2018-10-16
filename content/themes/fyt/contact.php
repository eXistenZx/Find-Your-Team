<?php
/*
Template Name: Contact
*/
get_header();
 ?>
 <main class="contact-container-login">
   <?php if (is_user_logged_in()) : ?>
    <div class="contact-form-container">
      <h1 class="contact-title">Contacter l'administrateur</h1>
        <form class="contact-form" action="" method="post">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Prénom</span>
                </div>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $current_user->user_firstname; ?>">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Nom</span>
                </div>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $current_user->user_lastname; ?>">
            </div>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text">Email</span>
              </div>
            <input type="text" class="form-control" value="<?= $current_user->user_email; ?>" readonly>
          </div>
        <div class="contact-textarea form-group">
            <label for="contact-message">Votre message</label>
            <textarea class="form-control" id="contact-message" rows="5"></textarea>
        </div>
        <div class="contact-submit">
            <button type="button" name="btnregister" class="btn btn-success contact-btn">Envoyer</button>
        </div>
        </form>
      <?php else: ?>
      <main class="contact-container-logout">
        <h1 class="contact-title">Contacter l'administrateur</h1>

        <p class="contact-mail btn btn-success"><a href="mailto:<?= empty(get_theme_mod('fyt_contact_email')) ? 'contact@fyt.com' : get_theme_mod('fyt_contact_email') ?>"><i class="fa fa-envelope-o mr-2" aria-hidden="true"></i> Par email</a></p>
        <p class="contact-phone btn btn-success"><a href="tel:+33<?= empty(get_theme_mod('fyt_contact_phone')) ? '0673531447' : get_theme_mod('fyt_contact_phone') ?>"><i class="fa fa-phone mr-2" aria-hidden="true"></i><?= empty(get_theme_mod('fyt_contact_phone')) ? '0673531447' : get_theme_mod('fyt_contact_phone') ?></a></p>
        <div class="contact-mailpost">
          <p class="contact-mailpost-title">Par voie postale :</p>
          <p><?= empty(get_theme_mod('fyt_contact_mailpost_company_name')) ? 'Find Your Team' : get_theme_mod('fyt_contact_mailpost_company_name') ?></p>
          <p><?= empty(get_theme_mod('fyt_contact_mailpost_company_address_street')) ? '105 rue de Tolbiac' : get_theme_mod('fyt_contact_mailpost_company_address_street') ?></p>
          <p>
              <?= empty(get_theme_mod('fyt_contact_mailpost_company_address_zipcode')) ? '75001' : get_theme_mod('fyt_contact_mailpost_company_address_zipcode') ?>
              <?= empty(get_theme_mod('fyt_contact_mailpost_company_address_city')) ? 'Paris' : get_theme_mod('fyt_contact_mailpost_company_address_city') ?>
          </p>
        </div>
      </main>
      <?php endif; ?>
    </div>
 </main>
<?php get_footer(); ?>
