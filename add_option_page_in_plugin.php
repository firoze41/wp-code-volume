function add_ppmscrollbar_options_framwrork()  
{  
	add_options_page('Sticky aleart settings', 'Sticky aleart settings', 'manage_options', 'stickyaleart-settings','ppmscrollbar_options_framwrork');  
}  
add_action('admin_menu', 'add_ppmscrollbar_options_framwrork');


add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );
function wptuts_add_color_picker( $hook ) {
 
    if( is_admin() ) {
     
        // Add the color picker css file      
        wp_enqueue_style( 'wp-color-picker' );
         
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle', plugins_url( '/inc/color-pickr.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    }
}


if ( is_admin() ) : // Load only if we are viewing an admin page






function ppmscrollbar_register_settings() {
	// Register settings and call sanitation functions
	register_setting( 'ppmscrollbar_p_options', 'ppmscrollbar_options', 'ppmscrollbar_validate_options' );
}

add_action( 'admin_init', 'ppmscrollbar_register_settings' );

// Default options values
$ppmscrollbar_options = array(
	'sticky_bar_bg' => '#cc0000',
	'sticky_bar_text_color' => '#fff'
);

// Function to generate options page
function ppmscrollbar_options_framwrork() {
	global $ppmscrollbar_options, $auto_hide_mode, $where_visible_scrollbar;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. ?>

	<div class="wrap">

	
	<h2>Custom Scrollbar Options</h2>

	<?php if ( false !== $_REQUEST['updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>

	<form method="post" action="options.php">

	<?php $settings = get_option( 'ppmscrollbar_options', $ppmscrollbar_options ); ?>
	
	<?php settings_fields( 'ppmscrollbar_p_options' );
	/* This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page
	and not somewhere else, very important for security */ ?>

	
	<table class="form-table"><!-- Grab a hot cup of coffee, yes we're using tables! -->
	
	


		<tr valign="top">
			<th scope="row"><label for="sticky_bar_bg">Sticky Bar Background</label></th>
			<td>
				<input id="sticky_bar_bg" type="text" name="ppmscrollbar_options[sticky_bar_bg]" value="<?php echo stripslashes($settings['sticky_bar_bg']); ?>" class="color-field" /><p class="description">Select scrollbar color here. You can also add html HEX color code.</p>
			</td>
		</tr>	

		<tr valign="top">
			<th scope="row"><label for="sticky_bar_text_color">Sticky Bar text color</label></th>
			<td>
				<input id="sticky_bar_text_color" type="text" name="ppmscrollbar_options[sticky_bar_text_color]" value="<?php echo stripslashes($settings['sticky_bar_text_color']); ?>" class="color-field" /><p class="description">Select scrollbar color here. You can also add html HEX color code.</p>
			</td>
		</tr>	

			
	</table>

	<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

	</form>

	</div>

	<?php
}


function ppmscrollbar_validate_options( $input ) {
	global $ppmscrollbar_options, $auto_hide_mode;

	$settings = get_option( 'ppmscrollbar_options', $ppmscrollbar_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS

	$input['sticky_bar_bg'] = wp_filter_post_kses( $input['sticky_bar_bg'] );
	$input['sticky_bar_text_color'] = wp_filter_post_kses( $input['sticky_bar_text_color'] );

		
		
	
	return $input;
}


endif;  // EndIf is_admin()



function get_data_form_plugin() {

?>

<?php global $ppmscrollbar_options; $ppmscrollbar_settings = get_option( 'ppmscrollbar_options', $ppmscrollbar_options ); ?>

<style type="text/css">
	div.alert-box {background-color:<?php echo $ppmscrollbar_settings['sticky_bar_bg']; ?> !important}
	div.alert-box a {color: <?php echo $ppmscrollbar_settings['sticky_bar_text_color']; ?> !important}
</style>

<?php

}

add_action('wp_head', 'get_data_form_plugin');

//Color picker js file code

(function( $ ) {
 
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.color-field').wpColorPicker();
    });
     
})( jQuery );