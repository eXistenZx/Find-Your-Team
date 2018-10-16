<?php get_header(); ?>

<?php if(is_user_logged_in()): ?>

<main class="container-fluid">
    <div class="cat-list d-flex flex-wrap">
        <div class="cat-list-item">
            <?php get_template_part('template-parts/layouts/cat-list-linked'); ?>
        </div>
        <div class="search-form-1 col-lg-7 col-xl-4">
            <form class="" action="<?= site_url('/recherche/') ?>" method="get">
                <input type="text" name="search" placeholder="Rechercher" class="search-input">
                <button type="submit" name="button" class="search-btn fa fa-search"></button>
            </form>
        </div>
    </div>

    <section class="next-events-front-page <?php if (!get_theme_mod('fyt_next_posts_active')) {
    echo 'non-active'; } ?>">
        <?php get_template_part('template-parts/layouts/next-events-front-page'); ?>
    </section>

    <section class="last-events-front-page <?php if (!get_theme_mod('fyt_last_posts_active')) {
    echo 'non-active'; } ?>">
        <?php get_template_part('template-parts/layouts/last-events-front-page'); ?>
    </section>

    <section class="last-events-front-page ">
        <h4 class="last-event-title">Derniers lieux ajoutés</h4>
        <?php get_template_part('template-parts/layouts/locations-front-page'); ?>
    </section>

    <?php get_template_part('template-parts/sidebar/sidebar'); ?>
</main>

<?php else: ?>
  <?php  get_template_part('template-parts/pages/login-page'); ?>
<?php endif; ?>

<?php get_footer(); ?>
