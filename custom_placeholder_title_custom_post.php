function change_default_title( $title ){
     $screen = get_current_screen();
 
     if  ( 'your_custom_post_name' == $screen->post_type ) {
          $title = 'Enter client name here';
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'change_default_title' );