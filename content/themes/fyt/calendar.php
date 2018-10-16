<?php
/*
Template Name: Calendrier
*/
?>
<?php get_header(); ?>

<div class="calendar-full">
  <?php echo do_shortcode('[events_calendar full="1" long_events="1"]');?>
</div>


<?php get_template_part('template-parts/sidebar/sidebar'); ?>

<?php get_footer(); ?>
