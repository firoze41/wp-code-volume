<?php
// pricing table

function price_shortcode($atts){
	extract( shortcode_atts( array(
		'category' => '',
		'color' => '', // this has been used for (wrapper) style css
		'count' => '4', // 4 mean only display 4 post this 4 post always default
	), $atts, 'price_do_shortcode' ) ); // this is for do_shortcode where we have to query(to show post) <?php echo do_shortcode('[price price_do_shortcode="'.get_post_meta($post->ID, 'price_table', true).'"]');
	
    $q = new WP_Query(
        array('posts_per_page' => 4, // 4 mean only display 4 post -1 mean will display all that i post & if use $count will 
					'post_type' => 'price_table', // this is custom type has been shown in CMB + taxonomy + custom-posts.php
				'price_category' => $category,  // Here (price_category) From Taxonomy	
						'meta_key'=>'price_order_id_cmd', //here (price_order_id_cmd) is for price order Need to show in  CMB in id
							'orderby'=>'meta_value_number',  //this is for price order number
								'order'=>'ASC'  //this is for price order (ASC & DESC)					
								
			)   
		);	                                                     
		
		
	$list = '
	
	<style type="text/css">
	 // input style css if needed for wrapper mean below (price_table)
	 div.price_table div.plan-price {color:'.$color.'}
     div.price_table div.plan.recommended {border-color: '.$color.';}			
	 footer.plan-footer a.primary {background:'.$color.';border:none}
	</style>
	
	<div class="price_table" style="margin-right:10px">'; // wrapper will go here
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$price_type = get_post_meta( $idd, 'price_type', true ); // This have to show on (CMB) for id
		$value_dollor = get_post_meta( $idd, 'value_dollor', true );  // This have to show on (CMB) for id
		$price_time = get_post_meta( $idd, 'price_time', true );   // This have to show on (CMB) for id
		$price_link = get_post_meta( $idd, 'price_link', true );    // This have to show on (CMB) for id
		$price_amount = get_post_meta( $idd, 'price_amount', true );   // This have to show on (CMB) for id
		$list .= '
		
		<style type="text/css">
			// input your style css if needed
		</style>
		
		<div class="column_1">
			<ul>
				<li class="header_row_1 align_center">
				<div class="pack-title">'.get_the_title().'</div>
				</li>
				
				<li class="header_row_2 align_center">
				<div class="price"><span>'.$value_dollor.' '.$price_amount.'</span></div>
				<div class="time">'.$price_time.'</div>
				</li>
				
			'.get_the_content().'
			<li class="row_style_footer_1"><a href="'.$price_link.'" class="buy_now" target="_blank">Sign Up</a></li>
			</ul>
		</div>
		';        
	endwhile;
	$list.= '</div>';
	wp_reset_query();
	return $list;
}
add_shortcode('price', 'price_shortcode');	 // this is for shortcode & do_shortcode where we have to query(to show post)

// How we have to show in html page
<?php echo do_shortcode('[price price_do_shortcode="'.get_post_meta($post->ID, 'price_table', true).'"]'); ?> 

/// <!--here price is shortcode & price_do_shortcode is optional that is wishlist-->
// <!--here price_table is custom post type-->
?>