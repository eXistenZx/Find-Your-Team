<?php
/*
Template Name: confirmation de création d'événement
*/
?>
<?php get_header(); ?>
<div class="" style="margin-top:150px;"></div>

<?php
// Récupération du dernier event posté
function get_the_last_post() {
	global $wpdb;
	return $wpdb->get_var("SELECT MAX( ID ) FROM wp_posts WHERE post_status = 'draft' AND post_type = 'event' ");
}
$last_post_id = get_the_last_post();
echo $last_post_id;

$args = array (
  'post_type'  => 'event',
  'post_id'    => $last_post_id,
	'posts_per_page' => 1,
	'post_status' 	=> 'draft'
);
?>
<div class="created-event-container">
<div id="content" role="main">
<?php
$cpt_post_query = new WP_Query($args);

if ( $cpt_post_query->have_posts() ) : while ( $cpt_post_query->have_posts() ) : $cpt_post_query->the_post(); ?>

		<ul style="margin-top: 150px;">
			<li>post id : <?php echo get_the_ID() ?></li>
			<li><strong>Événement: </strong><?php the_title() ?></li>
      <li><strong>Date: </strong><?php the_content(); ?></li>
      <li><strong>Heure: </strong><?php the_field('heure'); ?></li>
			<li><strong>Description: </strong><?php the_content(); ?></li>
			<li><strong>Adresse: </strong><?php the_field('adresse'); ?></li>
			<li><strong>Code postal: </strong><?php the_field('code_postal'); ?></li>
			<li><strong>Ville: </strong><?php the_field('ville'); ?></li>
			<li><strong>Catégorie: </strong><?php the_field('categorie'); ?></li>
		</ul>

		<?php endwhile; endif; ?>
	</div><!-- #content -->
</div><!-- created-event-container -->

<?php get_footer(); ?>
