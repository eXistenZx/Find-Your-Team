<?php
global $day_0_icon,
$day_0_condition,
$day_1_icon,
$day_1_condition,
$day_2_icon,
$day_2_condition,
$day_3_icon,
$day_3_condition;



setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR.ISO8859-1');
$j = strftime("%A");
$j1 = strftime("%A", strtotime("+1 day"));
$j2 = strftime("%A", strtotime("+2 day"));
$j3 = strftime("%A", strtotime("+3 day"));

?>


<div class="meteo">
  <div class="meteo-card aujourd-hui">
    <h5>aujourd'hui</h5>
    <img src="<?php echo $day_0_icon; ?>" alt="">
    <h6><?php echo $day_0_condition ?></h6>
  </div>
  <div class="meteo-card J1">
    <h5><?php echo $j1; ?></h5>
    <img src="<?php echo $day_1_icon; ?>" alt="">
    <h6><?php echo $day_1_condition ?></h6>
  </div>
  <div class="meteo-card J2">
    <h5><?php echo $j2; ?></h5>
    <img src="<?php echo $day_2_icon; ?>" alt="">
    <h6><?php echo $day_2_condition ?></h6>
  </div>
  <div class="meteo-card J3">
    <h5><?php echo $j3; ?></h5>
    <img src="<?php echo $day_3_icon; ?>" alt="">
    <h6><?php echo $day_3_condition ?></h6>
  </div>
</div>
