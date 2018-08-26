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