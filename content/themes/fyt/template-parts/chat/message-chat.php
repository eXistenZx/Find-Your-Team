<?php
  global $wpdb;

  // on récupère les 10 derniers messages postés
  $array_results = $wpdb->get_results('SELECT * FROM messages ORDER BY id DESC LIMIT 0,10');
  foreach($array_results as $donnees){

 // on affiche le message
   echo '<p id="'  . $donnees->id . '">' ." ". $donnees->created_at . "<br>" . $donnees->content . "</p>";
  };



  ?>
