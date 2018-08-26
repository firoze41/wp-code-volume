//add this line in you theme .htaccess 
RewriteRule ^login$ http://YOUR_SITE.com/wp-login.php [NC,L]

// add this line and edit in you theme function.php 
function wpc_url_login(){
	return "http://wpchannel.com/"; // your URL here
}
add_filter('login_headerurl', 'wpc_url_login');

// Add a widget in WordPress Dashboard
function wpc_dashboard_widget_function() {
	// Entering the text between the quotes
	echo "<ul>
	<li>Release Date: March 2012</li>
	<li>Author: Aurelien Denis.</li>
	<li>Hosting provider: my own server</li>
	</ul>";
}
function wpc_add_dashboard_widgets() {
	wp_add_dashboard_widget('wp_dashboard_widget', 'Technical information', 'wpc_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'wpc_add_dashboard_widgets' );