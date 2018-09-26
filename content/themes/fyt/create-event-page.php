<?php

/*
Template Name: Créer
*/
 ?>

<?php get_header(); ?>


<?php

global $wpdb;

if(isset($_POST['task']) && $_POST['task'] == 'register' ) {

$title = $wpdb->esc_like(trim($_POST['title_event']));
$adress = $wpdb->esc_like(trim($_POST['address_event']));
$city = $wpdb->esc_like(trim($_POST['city_event']));
$category = $wpdb->esc_like(trim($_POST['category_choice']));
$picture = $wpdb->esc_like(trim($_POST['picture_event']));
$description = $wpdb->esc_like(trim($_POST['desc_event']));


$post = array(
    'post_title' => sanitize_post($title),
    'post_content' => sanitize_post($description),
    'post_category' => array('0' => $category),
    'post_type' => 'post',
    'post_status' => 'publish'
);
wp_insert_post($post, $wp_error = false);
}
?>

<div class="availability-message">


    <?php

    if( is_wp_error($post) ) {
        $error= 'Error on post creation.';
    } else {

        $success = 'You\'re successfully register post it';
    }
    ?>
</div>



<div class="form-create">

    <h2>Création d'un nouvel évenement</h2>


    <form class="form-create-event" method="post">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Titre</label>
        <div class="col-sm-10">
          <input type="text" name="title_event" class="form-control"  placeholder="Votre titre ici" tabindex="1">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Adresse</label>
        <div class="col-sm-10">
          <input type="text" name="address_event" class="form-control"  placeholder="Adresse" tabindex="2">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Ville</label>
        <div class="col-sm-10">
          <input type="text" name="city_event" class="form-control" placeholder="Ville" tabindex="3">
        </div>
      </div>
      <div class="form-group">
        <label>Catégorie</label>
        <select class="form-control" name="category_choice" id="category_choice" tabindex="4">
          <option selected>Choisissez votre catégorie</option>
          <option value="1" >Apéro</option>
          <option value="2">Déjeuner</option>
          <option value="3">Diner</option>
          <option value="4">Loisirs</option>
          <option value="5">Non classé</option>
          <option value="6">Petit déj</option>
          <option value="7">Resto</option>
          <option value="8">Sport</option>
        </select>
      </div>
      <!-- <div class="cat-list">
        <?php wp_list_categories('hide_empty=0'); ?>
      </div> -->
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control"  name="desc_event" id="desc_event" rows="3" tabindex="5"></textarea>
      </div>
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control-file" name="picture_event" id="picture_event" tabindex="6">
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Créer</button>
        </div>
      </div>
      <input type="hidden" name="task" value="register" />
    </form>

</div>




<?php get_footer(); ?>
