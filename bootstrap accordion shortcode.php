<?php

function florida_collapse_list_func($atts){
extract( shortcode_atts( array(
'category' => '',
), $atts, 'collapse' ) );
$q = new WP_Query(
array('posts_per_page' => 3, 'post_type' => 'collapse-items', 'collapse_cat' => $category)
);
$list = '<div class="panel panel-default">';
while($q->have_posts()) : $q->the_post();
$idd = get_the_ID();
$list .= '

<div class="panel-heading" role="tab" id="heading'.$idd.'">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#'.$idd.'" aria-expanded="true" aria-controls="'.$idd.'">
'.get_the_title().'
</a>
</h4>
</div>
<div id="'.$idd.'" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading'.$idd.'">
<div class="panel-body">
'.get_the_content().'
</div>
</div>

';
endwhile;
$list.= '</div>';
wp_reset_query();
return $list;
}
add_shortcode('collapse', 'florida_collapse_list_func');



/// shortcode will be  [collapse category=""]
?>