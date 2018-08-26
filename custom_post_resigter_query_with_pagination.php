<?php 
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('showposts=6&post_type=consultant-items'.'&paged='.$paged); 

  while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>

<?php 
	$consultant_pic = get_post_meta($post->ID, 'consultant_pic', true);
?>

<div class="single_consultant">
	<img src="<?php echo $consultant_pic; ?>" alt="" />
	<?php the_content(); ?>
</div>								


<?php endwhile; ?>

<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } else { include('navigation.php'); } ?>

<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
?>