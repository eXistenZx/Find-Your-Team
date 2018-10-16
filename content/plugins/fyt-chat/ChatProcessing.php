<?php

class ChatProcessing
{
  private $wpdb;

  public function __construct(){
    global $wpdb;

    $this->wpdb = $wpdb;
  }

  public function addMessage(){

      // Je dis au navigateur que la réponse est en JSON
      header('Content-Type: application/json; charset=utf-8');

       // si les variables ne sont pas vides
        if( !empty($_POST['content']) ){

            $user_login= wp_get_current_user();
            $created_at= date('Y-m-d H:i:s');
            // on sécurise nos données, Protège une commande SQL de la présence de caractères spéciaux
            $content = sanitize_text_field($_POST['content']);

            // puis on entre les données en base de données :
            $insertion = $this->wpdb->insert('messages', array(
                'user_login' => $user_login,
                'content' => $content,
                'created_at' => $created_at
            ));

            $json = "DONE";

        }
        else{
            $json = "Vous avez oublié de remplir un des champs !";
        }
       // J'affiche la version encodée en JSON
       echo json_encode($json);
       die();
  }

  public function getMessage(){
    // on s'assure que c'est un nombre entier
    $id = (int)$_POST['id'];
    $sql = 'SELECT * FROM messages WHERE id > "'.$id.'" ORDER BY id DESC';
    // on récupère les messages ayant un id plus grand que celui donné
    $array_results = $this->wpdb->get_results($sql);

    $messages = null;
    // on inscrit tous les nouveaux messages dans une variable
    foreach($array_results as $donnees){

        $messages = "<p id=" . $donnees->id . ">" . $donnees->user_login . "<br>" . $donnees->content . "</p>";
    }
    // enfin, on retourne les messages à notre script JS
    echo $messages;
    die();
  }
}
?>
