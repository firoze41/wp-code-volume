<?php
global $post;
$args = array( 'posts_per_page' => 10, 'post_type'=> 'post' );
$myposts = get_posts( $args );
foreach( $myposts as $post ) : setup_postdata($post); ?>
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
<?php endforeach; ?>