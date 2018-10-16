<?php
/*
Plugin Name: FYT chat
Description: chat for FindYourTeam application.
Version: 1.0.0
Author: &#9733;nico&#9733;
*/

require plugin_dir_path(__FILE__) . 'ChatProcessing.php';

function fty_chat(){
  

  $chat = new ChatProcessing();

  if (!empty($_POST['add_chat_message'])) {

    $chat->addMessage();
  }

  if (!empty($_POST['get_chat_message'])) {

    $chat->getMessage();
  }
}

add_action('plugins_loaded','fty_chat');
