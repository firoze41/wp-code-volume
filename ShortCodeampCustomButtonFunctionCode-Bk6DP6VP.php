function box($atts, $content = null) {
	return('<div class="boxed_style">'.$content.'</div>');
}
add_shortcode("box", "box");

function youtube($atts, $content = null) {
	return ('<iframe width="560" height="315" src="http://www.youtube.com/embed/'.$content.'" frameborder="0" allowfullscreen></iframe>');
}
add_shortcode("youtube", "youtube"); 

function vimeo($atts, $content = null) {
	return ('<iframe src="http://player.vimeo.com/video/'.$content.'" width="400" height="300" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>'); 
}
add_shortcode("vimeo", "vimeo");


function rrf_buttons() {
	add_filter ("mce_external_plugins", "my_external_js");
	add_filter ("mce_buttons", "our_awesome_buttons");
}

function my_external_js($plugin_array) {
	$plugin_array['wptuts'] = get_template_directory_uri() . '/js/custom-button.js';
	return $plugin_array;
}

function our_awesome_buttons($buttons) {
	array_push ($buttons, 'boxed', 'youtube', 'vimeo');
	return $buttons;
}
add_action ('init', 'rrf_buttons');