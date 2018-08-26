<?php
function various_my_various_styles(){
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		
	/*Register styles*/	

	// bootstrap min css
	wp_register_style( 'bootstrap-min-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1','all' );
	
	// bootstrap theme min  css
	wp_register_style( 'bootstrap-theme-min-css', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array(), '1','all' );
	
    // 	prettyPhoto min css
	wp_register_style( 'prettyPhoto-min-css', get_template_directory_uri() . '/css/prettyPhoto.min.css', array(), '1','all' );
	
    // meanmenu min css
	wp_register_style( 'meanmenu-min-css', get_template_directory_uri() . '/css/meanmenu.min.css', array(), '1','all' );
	
	// responsive css
	wp_register_style( 'responsive-css', get_template_directory_uri() . '/responsive.css', array(), '1','all' );
	
	wp_register_style( 'my-responsive-css', get_template_directory_uri() . '/css/my-responsive.css', array(), '1','all' );
	
	wp_register_style( 'slicknav.css', get_template_directory_uri() . '/css/slicknav.css', array(), '1','all' );
	
	wp_register_style( 'default.css', get_template_directory_uri() . '/css/default.css', array(), '1','all' );
	
	
	
	
	/*Enqueue  styles*/	
	
	// bootstrap min css
	wp_enqueue_style( 'bootstrap-min-css', get_stylesheet_uri(), array( ),'1','all' );	
	
	// bootstrap theme min  css
	wp_enqueue_style( 'bootstrap-theme-min-css', get_stylesheet_uri(), array( ),'1','all' );

    // 	prettyPhoto min css
	wp_enqueue_style( 'prettyPhoto-min-css', get_stylesheet_uri(), array( ),'1','all' );

    // meanmenu min css	
	wp_enqueue_style( 'meanmenu-min-css', get_stylesheet_uri(), array( ),'1','all' );

	// responsive css
	wp_enqueue_style( 'responsive-css', get_stylesheet_uri(), array( ),'1','all' );	
	
	// my-responsive-css
	wp_enqueue_style( 'my-responsive-css', get_stylesheet_uri(), array( ),'1','all' );
	
	wp_enqueue_style( 'slicknav.css', get_stylesheet_uri(), array( ),'1','all' );	
	
	wp_enqueue_style( 'default.css', get_stylesheet_uri(), array( ),'1','all' );	
	
	// add more

	
  /* this is the main style css*/
  wp_enqueue_style( 'verious-codes-style', get_stylesheet_uri() );


  
  
  // Loading all javascript file here
  

    // mixitup
  	wp_enqueue_script( 'jquery-mixitup-min-js', get_template_directory_uri('jquery') . '/js/jquery.mixitup.min.js', array(), '1','0', true );
	
	// prettyPhoto
  	wp_enqueue_script( 'jquery-prettyPhoto-min-js', get_template_directory_uri('jquery') . '/js/jquery.prettyPhoto.min.js', array(), '1','0', true );
	
	// jflickrfeed
  	wp_enqueue_script( 'jquery-jflickrfeed-min-js', get_template_directory_uri('jquery') . '/js/jflickrfeed.min.js', array(), '1','0', true );
	
	// jribbble
  	wp_enqueue_script( 'jquery-jribbble-min-js', get_template_directory_uri('jquery') . '/js/jquery.jribbble-1.0.1.min.js', array(), '1','0', true );
	
	// bootstrap-min
  	wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri('jquery') . '/js/bootstrap.min.js', array(), '1','0', true );
	
  	wp_enqueue_script( 'slick-nav.js', get_template_directory_uri('jquery') . '/js/slick-nav.js', array(), '1','0', true );
	
	// main js
  	wp_enqueue_script( 'main-js', get_template_directory_uri('jquery') . '/js/main.js', array(), '1','0', true );
}
add_action('wp_enqueue_scripts','various_my_various_styles');


// google fonts & url usages

/* 
if you call from any cdn then don't call http: OR https:
 */ 
  function load_fonts() {
		wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Montserrat:400,700');
		wp_enqueue_style( 'googleFonts');
	}

add_action('wp_print_styles', 'load_fonts');





// for javascript enable into the site wordpress from CDN
/* 
if you call from any cdn then don't call http: OR https:
 */ 
function plutin_script_server() {
	
wp_enqueue_script('myscript', '//maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap');
wp_enqueue_script( 'myscript');
}

add_action('init', 'plutin_script_server');




// Custom Favicons
function my_theme_add_favicon(){ ?>
    <!-- Custom Favicons -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/images/ico/favicon.ico"/>
    <?php }
add_action('wp_head','my_theme_add_favicon');




// IE Supported CSS Calling
function my_ie_support_css() {
		
echo '<!--[if lt IE 7]>'. "\n";
echo '<link rel="stylesheet" type="text/css" href="' . esc_url( get_template_directory_uri() . '/css/pluton-ie7.css' ) . '" />'. "\n";
echo '<![endif]-->'. "\n";
	  
}
add_action( 'wp_head', 'my_ie_support_css' );


// html5shiv & respond js IE
function my_ie_support_header() {
    echo '<!--[if lt IE 9]>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>'. "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/respond.min.js' ) . '"></script>'. "\n";
    echo '<![endif]-->'. "\n";
}
add_action( 'wp_head', 'my_ie_support_header' );



/*-------------------------------------------------------------------------
# if custom post type publish post 0 then scripe will not load
# when will get at least 1 post publish then script will load 
---------------------------------------------------------------------------*/

$count_posts = wp_count_posts('slide'); // here "slide" is the name of post_type
$count = $count_posts->publish;

if($count > 0){
    wp_enqueue_style('owl-carousel',plugin_dir_url(__FILE__).'assets/css/owl.carousel.css',array(),PLUGIN_VERSION);
    wp_enqueue_script('owl-carousel',plugin_dir_url(__FILE__).'assets/js/owl.carousel.min.js',array('jquery'),PLUGIN_VERSION,true);
}



?>