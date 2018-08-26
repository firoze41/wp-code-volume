<?php if(have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<!-- SMOF Data will start -->
	<?php global $data;
    $slides = $data['loop_slider']; // this id have to into SMOF 
    foreach ($slides as $slide) { ?>
	
		<!-- our data start -->
        <a href="<?php echo $slide['link']; ?>"><img src="<?php echo $slide['url']; ?>" alt="" title="<?php echo $slide['description']; ?>" data-transition="boxRainGrowReverse" /></a>
		<!-- our data end>
		
    <?php }
    ?>  
<!-- SMOF Data will end -->

<?php endwhile; ?>
<?php endif; ?>





<!-- show this code into your admin SMOF  -->
$of_options[] = array( 	"name" 		=> "Slider Settings",
						"type" 		=> "heading"
				);
				
$of_options[] = array( 	"name" 		=> "Slider Options",
						"desc" 		=> "Unlimited slider with drag and drop sortings.",
						"id" 		=> "loop_slider",
						"std" 		=> "",
						"type" 		=> "slider"
				);
				
				
				
				
				
				
<!-- example link -->
http://stackoverflow.com/questions/19332522/wordpress-help-slightly-modded-options-framework-smof				
				
				
				