/*Paste this code in your functions.php for custom post*/
function rrf_register_cpt_testimonial() {

    $labels = array( 
        'name' => _x( 'Testimonials', 'testimonial' ),
        'singular_name' => _x( 'testimonial', 'testimonial' ),
        'add_new' => _x( 'Add New', 'testimonial' ),
        'add_new_item' => _x( 'Add New testimonial', 'testimonial' ),
        'edit_item' => _x( 'Edit testimonial', 'testimonial' ),
        'new_item' => _x( 'New testimonial', 'testimonial' ),
        'view_item' => _x( 'View testimonial', 'testimonial' ),
        'search_items' => _x( 'Search Testimonials', 'testimonial' ),
        'not_found' => _x( 'No testimonials found', 'testimonial' ),
        'not_found_in_trash' => _x( 'No testimonials found in Trash', 'testimonial' ),
        'parent_item_colon' => _x( 'Parent testimonial:', 'testimonial' ),
        'menu_name' => _x( 'Testimonials', 'testimonial' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'testimonial', $args );
}
add_action( 'init', 'rrf_register_cpt_testimonial' );

/*Paste this code in your functions.php for adding custom meta box */
$key = "testimonial";
$meta_boxes = array(
"person-name" => array(
"name" => "person-name",
"title" => "Person's Name",
"description" => "Enter the name of the person who gave you the testimonial."),
"position" => array(
"name" => "position",
"title" => "Position in Company",
"description" => "Enter their position in their specific company."),
"company" => array(
"name" => "company",
"title" => "Company Name",
"description" => "Enter the client Company Name"),
"link" => array(
"name" => "link",
"title" => "Client Link",
"description" => "Enter the link to client's site, or you can enter the link to your portfolio page where you have the client displayed.")
);
 
function rrf_create_meta_box() {
global $key;
 
if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-boxes', ucfirst( $key ) . ' Information', 'display_meta_box', 'testimonial', 'normal', 'high' );
}
}
 
function display_meta_box() {
global $post, $meta_boxes, $key;
?>
 
<div class="form-wrap">
 
<?php
wp_nonce_field( plugin_basename( __FILE__ ), $key . '_wpnonce', false, true );
 
foreach($meta_boxes as $meta_box) {
$data = get_post_meta($post->ID, $key, true);
?>
 
<div class="form-field form-required">
<label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
<input type="text" name="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo (isset($data[ $meta_box[ 'name' ] ]) ? htmlspecialchars( $data[ $meta_box[ 'name' ] ] ) : ''); ?>" />
<p><?php echo $meta_box[ 'description' ]; ?></p>
</div>
 
<?php } ?>
 
</div>
<?php
}
 
function rrf_save_meta_box( $post_id ) {
global $post, $meta_boxes, $key;
 
foreach( $meta_boxes as $meta_box ) {
if (isset($_POST[ $meta_box[ 'name' ] ])) {
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
}
}
 
if (!isset($_POST[ $key . '_wpnonce' ])) 
return $post_id;

if ( !wp_verify_nonce( $_POST[ $key . '_wpnonce' ], plugin_basename(__FILE__) ) )
return $post_id;
 
if ( !current_user_can( 'edit_post', $post_id ))
return $post_id;
 
update_post_meta( $post_id, $key, $data );
}
 
add_action( 'admin_menu', 'rrf_create_meta_box' );
add_action( 'save_post', 'rrf_save_meta_box' );