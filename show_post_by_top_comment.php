<div class="popular-posts">
<?php global $post; $postslist=get_posts('numberposts=5&orderby=comment_count'); foreach($postslist as $post) : setup_postdata($post); ?>
 
<li><a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail(array(60,60), array("class" => "alignleft popular-sidebar")); ?>
</a>
<a title="Post: <?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/>
<?php $excerpt = get_the_excerpt();//comments_number('0 comments', 'One Comments', '% Comments' );?>
<div></div>
</li>
<?php endforeach; ?>
 
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