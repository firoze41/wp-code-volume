// use your menu area where  there is menu like <ul>use here</ul>
<?php
				if (function_exists('wp_nav_menu')) {
					wp_nav_menu(array('theme_location' => 'wpj-main-menu', 'menu_id' => 'dropmenu', 'fallback_cb' => 'wpj_default_menu'));
				}
				else {
					wpj_default_menu();
				}
				?>