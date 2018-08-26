<?php
function p_shortcode($atts){
	extract( shortcode_atts( array(
		'category' => ''
	), $atts, 'anyname' ) );
	
    $q = new WP_Query(
        array('posts_per_page' => '-1', 'post_type' => 'mixitup')
        );		
	//Given -1 for showing unlimited post and post name must be same as custom post and taxonomy post name(mixitup)	.

//Portfolio taxanomy query
	$args = array(
		'post_type' => 'mixitup',
		'paged' => $paged,
		'posts_per_page' => $data['portfolio_items'],
	);

	$portfolio = new WP_Query($args);
	if(is_array($portfolio->posts) && !empty($portfolio->posts)) {
		foreach($portfolio->posts as $gallery_post) {
			$post_taxs = wp_get_post_terms($gallery_post->ID, 'mixitup_category', array("fields" => "all"));
			if(is_array($post_taxs) && !empty($post_taxs)) {
				foreach($post_taxs as $post_tax) {
					$portfolio_taxs[$post_tax->slug] = $post_tax->name;
				}
			}
		}
	} //Here must be used category name (mixitup_category).
	if(is_array($portfolio_taxs) && !empty($portfolio_taxs) && get_post_meta($post->ID, 'pyre_portfolio_filters', true) != 'no'):
?>
		//Here is HTML nav menu and Query
		<nav class="project-filter nav horizontal">
			<ul>
				<li class="active"><a href="#" data-filter="*">All</a></li>
				<?php foreach($portfolio_taxs as $portfolio_tax_slug => $portfolio_tax_name): ?>
				<li><a href="#" data-filter=".<?php echo $portfolio_tax_slug; ?>"><?php echo $portfolio_tax_name; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>

		<?php endif; ?>

<?php

	$list = '<div class="projects row">';
	while($q->have_posts()) : $q->the_post();
		$idd = get_the_ID();
		$portfolio_subtitle = get_post_meta($idd, 'portfolio_subtitle', true);
		$filterr = get_post_meta($idd, 'filterr', true);
		$small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'mxt_small_image' );
		$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'mxt_large_image' );
		
		//Get Texanmy class
		
		$item_classes = '';
		$item_cats = get_the_terms($post->ID, 'mixitup_category');
		if($item_cats):
		foreach($item_cats as $item_cat) {
			$item_classes .= $item_cat->slug . ' ';
		}
		endif;
			
	
		$list .= '
			//Here is HTML portfolio start and dynamic query 	
			<!-- project 1 -->
			<div class="col-27 '.$item_classes.'">
				<article class="project">
					<figure class="project-thumb">
						<img src="'.$small_image_url[0].'" alt="" />
						<figcaption class="middle">
							<div>
								<a href="'.$full_image_url[0].'" class="icon circle medium lightbox"  title="'.get_the_title().'"><i class="fa fa-search"></i></a>
								<a href="'.get_permalink().'" class="icon circle medium"><i class="fa fa-link"></i></a>
							</div>
						</figcaption>
					</figure>

					<header class="project-header">
						<h4 class="project-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h4>
						<div class="project-meta">'.$portfolio_subtitle.'</div>
					</header>
				</article>
			</div>
			//Here is HTML portfolio query end
		';        
	endwhile;
	$list.= '</div>';
	wp_reset_query();
	return $list;
}
add_shortcode('mixituptab', 'p_shortcode');

//Used [mixituptab] shortcode in page or <?php echo do_shortcode('[mixiuptab]');?> it in your fix position.












