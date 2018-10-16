<?php
/*
Template Name: Page de gestion de compte
*/
get_header();
?>
<main class="member-account-container">
    <!-- USER'S DATA -->
    <?php get_template_part('template-parts/account/connexion-infos'); ?>
    <!-- END OF USER'S DATAS -->

    <!-- EVENTS PREFERENCES -->
    <div class="events-info">
        <!-- LOCALIZATION'S DATAS -->
        <?php get_template_part('template-parts/account/zip-code'); ?>
        <!-- END OF LOCALIZATION'S DATAS -->

        <!-- CENTER OF INTERESTS -->
        <?php get_template_part('template-parts/account/interests'); ?>
        <!-- END OF CENTER OF INTERESTS -->
    </div>
    <!-- END OF EVENTS PREFERENCES -->

    <!-- NOTIFICATION'S PREFERENCES -->
    <?php get_template_part('template-parts/account/notifications'); ?>
    <!-- END OF NOTIFICATION'S PREFERENCES -->
</main>
<?php get_footer();?>
