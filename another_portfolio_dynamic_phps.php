<?php
$terms = get_terms('project_categories');
$count = count($terms);
if ( $count > 0 ){
echo '<ul id="projects-filter">';
echo '<li><a href="#" data-filter="*">All</a></li>';
foreach ( $terms as $term ) {
    $termname = strtolower($term->name);  
    $termname = str_replace(' ', '-', $termname);  
    echo '<li><a href="#" data-filter="' . '.' . $termname . '">' . $term->name . '</a></li>';
}
echo '</ul>';
}
?>

<?php 
    $loop = new WP_Query(array('post_type' => 'projects', 'posts_per_page' => -1));
    $count =0;
?>

<div id="project-wrapper">
    <div id="projects">

    <?php if ( $loop ) : 

        while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <?php
            $terms = get_the_terms( $post->ID, 'project_categories' );

            if ( $terms && ! is_wp_error( $terms ) ) : 
                $links = array();

                foreach ( $terms as $term ) 
                {
                    $links[] = $term->name;
                }
                $links = str_replace(' ', '-', $links); 
                $tax = join( " ", $links );     
            else :  
                $tax = '';  
            endif;
            ?>

            <?php $infos = get_post_custom_values('wpcf-proj_url'); ?>

            <div class="project-item <?php echo strtolower($tax); ?>">
                <div class="thumb"><a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'projects-thumb' ); ?></a></div>
                <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                <p class="excerpt"><a href="<?php the_permalink() ?>"><?php echo get_the_excerpt(); ?></a></p>
                <p class="links"><a href="<?php echo $infos[0]; ?>" target="_blank">Live Preview →</a> <a href="<?php the_permalink() ?>">More Details →</a></p>
            </div>

        <?php endwhile; else: ?>

        <div class="error-not-found">Sorry, no portfolio entries for while.</div>

    <?php endif; ?>


    </div>

    <div class="clearboth"></div>

</div> <!-- end #project-wrapper-->
//more link: wordpress.stackexchange.com/questions/109281/how-to-filter-posts-by-categories