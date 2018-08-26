Custom post registration:

function portfolio_custom_post() {
	register_post_type( 'accordion-items',
		array(
			'labels' => array(
				'name' => __( 'Accordion Items' ),
				'singular_name' => __( 'Accordion Item' )
			),
			'public' => true,
			'supports' => array('title', 'editor', 'custom-fields',),
			'has_archive' => true,
			'rewrite' => array('slug' => 'accordion-item'),
		)
	);			
}

add_action( 'init', 'portfolio_custom_post' );


//Custom taxonomy registration. Note: Here "accordion-items" is id by which connect with custom post and custom taxonomy.

	register_taxonomy(
		'accordion_category',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'accordion-items',                  //post type name
		array(
			'hierarchical'          => true,
			'label'                         => 'Accordion Category',  //Display name
			'query_var'             => true,
			'show_admin_column'             => true,
			'rewrite'                       => array(
				'slug'                  => 'accordion-category', // This controls the base slug that will display before each term
				'with_front'    => true // Don't display the category base before
				)
			)
	);
}
add_action( 'init', 'custom_post_taxonomy'); 

//Shortcode registration. Note: Here also "accordion-items" is id by which connect with custom post, custom taxonomy and the shortcode.
 
function accordion_list_shortcode($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'count' => '5',
	), $atts, 'wishlist' ) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => 'accordion-items', 'accordion_category' => $category)
        );		
		
		
	$list = '<dl class="accordion toggles">';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$list .= '
		
		<dt class="accordion-trigger"><i class="fa fa-question"></i> '.get_the_title().'</dt>
		<dd class="accordion-content">
			<p>'.get_the_content().'</p>
		</dd>
		
		';        
	endwhile;
	$list.= '</dl>';
	wp_reset_query();
	return $list;
}
add_shortcode('accordion_list', 'accordion_list_shortcode');