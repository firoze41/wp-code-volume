<div class="popular-posts">
 
        <?php
$popularpost = new WP_Query( array( 'posts_per_page' => 5,
                                    'meta_key' => 'post_views_count',
                                    'orderby' => 'meta_value_num',
                                    'post__not_in' => get_option('sticky_posts'),
                                    'order' => 'DESC'  ) );
?>
<ul>
<?php  while ($popularpost->have_posts()) : $popularpost->the_post(); ?>
<?php
            $count = '';
 
        ?>
        <div class='popular-post-feature-image'>
<?php if ( has_post_thumbnail() ) {
the_post_thumbnail('popular-post-image');
} else { ?>
<img src="<?php bloginfo('template_directory'); ?>/images/popular-default-image.jpg" />
<?php } ?></div>
<li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); echo $count; ?></a></li>
        <?php endwhile; ?>
        </ul>
</div>

//in style.css
/*Popular Post by post view*/
 
.popular-post-feature-image {
 display: block;
 float: left;
 margin: 0 10px;
}
.popular-posts ul {
 margin: 0;
}
.popular-posts li {
 border-bottom: 1px dotted #DDDDDD;
 margin-bottom: 27px;
 min-height: 67px;
 overflow: hidden;
}
.popular-post-feature-image img {
 border: 1px solid #B2B2B2;
 padding: 2px;
}