<?php 
/**
 * Woodpecker Custom Post Type
 *
 * @since 1.0
 */
 
function create_post_types() {
	// product post type 
	$label = array(
			'name' 				=> __( 'Products', 'woodpecker' ),
			'singular_name' 	=> __( 'Product', 'woodpecker' ),	
			'add_new' 			=> _x( 'Add New', 'Product', 'woodpecker' ),
			'add_new_item' 		=> __( 'Add New Product', 'woodpecker' ),
			'edit_item' 		=> __( 'Edit Product', 'woodpecker' ),
			'new_item' 			=> __( 'New Product', 'woodpecker' ),
			'view_item' 		=> __( 'View Products', 'woodpecker' ),
			'search_items' 		=> __( 'Search Products', 'woodpecker' ),
			'not_found' 		=> __( 'No Product found', 'woodpecker' ),
			'not_found_in_trash'=> __( 'No Product found in Trash', 'woodpecker' ),
			'parent_item_colon' => ''
	);
	$args = array(
			'labels' 			=> $label,
			'description' 		=> __( 'All products upload here', 'woodpecker' ),
			'public' 			=> true,
			'supports'			=> array( 'title', 'editor', 'thumbnail' ),
			'query_var' 		=> true,
			'rewrite' 			=> array( 'slug' => 'product' ),
			'menu_icon'			=> 'dashicons-chart-bar',
			'show_in_nav_menus' => false,		  
	);
	register_post_type( 'product', $args );	
}
add_action( 'init', 'create_post_types' );

// create taxonomies
function create_taxonomies() {	
	// product taxonomies
	$labels = array(
			'name' 					=> __( 'Product Categories', 'woodpecker' ),
			'singular_name' 		=> __( 'Product Category', 'woodpecker' ),
			'search_items' 			=> __( 'Search Product Categories', 'woodpecker' ),
			'all_items' 			=> __( 'All Products Categorie', 'woodpecker' ),
			'parent_item' 			=> __( 'Parent Product Category', 'woodpecker' ),
			'parent_item_colon' 	=> __( 'Parent Product Category:', 'woodpecker' ),
			'edit_item' 			=> __( 'Edit Product Category', 'woodpecker' ),
			'update_item' 			=> __( 'Update Product Category', 'woodpecker' ),
			'add_new_item' 			=> __( 'Add New Product Category', 'woodpecker' ),
			'new_item_name' 		=> __( 'New Product Category Name', 'woodpecker' ),
			'choose_from_most_used'	=> __( 'Most used Product categories', 'woodpecker' )
	); 	
	
	$args = array(
			'hierarchical' 			=> true,
			'labels' 				=> $labels,
			'query_var' 			=> true,
			'rewrite' 				=> array( 'slug' => 'product-category' ),
			'show_in_nav_menus' 	=> true,			
	);	
	register_taxonomy( 'product_cat', 'product', $args );
}
add_action( 'init', 'create_taxonomies' );

// Custom column 
function set_custom_edit_product_columns($columns) {
	$columns = array(
			'cb' 			=> '<input type="checkbox" />',
			'thumbnail' 	=> __( 'Image' ),
			'title' 		=> __( 'Product Name' ),
			'product-id' 	=> __( 'Code' ),			
			'price' 		=> __( 'Price' ),
			'size' 			=> __( 'Size' )
	);
    return $columns;
}

function custom_product_column( $column, $post_id ) {
    switch ( $column ) {

        case 'product-id' :
            echo get_post_meta( $post_id , 'product_code' , true ); 			
            break; 
		case 'thumbnail' :
			if( has_post_thumbnail() ) {
				the_post_thumbnail('thumbnail');
			} else {
				echo '<img src="https://placehold.it/100x100" />';
			}
            break;
		case 'price' :
			echo get_post_meta( $post_id , 'product_price' , true );
            break;
		case 'size' :
			echo get_post_meta( $post_id , 'product_size' , true );
            break;
		
    }
}
add_filter( 'manage_product_posts_columns', 'set_custom_edit_product_columns' );
add_action( 'manage_product_posts_custom_column' , 'custom_product_column', 10, 2 );