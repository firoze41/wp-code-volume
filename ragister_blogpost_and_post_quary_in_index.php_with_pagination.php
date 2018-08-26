<?php

/*Wordpress post qury*/

	<?php if(have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<!-- Your Post Query here -->

	<?php endwhile; ?>
	<?php endif; ?>

/* Your Post Query code. You can take any div for customization   */

<?php the_title(); ?> = This code for post title
<?php the_permalink(); ?> = This code for post permalink
<?php the_time('M d, Y') ?> = This code for post time
<?php the_excerpt(); ?> = This code for post summary or some content
<?php the_content(); ?> = This code for post whole content
<?php the_category(', '); ?> = This code for post category
<?php comments_popup_link('No Comment', '1 Comment', '% Comments'); ?> = This code for post comment.






/*This code for pagination. You can taking this code below post query and also here some class for style*/

<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older
posts') ); ?></div><div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span
class="meta-nav">&rarr;</span>') ); ?></div>








;?>