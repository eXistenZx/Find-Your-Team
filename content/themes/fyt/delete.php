<?php


session_start();

$event->delete();


// On redirige l'utilisateur vers la bonne page
header("Status: 301 Moved Permanently", false, 301);
header('Location: member-events.php');
exit();
