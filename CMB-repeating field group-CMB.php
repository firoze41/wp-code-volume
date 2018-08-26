
// call this into CMB

	/**
	 * Repeatable Field Groups
	 */
	$meta_boxes['field_group_entry'] = array(
		'id'         => 'field_group_entry',
		'title'      => __( 'Repeating Field Group', 'cmb' ),
		'pages'      => array( 'more_etnry', ), // this is post type
		'fields'     => array(
			array(
				'id'          => 'repeat_group2',
				'type'        => 'group',
				'description' => __( 'Generates reusable form entries', 'cmb' ),
				'options'     => array(
					'group_title'   => __( 'Entry {#}', 'cmb' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Another Entry', 'cmb' ),
					'remove_button' => __( 'Remove Entry', 'cmb' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields'      => array(
					array(
						'name' => 'Entry Title',
						'id'   => 'title',
						'type' => 'text',
						// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
					),
					array(
						'name' => 'Description',
						'description' => 'Write a short description for this entry',
						'id'   => 'description',
						'type' => 'textarea_small',
					),
					array(
						'name' => 'Entry Image',
						'id'   => 'image',
						'type' => 'file',
					),
					array(
						'name' => 'Image Caption',
						'id'   => 'image_caption',
						'type' => 'text',
					),
					// add more
					array(
						'name' => 'Title Two',
						'id'   => 'title2',
						'type' => 'text',
					),
				),
			),
		),
	);
	

	
	
****************************************************************************************************************

// usages of Repeatable Field Groups


<div class="container">
	<div class="row">
		
		<?php
		global $post;
		$args = array( 'posts_per_page' =>-1, 'post_type'=> 'more_etnry','order'=>'ASC');
		$myposts = get_posts( $args );
		foreach( $myposts as $post ) : setup_postdata($post); ?>


		
		<?php
		$entries = get_post_meta( get_the_ID(), 'repeat_group2', true );
		foreach ( (array) $entries as $key => $entry ) {

			$img = $title = $desc = $caption = $title2 = ''; // add more

			if ( isset( $entry['title'] ) )
				$title = esc_html( $entry['title'] );

			if ( isset( $entry['description'] ) )
				$desc = wpautop( $entry['description'] );

			if ( isset( $entry['image_id'] ) ) {
				$img = wp_get_attachment_image( $entry['image_id'], 'share-pick', null, array(
					'class' => 'thumb',
				) );
			}
			$caption = isset( $entry['image_caption'] ) ? wpautop( $entry['image_caption'] ) : '';

			// add more
			if ( isset( $entry['title2'] ) )
				$title2 = esc_html( $entry['title2'] );
			
			// Do something with the data
			?> <!-- back php start -->
			
			<div class="col-md-4">		
				<h2><?php echo $title;?></h2>
				<?php echo $desc;?>
				<?php echo $img;?>
				<?php echo $caption;?>
				<h2><?php echo $title2;?></h2>
			</div>

<!-- back php end --><?php

		}

		?>
		
		
		<?php endforeach;?>	
	</div>
</div>
	
	
	
	
	
	
	
	
	
	
	
	