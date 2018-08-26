



/*For enable featured image */
add_theme_support( 'post-thumbnails', array( 'post' ) );

/*for enable crop feature */
set_post_thumbnail_size( 200, 200, true );
add_image_size( 'crop-image-id', 150, 150, true );



/* Call cropped Image */
<?php the_post_thumbnail('crop-image-id'); ?>


/*If need to class for customization*/
<?php the_post_thumbnail('crop-image-id', array('class' => 'crop-image-customization-class')); ?>