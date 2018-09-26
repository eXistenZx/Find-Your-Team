<aside class="sidebar-left">
  <h2 class="sidebar__title">Évenement: <?php the_title(); ?> </h2>
  <p>Date:  <?php get_the_date('Y-m-d'); ?> </p>




  <p>Heure: <?php the_time('H:i'); ?> </p>
  <p>Organisé par <?php the_author(); ?></p>

  <?php get_template_part('template-parts/single/meteo-sidebar2'); ?>
  <div class="calendar">


  <!--Google Maps  -->
  <div id="eventMap" data-adress="">

  </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKq4qIknSIJ_Xalpc7vNqOc2Tc50xY-fc"></script>
</aside>
