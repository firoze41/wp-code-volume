


// Header images dynamic & changing

<!------------------------------------------------------------------->
// functions.php

$args = array(
	'default-color' 		=> 'fff',
	'default-image' => get_template_directory_uri() . '/images/custom-header.jpg',
	'wp-head-callback'  		=> '',
	'admin-head-callback'    	=> '',
	'admin-preview-callback'	=> '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
);
add_theme_support( 'custom-header', $args );

<!------------------------------------------------------------------->


<!------------------------------------------------------------------------>
// header.php

<?php 
        $header_image = get_header_image();
        if ( ! empty( $header_image ) ) { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
                <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" />
            </a>
		<?php } // if ( ! empty( $header_image ) ) 
?>
<!------------------------------------------------------------------------>



// Background change
// make sure that body{background:url(../images/bg.png) repeat fixed 0 0;}  you did not use background in body in css

show your body like this   <body  <?php body_class(); ?>>


// functions.php

$defaults = array(
	'default-color' 		=> 'fff',
	'default-image' 		=> get_template_directory_uri() . '/images/bg.png) repeat fixed 0 0;',
	'wp-head-callback'  		=> '_custom_background_cb',
	'admin-head-callback'    	=> '',
	'admin-preview-callback'	=> '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => true,
	'uploads'                => true,
);

add_theme_support( 'custom-background', $defaults);

















