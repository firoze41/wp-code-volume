function custom_post_taxonomy() {
	register_taxonomy(
		'Name_category',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'post_type_name',                  //post type name(ex: portfolio-items)
		array(
			'hierarchical'          => true,
			'label'                         => 'Name Category',  //Display name
			'query_var'             => true,
			'show_admin_column'             => true,
			'rewrite'                       => array(
				'slug'                  => 'slug_name-category', // This controls the base slug that will display before each term
				'with_front'    => true // Don't display the category base before
				)
			)
	);
}
add_action( 'init', 'custom_post_taxonomy');