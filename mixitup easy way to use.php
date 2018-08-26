		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="portfolio_filter">
						<!-- Filters -->
						<?php if(!is_tax()) {
						$terms = get_terms("mixitup_category"); // This is category post
						$count = count($terms);
						if ( $count > 0 ){ ?>
						<ul class="portfolio_filter_filter">
						<li class="filter" data-filter="all"><?php  _e('All', 'webdgallery'); ?></li> <!--This is default-->
						<?php
						foreach ( $terms as $term ) {
						echo '<li class="filter" data-filter=".'.$term->slug.'">'. $term->name .'</li>';
						} ?> <!--here .'.$term->slug.' is data-filter name/class & '. $term->name .' is title-->

						</ul>
						<?php } } ?>
					</div> <!---Filters end--->
					
					<div class="portfolio_content">
						<ul  class="portfolio_filter_action">
		<!--here mix_itup is post type & 12= how many post that i want to show--->			             
		<?php query_posts('post_type=mix_itup&post_status=publish&posts_per_page=12&paged='.get_query_var('paged')); ?>
							<?php if(have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
									<!--here below post_class  will add class or id it has show into functions.php-->
							<li <?php post_class ('mix'); ?>> <!--our portfolio post start & here mix is default class that stay alltime-->
							<div class="single_portfolio"><?php if ( has_post_thumbnail()) the_post_thumbnail('portfolio-size'); ?></div>
							</li> <!--our portfolio post end-->
							<?php endwhile; // posibilt to add else statement
							
							else:?>
								<li class="error-not-found">Sorry, no portfolio entries for while.</li>
							<?php endif; ?>	
						</ul>
					</div>
				</div>
			</div>
		</div>
		
		
		
	<!-- paste this java into main.js -->
	jQuery(document).ready(function() {

	jQuery('.portfolio_filter_action').mixItUp(
	
	{ // Effects wrapper start 
	
	
	animation: {
		effects: 'fade rotateZ(180deg)'  // This Is animation effects
	}
	
	
	} //Effects wrapper end
	
	);
	
	jQuery('.my_four_col').mixItUp(
	
		{ // Effects wrapper start 
	
	
	animation: {
		effects: 'fade rotateZ(180deg)'  // This Is animation effects
	}
	
	
	} //Effects wrapper end
	);
});



<!-- paste this css into your css file -->

.portfolio_filter{margin:50px 0;text-align:center;}
.portfolio_filter_filter{margin:0;padding:0;list-style:none;display:inline;}
.portfolio_filter_filter li{display:inline-block;margin-right:10px;cursor:pointer;}
.portfolio_content{}
.portfolio_content ul{margin:0;padding:0;list-style:none;display:inline;}
.portfolio_content ul li{display:inline-block;margin-right:10px;cursor:pointer;margin-bottom:10px;}
.portfolio_content ul li.single_portfolio img{}
.single_portfolio img{width:70px;height:70px;}


<!-- mainly you have to use this css must  -->
.portfolio_filter_action .mix{display:none;}
.my_four_col .mix{display:none;}
		
		
		
		
		
		