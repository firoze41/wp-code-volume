Register Shortcode in function.php

function basic_rrf_shortcode ($atts, $content = null){
	return '<div style="background:red;color:#fff;padding:15px">'.$content.'</div>';
}
add_shortcode ('rrf_shortcode', 'basic_rrf_shortcode');


function basic_rrf_shortcode_extend ($atts){

	extract ( shortcode_atts ( array (
		'content' => 'null',
		'color' => 'red',
		'background' => 'yellow',
	), $atts, 'rrf_shortcode_extend') );

	return '<div style="background:'.$background.';color:'.$color.';padding:15px">'.$content.'</div>';
}
add_shortcode ('rrf_shortcode_extend', 'basic_rrf_shortcode_extend');

Usages

1. [rrf_shortcode]This is shortcode content[/rrf_shortcode]
2. [rrf_shortcode_extend content="This is shortcode content" color="#000" background="yellow"]