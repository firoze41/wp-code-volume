			<?php if(have_posts()) : $i = 0;?>			<?php while(have_posts()) : the_post(); $i++;?>			<div><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><div><?php the_content(); ?></div></div>			<?php if($i%3==0): ?><img src="http://placehold.it/800x250/1D67AE/text" alt="<?php the_title(); ?>" />			<?php endif; ?>			<?php endwhile; ?>			<?php endif; ?>