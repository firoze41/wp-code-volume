//  slider dynamic in wordpress
// Use in (custom-posts.php)
register_post_type( 'slider-carosel',
    array(
      'labels' => array(
        'name' => __( 'slider carosels' ),
        'singular_name' => __( 'slider carosel' ),
		'add_new'=>_('Add New slider carosel')
      ),
      'public' => true,
      'has_archive' => true,
	  'rewrite'=> array( 'slug' => 'slider' ),
	  'supports'=> array( 'title', 'editor', 'custom-fields', 'author', 'comments', 'thumbnail' )
    )
  );

// use in (functions.php)
// For enable featured image
add_theme_support( 'post-thumbnails', array( 'post', 'slider-carosel' ) );

// for enable crop feature
add_image_size( 'slide-carosel', 620, 310, true );

// html example usage (slider.php) 
<div class="slider_left">
		<div id="banner-slide">
			<!-- start Basic Jquery Slider -->
			<ul class="bjqs">
			
			<?php if(!is_paged()) { ?>
						<?php
							$args = array( 'post_type' => 'slider-carosel', 'posts_per_page' => 5 );
							$loop = new WP_Query( $args );
						?>  
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <li><?php the_post_thumbnail('slide-carosel', array('class' => 'postthumbnails')); ?></li>						
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>
						<?php } ?>
			<!-- end Basic jQuery Slider -->

		</div>
	</div>


