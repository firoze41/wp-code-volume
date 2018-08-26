
// Images changeing by every re-loading the browser

			<?php
			// Change to the type of files to use eg. .jpg or .gif or .png
			$file_type = ".jpg";

			// Change to the location of the folder containing the images
			$image_folder = "images"; // this is img folder name

			// write the start and end number of image.
			$random = mt_rand(1, 5); // here 1, 2 image serial number and 5 is serial number 5 that mean there are 5 images

			$image_name = $random . $file_type;
			
			// only img
		   echo '<img src="'.get_template_directory_uri().'/'.$image_folder.'/'.$image_name.'" alt="'.$image_name.'" />';

			
			// set background images
			echo 
			'
			<style type="text/css">
			.services_area{background:url("'.get_template_directory_uri().'/'.$image_folder.'/'.$image_name.'") no-repeat scroll 0 0;background-size:cover;}
			</style>
			';
			?>
			
			<!-- use image out of root php code only img -->
			<?php echo '<img src="'.get_template_directory_uri().'/'.$image_folder.'/'.$image_name.'" alt="'.$image_name.'" />';?>
			
			<!-- set background images out of root php code -->
			<?php 
			echo 
			'
			<style type="text/css">
			body{background:url("'.get_template_directory_uri().'/'.$image_folder.'/'.$image_name.'") no-repeat scroll 0 0;background-size:cover;}
			</style>
			';
			?>