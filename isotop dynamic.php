// isotope dynamic in wordpress

				<div class="col-md-12">
					<div class="total_awesome_project">
						<div class="project_filter text-center text-uppercase">
							<!-- Filters -->
							<?php if(!is_tax()) {
							$terms = get_terms("portfolio_category"); // This is category post that has been shown in taxonomy
							$count = count($terms);
							if ( $count > 0 ){ ?>
							<ul class="filter_option nav">
							<li class="active" data-filter="*"><?php  _e('all', 'webdgallery'); ?></li> <!--This is default-->
							<?php
							foreach ( $terms as $term ) {
							echo '<li data-filter=".'.$term->slug.'">'. $term->name .'</li>';
							} ?> <!--here .'.$term->slug.' is data-filter name/class & '. $term->name .' is title-->	
							</ul>
							<?php } } ?>	
						</div>
						
						<div class="all_project">
							<div class="single_project_wrapper">
								<!--here frost_project is post type & 12= how many post that i want to show--->			             
							<?php query_posts('post_type=frost_project&post_status=publish&posts_per_page=12&paged='.get_query_var('paged')); ?>
							<?php if(have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
							
									<!-- this is the code for ?php echo strtolower($tax);?  that has been used below indo the div-->
							            <?php
										$terms = get_the_terms( $post->ID, 'portfolio_category' );  // This is category post that has been shown in taxonomy

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
										
									<!--here below post_class  will add class or id it has show into functions.php-->
							<div class="single_all_project <?php echo strtolower($tax);?>" > <!--our portfolio post start & here single_all_project is default class that stay 
							alltime-->
							
							<?php if ( has_post_thumbnail()) the_post_thumbnail('portfolio-frost-size'); ?>
							</div> <!--our portfolio post end-->
							<?php endwhile; // posibilt to add else statement
							
							else:?>
								<div class="error-not-found">Sorry, no portfolio entries for while.</div>
							<?php endif; ?>	
							</div>						
						</div>
					</div>
				</div>






// css for the above code

.project_filter{margin-bottom:25px;}
.project_filter ul.filter_option{}
.project_filter ul.filter_option li.active{color:#549dc5;}
.project_filter ul.filter_option li{display:inline-block;color:#2e2e2e;font-size:16px;cursor:pointer;}
.project_filter ul.filter_option li.active:after{}
.project_filter ul.filter_option li:after{content:"/";padding:10px;color: #B4B4B4}
.project_filter ul.filter_option li:last-child:after{display:none;}

.all_project{margin-left:-10px;}
.single_project_wrapper{}
.single_all_project{float:left;margin-bottom:10px;margin-left: 10px;}
.single_all_project img{width: 277px;}



// js for the above code isotop active

	   // portfolio isotope js
		jQuery(document).ready(function () {
			var jQuerycontainer = jQuery('.all_project');
			jQuerycontainer.imagesLoaded(function () {
				jQuerycontainer.isotope({
					itemSelector: '.single_all_project',
					layoutMode: 'fitRows'
				});
			});

			jQuery('.project_filter ul.filter_option li').click(function () {

				jQuery('.project_filter ul.filter_option li').removeClass('active');
				jQuery(this).addClass('active');

				var selector = jQuery(this).attr('data-filter');
				jQuerycontainer.isotope({
					filter: selector
				});

				return false;
			});