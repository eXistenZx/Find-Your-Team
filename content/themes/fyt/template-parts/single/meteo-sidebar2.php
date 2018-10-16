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

?>

<div class="meteo">
  <div class="meteo-card aujourd-hui">
    <h5>aujourd'hui</h5>
    <img src="<?php echo $day_0_icon; ?>" alt="">
    <h6><?php echo $day_0_condition ?></h6>
  </div>
</div>
