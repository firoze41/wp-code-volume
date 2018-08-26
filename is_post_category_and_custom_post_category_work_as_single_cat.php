add_action( 'init', 'portfolio_custom_post' );
function portfolio_custom_post() {
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => __( 'Portfolios' ),
				'singular_name' => __( 'Portfolio' )
			),
			'public' => true,
			'supports' => array( 'title', 'custom-fields','thumbnail','editor' ),
			'taxonomies' => array('category', 'post_tag'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'portfolio'),
		)
	);	
}
add_action('init', 'demo_add_default_boxes');
     
function demo_add_default_boxes() {
   	 register_taxonomy_for_object_type('category', 'portfolio');
   	 register_taxonomy_for_object_type('post_tag', 'portfolio');
    }
function wpse_category_set_post_types( $query ){
    if( $query->is_category() && $query->is_main_query() ){
        $query->set( 'portfolio', array( 'post', 'portfolio', 'page') );
    }
}
add_action( 'pre_get_posts', 'wpse_category_set_post_types' );
//query post
<?php get_header(); ?>

    <section class="content">
       
	
			<?php if(have_posts()) : ?><?php while(have_posts())  : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="topcontent">
		<?php the_content();?>
</div>


				
        <div class="clear"></div><!-- clear float -->
		
			
			<?php endwhile; ?>

			<?php else : ?>
				<div class="post">
					<h3><?php _e('404 Error&#58; Not Found', 'brightpage'); ?></h3>
				</div>
			<?php endif; ?>	
    </section><!-- content -->

<?php get_footer(); ?>