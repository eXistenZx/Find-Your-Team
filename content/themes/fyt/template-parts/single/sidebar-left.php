<aside class="sidebar-left">
  <h3 class="sidebar__title">Évenement: <?php the_title(); ?> </h3>
  <p>Date:  <?php get_the_date('Y-m-d'); ?> </p>

  <p>Heure: <?php the_time('H:i'); ?> </p>

  <p>Organisé par <?php the_author(); ?></p>

  <?php get_template_part('template-parts/single/meteo-sidebar2'); ?>




  <div id="eventMap" data-address=""></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKq4qIknSIJ_Xalpc7vNqOc2Tc50xY-fc"></script>
</aside>
