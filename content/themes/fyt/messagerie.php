<?php
/*
Template Name: Messagerie
*/
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/sidebar/sidebar'); ?>


<section class="chat">
  <div class="title-chat">
    <h3>Welcome <?php
      $user_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->users  ");
      echo $user_login;
      ?> </h3>
  </div>


  <div class="messages">
    <div class="wrapper">
       <div class="screen">
         <div class="display">
           <div><?php get_template_part('template-parts/chat/message-chat'); ?></div>
         </div>
         <div class="chat-text">
           <input class="inpt-chat " type="text" id="content" name="content" placeholder="Type in your message right here !">
          <button class="btn-chat"  value="send message" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
         </div>
       </div>
     </div>

  </div>

</section>


<?php get_footer(); ?>
