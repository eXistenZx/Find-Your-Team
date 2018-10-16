  <div class="location-details" >
      <h1 class="location-title"> <?php the_title(); ?></h1>
      <div class="location-image">
          <?php the_post_thumbnail('medium'); ?>
      </div>
        <?php the_content(); ?>
        <div class="mx-auto rating rating2">
        <a href="#5" title="Give 5 stars">★</a>
        <a href="#4" title="Give 4 stars">★</a>
        <a href="#3" title="Give 3 stars">★</a>
        <a href="#2" title="Give 2 stars">★</a>
        <a href="#1" title="Give 1 star">★</a>
    </div>
</div>
