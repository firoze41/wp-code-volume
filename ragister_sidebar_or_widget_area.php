/*==================function for register widgets=================*/


function brightpage_widget_areas() {

	register_sidebar( array(
		'name' => __( 'Sidebar name', 'brightpage' ),
		'id' => 'sidebar_id',
		'description' => __( 'An optional widget area for your welcome message area.', 'brightpage' ),
		'before_widget' => '<div class="big">', 
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );


        register_sidebar( array(
		'name' => __( 'Sidebar name', 'brightpage' ),
		'id' => 'sidebar_id',
		'description' => __( 'An optional widget area for your welcome message area.', 'brightpage' ),
		'before_widget' => '<div class="big">', 
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );

}
add_action('widgets_init', 'brightpage_widget_areas');



/*Paste this code in your widget position*/
<?php dynamic_sidebar('sidebar_id'); ?>