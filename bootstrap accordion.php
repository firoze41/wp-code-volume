
<?php
/* ----------------------------------------------------- */
/* Register Custom Post */
/* ----------------------------------------------------- */
function create_post_type() {  
/*****************************Bootstrap Accordion bar**************************************************/
  register_post_type( 'accordion_bar',
    array(
      'labels' => array(
        'name' => __( 'Accordion bars' ),
        'singular_name' => __( 'accordion' ),
		'add_new'=>_('Add New Accordion')
      ),
      'public' => true,
	   'menu_icon'=> 'dashicons-lock',  /* For Dashicons Menu */
      'has_archive' => true,
	  'rewrite'=> array( 'slug' => 'accordion' ),
	  'supports'=> array( 'title', 'editor', 'custom-fields', '' )
	  
    )
  ); 
  
}
add_action( 'init', 'create_post_type' );


// support taxonomy category

function taxonomy_firoze(){

	/*******Bootstrap Accordion bar start***********/
	register_taxonomy(
		'accordion_category',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'accordion_bar',   		 //post type name
		array(
			'hierarchical' 		=> true,
			'label' 			=> 'Accordion Category',  //Display name
			'query_var' 		=> true,
			'rewrite'			=> array(
				'slug' 			=> 'page-category', // This controls the base slug that will display before each term
				'with_front' 	=> false // Don't display the category base before
				)
			)
	);	
	/*******Bootstrap Accordion bar end***********/
	// create a new taxonomy

}
add_action('init' , 'taxonomy_firoze');







/*****************************Bootstrap Accordion bar**************************************************/
function items_shortcode($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'title' => '',
		'count' => '10'
	), $atts, 'items_do_shortcode' ) ); // this is for do_shortcode where we have to query(to show post)
	
    $q = new WP_Query(
        array('posts_per_page' => 10,
					'post_type' => 'accordion_bar',
				'accordion_category' => $category,  // This price_category From Taxonomy	
						'meta_key'=>'accordion_order', //this is for price order Need to show in  CMB in id
							'orderby'=>'meta_value_number',  //this is for price order number
								'order'=>'ASC'  //this is for price order 					
								
			)   
		);	                                                     
		
		
	$list = ''; // wrapper will go here
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$heading_number = get_post_meta( $idd, 'heading_number', true ); // This have to show on (CMB) for id
		$aria_expanded = get_post_meta( $idd, 'aria_expanded', true ); // This have to show on (CMB) for id
		$in_expanded = get_post_meta( $idd, 'in_expanded', true ); // This have to show on (CMB) for id 
		$list .= '
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="'.$aria_expanded.'">
  <div class="panel panel-default">	
	<div class="panel-heading" role="tab" id="heading'.$heading_number.'" style="margin-bottom:px;">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$heading_number.'" aria-expanded="'.$aria_expanded.'" aria-controls="collapse'.$heading_number.'">
         '.get_the_title().'
        </a>
      </h4>
    </div>
    <div id="collapse'.$heading_number.'" class="panel-collapse collapse '.$in_expanded.'" role="tabpanel" aria-labelledby="heading'.$heading_number.'">
      <div class="panel-body" style="color:#000;">
        '.get_the_content().'
      </div>
    </div>
	</div>
	</div>
		';        
	endwhile;
	$list.= '';
	wp_reset_query();
	return $list;
}
add_shortcode('items', 'items_shortcode');	 // this is for shortcode & do_shortcode where we have to query(to show post)


// The below code is for Bootstrap Accordion bar
/************************/

//  [items]     // here accordion is category name by that under  category  i want to show my post
/************************/	





// custom meta box usages for bootstrap accordion bar

/*****************************Bootstrap Accordion bar**************************************************/
$meta_boxes['bootstrap_accordion'] = array( 
		'id'         => 'bootstrap_accordion',
		'title'      => __( 'Bootstrap Accordion' ),
		'pages'      => array( 'accordion_bar', ), // Post type carry from (custome-posts.php)
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array(
				array(
				'name' => 'Bootstrap Accordion',
				'description' => 'Write your Number like (One, Two) Capital letter',
				'id'   => 'heading_number',
				'type' => 'text',
				),	
				
				array(
				'name' => 'Serial Order',
				'description' => 'Show Your Serials',
				'id'   => 'accordion_order',
				'type' => 'text',
				),
				
				array(
				'name' => 'Aria Expanded',
				'description' => 'If First Post Then select (true) otherise (false)',
				'id'   => 'aria_expanded',
				'type' => 'select',
					'options' => array(
					'true' => __( 'true' ),
					'false' => __( 'false' )
					
				),
				),
				array(
				'name' => 'In Expanded',
				'description' => 'Select (in) That You Want To Active(May Be For First Post) otherwise (none)',
				'id'   => 'in_expanded',
				'type' => 'select',
				
				'options' => array(
					'In' => __( 'in' ),
					'None' => __( 'none' )
					
				),
				),
			),
	);





