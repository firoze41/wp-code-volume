Step by step configuration Option tree:::
Step-1: Download Option tree and taking it in your theme folder. 
Step-2: Now need to call ot-loader.php ,  theme-options.php (get it as demo-theme-option.php) , meta-boxes.php (get it as demo-meta-boxes.php) and 
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );

include_once( 'option-tree/ot-loader.php' );

include_once( 'inc/theme-options.php' );
include_once( 'inc/meta-boxes.php' );

in your functions.php .
Step-3: Now can using meta boxes and theme option by changing meta boxes and theme option id.

E.g.

function custom_meta_boxes() {

 $unique_meta_box_name = array(
    'id'          => 'unique_meta_box_name',
    'title'       => __( 'Title Meta Box', 'theme-text-domain' ),
    'desc'        => '',
    'pages'       => array( 'pricing' ), //Here given post type where want to support
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'pricing_dollar', 'theme-text-domain' ),
        'id'          => 'meta_box_id', //This id for input date where want show
        'desc'          => 'Please input the Category name',
        'type'        => 'text'
      ),
    )
  );
  

  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $unique_meta_box_name );

add_action( 'admin_init', 'custom_meta_boxes' );

/*Note: <?php 
	$meta_box_id = get_post_meta($post->ID, 'meta_box_id', true);
	?>
*/