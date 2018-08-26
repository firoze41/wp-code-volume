

<!-- menu usages in html template -->

<div class="menu-area">
	<div id="cssmenu" class="">
		<ul class="active_menu">
			<li><a href=""></a></li>
			<li><a href=""></a></li>
			<li><a href=""></a></li>
		</ul>
	</div><!-- /.navbar-collapse -->
</div>




<!-- menu usages in wordpress template -->

<div class="menu-area">
	<div id="cssmenu" class="">
	<?php
	if (function_exists('wp_nav_menu')) {
		wp_nav_menu(array('theme_location' => 'main-menu','menu_class' => 'active_menu', 'fallback_cb' => 'default_menu'));
	}
	else {
		default_menu();
	}
	?>
	</div><!-- /.navbar-collapse -->
</div>


<!-- call in functions.php -->
	// add menu support and fallback menu if menu doesn't exist
	
	function wpj_register_menu() {
		if (function_exists('register_nav_menu')) {
			register_nav_menu( 'main-menu', __( 'Main Menu', 'brightpage' ) ); // main-menu is menu active id for theme location
		}
	}
	function default_menu() {
		echo '<ul class="nav">';
		if ('page' != get_option('show_on_front')) {
			echo '<li class="fa fa-home"><a href="'. home_url() . '/">Home</a></li>';
		}
		wp_list_pages('title_li=');
		echo '</ul>';
	}
add_action('init', 'wpj_register_menu');



<!-- dropdown menu css -->
http://pastebin.com/MSjdDdvn

<!-- slick nav css -->
http://pastebin.com/wijMscB3

<!-- call slick-nav.js -->

http://pastebin.com/wHgSubP8


<!-- media query for responsive css -->
http://pastebin.com/P7VAZbGM



<!-- activation js -->
 jQuery(document).ready(function($) {
      $('.active_menu').slicknav();
});

