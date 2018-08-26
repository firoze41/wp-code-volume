function newPostNotify($post_ID) {
if( wp_is_post_revision($post_ID) ) return;
global $wpdb;
$get_post_info = get_post($post_ID);
if ( $get_post_info->post_status == 'publish' && $_POST['original_post_status'] != 'publish' ) {
// Get all of the emails from the database
$wp_user_email = $wpdb->get_results("SELECT DISTINCT user_email FROM $wpdb->users");
// Send emails to each of registered users
foreach ( $wp_user_email as $email ) {
// Email subject
$subject = '<span style="color: #ff0000;"><strong>Website থেকে নতুন পোস্ট এসেছে</strong></span> ';
// Messages：new post url：+ URL
$message = 'View this new post now：' . get_permalink($post_ID);
// Send email
wp_mail($email->user_email, $subject, $message);
}
}
}
 
add_action('publish_post', 'newPostNotify');