<div class="card" >
    <?php
        $urlImage = get_post_thumbnail_id();
        $urlImage = wp_get_attachment_image_src($urlImage,'large');
        $urlImage = $urlImage[0];
        // echo $urlImage;
     ?>
    <div class="event-bg-head" style="background-image: url(<?= $urlImage ?>);">
    </div>
    <div class="card-body">

  <!-- recover the link to share, the title of the article and then create the share links by email. -->
  <?php
      $lien = get_permalink();
      $titre = strip_tags(get_the_title());
      $mail_link = 'mailto:?subject=' . $titre . '&body=' . $titre . ' - ' . $lien ;
    ?>

    <h1 class="card-title"> <?php the_title(); ?><a href="<?php echo $mail_link; ?>"><i class="fa fa-share-alt-square"></i></a></h1>

    <?php the_content(); ?>
    </div>
</div>
