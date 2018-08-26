<?php
/* =============== Step 1) Include required timeline css/jss into header.php ============== */
// Not test yet this
if ( is_page_template('timeline-template.php') ) { ?>
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/timeline/css/timeline.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/timeline/css/styles.css" />
		<script src="<?php bloginfo('template_directory'); ?>/timeline/js/timeline-min.js"></script>
		<script type="text/javascript">
		jQuery(document).ready(function(){
			var timeline = new VMM.Timeline();
			<?php 
				global $post;
				$timeline_cat = get_post_meta( $post->ID, 'timeline_category', true ); 
				$_SESSION['t_cat'] = $timeline_cat; 
			?>
			timeline.init("<?php bloginfo('template_directory'); ?>/data.json.php");
		});
		</script>
	<?php } ?>
	




<?php
/* ======= Step 2) Create data.json.php and Write xml data dynamic with wordpress wp_query ======== */

session_start();
// load WordPress environment
include_once('../../../wp-blog-header.php');
header("Pragma: no-cache");
header('Content-type: application/json');
?>
{
    "timeline":
<?php
	$cat = $_SESSION['t_cat'];  // Category name from session variable
	if(isset($_SESSION['t_cat']))  unset($_SESSION['t_cat']);
?>
<?php
	$timeline_query = new WP_Query( array ( 'category_name' => "$cat", 'orderby' => 'date', 'order' => 'ASC' , 'posts_per_page' => -1 ));
	while ( $timeline_query->have_posts() ) : $timeline_query->the_post();
		$timeline_text = get_the_content();
		$timeline_text = str_replace(array("\r\n", "\r"), " ", $timeline_text);
		$timeline_text = str_replace('"', "'", $timeline_text);
		$timeline_text = trim($timeline_text);
		if(strlen($timeline_text) == 0) $timeline_text = "&nbsp;";
		$timeline_start_date = get_post_meta($post->ID, 'it_start_date', true);
		$timeline_start_date = str_replace('"', "'", $timeline_start_date);
		$timeline_media = get_post_meta($post->ID, 'it_media', true);
		$timeline_media = str_replace('"', "'", $timeline_media);
		$timeline_credit = get_post_meta($post->ID, 'it_credit', true);
		$timeline_credit = str_replace('"', "'", $timeline_credit);
		$timeline_caption = get_post_meta($post->ID, 'it_caption', true);
		$timeline_caption = str_replace('"', "'", $timeline_caption);

if(($timeline_query->current_post) == 0):
?>
 {
        "headline":"<?php the_title(); ?>",
        "type":"default",
		"startDate":"<?php echo $timeline_start_date; ?>",
		"text":"<?php echo $timeline_text; ?>",
		"asset":
        {
            "media":"<?php echo $timeline_media; ?>",
            "credit":"<?php echo $timeline_credit; ?>",
            "caption":"<?php echo $timeline_caption; ?>"
        },
        "date": [
<?php else: ?>
            {
                "startDate":"<?php echo $timeline_start_date; ?>",
                "headline":"<?php the_title(); ?>",
                "text":"<?php echo $timeline_text; ?>",
                "asset":
                {
                    "media":"<?php echo $timeline_media; ?>",
                    "credit":"<?php echo $timeline_credit; ?>",
                    "caption":"<?php echo $timeline_caption; ?>"
                }
			<?php
			if(($timeline_query->current_post + 1) == $timeline_query->post_count) {
				echo "}";
			}else{
				echo "},";
			}
	 endif;
				endwhile;
				// Restore original Post Data
				wp_reset_postdata();
			?>
		]
    }
}






<?php
/* ========= Step 3) Create shortcode to call timeline or simply place timeline comment code ======= */
function timeline_generator ($atts, $content=null){
	extract(shortcode_atts( array('cat' => ''), $atts));
	$timeline_content = "<div id='timeline'>
							<!-- Timeline.js will genereate the markup here -->
						</div>";
    return $timeline_content;
}
add_shortcode('wp-timeline', 'timeline_generator');

/* or simply paste following into wordpress post/page */
?>
<div id='timeline'>
	<!-- Timeline.js will genereate the markup here -->
</div>







<?php
/* ====== Additional Steps: Include required jquery if not include in WordPress by default ========== */

// Drop this in functions.php or your theme
if( !is_admin()){
	// wp_deregister_script('jquery');
	wp_register_script('jquery_timeline', ('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'), array('jquery'), false, TRUE );
	wp_enqueue_script('jquery_timeline');
}
?>