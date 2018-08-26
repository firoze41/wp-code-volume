//Step-1: Register custom post for mixitup.  Copy this code in fuctions.php or custom-posts.php

function portfolio_custom_post() {

	register_post_type( 'mixitup',
		array(
			'labels' => array(
				'name' => __( 'MixITUp Items' ),
				'singular_name' => __( 'Mixitup Item' )
			),
			'public' => true,
			'supports' => array('title', 'editor', 'custom-fields','thumbnail'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'mixitup'),
		)
	);
}
add_action( 'init', 'portfolio_custom_post' );

//Step-2: Register custom taxonomy for mixitup category. Copy this code in fuctions.php or custom-posts.php

function mixitup_taxonomy() {
	register_taxonomy(
		'mixitup_category',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'mixitup',                  //post type name
		array(
			'hierarchical'          => true,
			'label'                         => 'mixitup Category',  //Display name
			'query_var'             => true,
			'show_admin_column'             => true,
			'rewrite'                       => array(
				'slug'                  => 'mixitup-category', // This controls the base slug that will display before each term
				'with_front'    => true // Don't display the category base before
				)
			)
	);

}
add_action( 'init', 'mixitup_taxonomy');

/* This code for Featured Image Support copy in functions.php*/

add_theme_support( 'post-thumbnails', array( 'post', 'mixitup' ) );
set_post_thumbnail_size( 200, 200, true );
add_image_size( 'post-image', 150, 150, true );