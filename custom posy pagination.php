<?php
$temp = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$wp_query->query('post_type=carvings' . '&paged=' . $paged . '&posts_per_page=12');
?>
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

<!-- output --> 

<?php endwhile; ?>
<?php previous_posts_link(); ?>
<?php next_posts_link(); ?>
<?php $wp_query = null; $wp_query = $temp; ?>