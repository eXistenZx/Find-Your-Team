<?php
global $day_0_icon,
$day_0_condition,
$day_1_icon,
$day_1_condition,
$day_2_icon,
$day_2_condition,
$day_3_icon,
$day_3_condition,
$user_location_CITY;



setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
$j = strftime("%A");
$j1 = strftime("%A", strtotime("+1 day"));
$j2 = strftime("%A", strtotime("+2 day"));
$j3 = strftime("%A", strtotime("+3 day"));

?>


<div class="meteo <?php if (!get_theme_mod('fyt_meteo_sidebar_active')) {
  echo 'non-active'; } ?>" style="background-color:<?php echo get_theme_mod('fyt_sidebar_sections_background_color');?>">
  <h5>Prévisions météo de votre ville : <span><?php echo $user_location_CITY ?></span></h5>
  <div class="meteo-first-line">
    <div class="meteo-card aujourd-hui">
      <h6>aujourd'hui</h6>
      <img src="<?php echo $day_0_icon; ?>" alt="">
      <p><?php echo $day_0_condition ?></p>
    </div>
    <div class="meteo-card J1">
      <h6><?php echo $j1; ?></h6>
      <img src="<?php echo $day_1_icon; ?>" alt="">
      <p><?php echo $day_1_condition ?></p>
    </div>
  </div>

  <div class="meteo-second-line">
    <div class="meteo-card J2">
      <h6><?php echo $j2; ?></h6>
      <img src="<?php echo $day_2_icon; ?>" alt="">
      <p><?php echo $day_2_condition ?></p>
    </div>
    <div class="meteo-card J3">
      <h6><?php echo $j3; ?></h6>
      <img src="<?php echo $day_3_icon; ?>" alt="">
      <p><?php echo $day_3_condition ?></p>
    </div>
  </div>
</div>
