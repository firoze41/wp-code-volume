//Plugin information
/*
Plugin Name: Your plugin Name
Plugin URI: http://example.com/pluginsurl
Description: Given your plugin description here. 
Author: Author Name
Version: 1.0
Author URI: http://example.com/
*/
// Call any external file js or css
function plugin_function_name() {
    wp_enqueue_script( 'anyname-js', plugins_url( '/js/needed_jquery.js', __FILE__ ), array('jquery'), 1.0, false);
    wp_enqueue_style( 'anyname-css', plugins_url( '/css/needed_style.css', __FILE__ ));
}

add_action('init','plugin_function_name');
//Internal css or js given here
function another_plugin_function_name () {?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('').ticker();
		}); 	
	</script>
	<style type="text/css">
	//Style here
	</style>
<?php
}
add_action('wp_head','another_plugin_function_name');

//Custom menu customization 
function plugin_menu_function_name() {
	add_menu_page('Plugin option panel', 'Plugin Options', 'manage_options', 'plugin-tickr-option', 'extra_option_function', plugins_url( '/images/your.png', __FILE__  ), 6 );
	add_options_page('Plugin option panel', 'Plugin Options', 'manage_options', 'plugin-tickr-option', 'extra_option_function');
}
add_action('admin_menu', 'plugin_menu_function_name');

function extra_option_function() {?>
	<div class="wrap">
		<h2>Plugin Option</h2>
			
	</div>
	
<?php
}