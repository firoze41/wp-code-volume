<div class="portfolio">

	<?php
		 $terms = get_terms("portfolio_cat");
		 $count = count($terms);
		 echo '<div class="portfolio_filter">
		<ul>';
		 echo '<li class="filter" data-filter="all">All</li>';
		 if ( $count > 0 ){
			 
				foreach ( $terms as $term ) {
					 
					$termname = strtolower($term->name);
					$termname = str_replace(' ', '-', $termname);
					echo '<li class="filter" data-filter="'.$termname.'">'.$term->name.'</li>';
					
				}
		 }
		 echo "</ul></div>";
	?>
				 
	<?php 
		$loop = new WP_Query(array('post_type' => 'portfolio-items', 'posts_per_page' => -1));
		$count =0;
	?>
	
	
	<div class="portfolio_contents">
		<ul id="portfolio_filter_action">
		
		<?php if ( $loop ) : 

			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			 
				<?php
				$terms = get_the_terms( $post->ID, 'portfolio_cat' );
						 
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
				 
				<?php $infos = get_post_custom_values('_url'); ?>
				
				
				<li class="mix  <?php echo strtolower($tax); ?>">
					<div class="single_portfolio">
						<?php the_post_thumbnail( array(400, 160) ); ?>
						<div class="color_overlay"></div>
						<div class="portfolio_hover">
							<h2><?php the_title();?></h2>
							<a href=""><i class="fa fa-search"></i></a>
							<a href=""><i class="fa fa-link"></i></a>
						</div>											
					</div>
				</li>
				 
			<?php endwhile; // posibilt to add else statement
			
			else: ?>
			  
			<li class="error-not-found">Sorry, no portfolio entries for while.</li>
				 
		<?php endif; ?>
										
		</ul>
	</div>
</div>