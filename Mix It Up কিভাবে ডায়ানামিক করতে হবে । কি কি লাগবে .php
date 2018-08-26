<?php

***// Mix It Up কিভাবে ডায়ানামিক করতে হবে । কি কি লাগবে ?
=========================================
*	function mixitup_menu_shortcode($atts, $content = null){
		return'<div class="boxed">'.do_shortcode($content).'</div>';

	}
	add_shortcode('mixitup_menu','mixitup_menu_shortcode');
	
	
*	function mixitup_list_shortcode($atts, $content = null){
		extract(shortcode_atts(array(
		'active'=>'',
		'filter'=>'',
		'name'=>'',
		),$atts));

		return'<li class="'.$active.'"><a href="#" data-filter="'.$filter.'">'.$name.'</a></li>';

	}
	add_shortcode('mixitup_list_shortcode','mixitup_list_shortcode');
	
*	function mixitup_content_shortcode($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'count' => '5',
	), $atts ) );
	
    $q = new WP_Query(
        array('posts_per_page' => $count, 'post_type' => 'portfolio', 'mixitup_category' => $category)
        );		
		 
		
	$list = '
		<div class="projects row">
	';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$mixitup_item_cat = get_post_meta($idd, 'mixitup_item_cat', true);
		$mixitup_small_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'mixitup_small_img' );
		$mixitup_large_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'mixitup_large_img' );
		
		
		$list .= '
		<div class="col-27 '.$mixitup_item_cat.'">
			<article class="project">
				<figure class="project-thumb">
					<img src="'.$mixitup_small_img[0].'" alt="project-1">
					<figcaption class="middle">
						<div>
							<a href="'.$mixitup_large_img[0].'" class="icon circle medium lightbox"  title="'.get_the_title().'"><i class="fa fa-search"></i></a>
							<a href="'.get_permalink().'" class="icon circle medium"><i class="fa fa-link"></i></a>
						</div>
					</figcaption>
				</figure>

				<header class="project-header">
					<h4 class="project-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>
					<div class="project-meta">Website Design</div>
				</header>
			</article>
		</div>
		';        
	endwhile;
	$list.= '</div>	';
	wp_reset_query();
	return $list;
}
add_shortcode('mixitup_content', 'mixitup_content_shortcode');

*	Custom post
	==========
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => __( 'Portfolio Item' ),
				'singular_name' => __( 'Portfolio Item' ),
				'add_new' => __( 'Add New Item' ),
				'add_new_item' => __( 'Add New Item' )
			),
		'public' => true,
		'menu_icon' => dashicons-nametag,
		'has_archive' => false,
		'rewrite' => array( 'slug' => 'portfolio' ),
		'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' )
		)
	);

*	Custom texonomy
	===============
	register_taxonomy(
		'mixitup_category',			//category support a jai nam deya hoyeche
		'portfolio',           		//post type name
		array(
			'hierarchical'          => true,
			'label'                 => 'portfolio Category',  //Display name/??? ??? show ????
			'query_var'             => true,
			'show_admin_column'     => true,
			'rewrite'               => array(
				'slug'              => 'mixitup_category', // This controls the base slug that will display before each term
				'with_front'   	    => true // Don't display the category base before
				)
			)
	);
	
*	page a নিচের কোড লিখে দিতে হবেঃ
==============================
[mixitup_menu]
[mixitup_list active="active" filter="*" name="All"][mixitup_list filter=".html" name="HTML"][mixitup_list filter=".css3" name="CSS"][mixitup_list filter=".web" name="Web Design"]
[/mixitup_menu]
[mixitup_content category=portfolio]


// my usages

[mixbefi]
[mixitup_list active="active" filter="*" name="All"][mixitup_list filter=".html" name="HTML"][mixitup_list filter=".css3" name="CSS"][mixitup_list filter=".web" name="Web Design"]
[/mixbefi]
[mixitup_content category=portfolio]












?>