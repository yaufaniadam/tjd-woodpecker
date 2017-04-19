<?php
add_filter( 'rwmb_meta_boxes', 'woodpecker_' );
function woodpecker_( $meta_boxes ) {
		
	$meta_boxes[] = array(
		'id' => 'product-details',
		'title' => __( 'Product Details', 'woodpecker' ),
		'pages' => array( 'products' ),
		
		'priority' => 'high',
		'autosave' => true,
		'fields' => array(
			
			// TAXONOMY
			
			array(
				'name'  => __('Product Code', 'woodpecker' ),
				'id'    => "product_code",
				'type'  => 'text',				
			),
			array(
				'name'  => __('Price', 'woodpecker' ),
				'id'    => "product_price",
				'type'  => 'text',				
			),
			array(
				'name'  => __('Material', 'woodpecker' ),
				'id'    => "product_material",
				'type'  => 'text',				
			),
			array(
				'name'  => __('Size', 'woodpecker' ),
				'id'    => "product_size",
				'type'  => 'text',				
			),							
		),				
	);	
	return $meta_boxes;
}


