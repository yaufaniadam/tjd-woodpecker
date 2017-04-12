<?php 
/* custom post type*/
add_action( 'init', 'create_post_types' );

function create_post_types() {
	/*slider post type
	register_post_type( 'slider',
		array(
		  'labels' => array(
			'name' => __( 'Sliders', 'bwstheme' ),
			'singular_name' => __( 'Slider', 'bwstheme' ),	
			'add_new' => _x( 'Add New', 'Slider', 'bwstheme' ),
			'add_new_item' => __( 'Add New Slider', 'bwstheme' ),
			'edit_item' => __( 'Edit Slider', 'bwstheme' ),
			'new_item' => __( 'New Slider', 'bwstheme' ),
			'view_item' => __( 'View Sliders', 'bwstheme' ),
			'search_items' => __( 'Search Sliders', 'bwstheme' ),
			'not_found' =>  __( 'No Slider found', 'bwstheme' ),
			'not_found_in_trash' => __( 'No Slider found in Trash', 'bwstheme' ),
			'parent_item_colon' => ''
		  ),
		  'public' => true,
		  'supports' => array('title','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'slider' ),
		  'menu_icon' => 'dashicons-editor-code',
		  
		)
	);	*/
	register_post_type( 'tutorial',
		array(
		  'labels' => array(
			'name' => __( 'Tutorials', 'bwstheme' ),
			'singular_name' => __( 'Tutorial', 'bwstheme' ),	
			'add_new' => _x( 'Add New', 'Tutorial', 'bwstheme' ),
			'add_new_item' => __( 'Add New Tutorial', 'bwstheme' ),
			'edit_item' => __( 'Edit Tutorial', 'bwstheme' ),
			'new_item' => __( 'New Tutorial', 'bwstheme' ),
			'view_item' => __( 'View Tutorials', 'bwstheme' ),
			'search_items' => __( 'Search Tutorials', 'bwstheme' ),
			'not_found' =>  __( 'No Tutorial found', 'bwstheme' ),
			'not_found_in_trash' => __( 'No Tutorial found in Trash', 'bwstheme' ),
			'parent_item_colon' => ''
		  ),
		  'public' => true,
		  'supports' => array('title','editor','thumbnail'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'tutorial' ),
		  'menu_icon' => 'dashicons-book',
		  
		)
	);	
	register_post_type( 'chapter',
		array(
		  'labels' => array(
			'name' => __( 'Chapters', 'bwstheme' ),
			'singular_name' => __( 'Chapter', 'bwstheme' ),	
			'add_new' => _x( 'Add New', 'Chapter', 'bwstheme' ),
			'add_new_item' => __( 'Add New Chapter', 'bwstheme' ),
			'edit_item' => __( 'Edit Chapter', 'bwstheme' ),
			'new_item' => __( 'New Chapter', 'bwstheme' ),
			'view_item' => __( 'View Chapters', 'bwstheme' ),
			'search_items' => __( 'Search Chapters', 'bwstheme' ),
			'not_found' =>  __( 'No Chapter found', 'bwstheme' ),
			'not_found_in_trash' => __( 'No Chapter found in Trash', 'bwstheme' ),
			'parent_item_colon' => ''
		  ),
		  'public' => true,
		  'supports' => array('title','editor'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'chapter' ),
		  'menu_icon' => 'dashicons-index-card',
		  
		)
	);	
	register_post_type( 'link',
		array(
		  'labels' => array(
			'name' => __( 'Links', 'bwstheme' ),
			'singular_name' => __( 'Link', 'bwstheme' ),	
			'add_new' => _x( 'Add New', 'Link', 'bwstheme' ),
			'add_new_item' => __( 'Add New Link', 'bwstheme' ),
			'edit_item' => __( 'Edit Link', 'bwstheme' ),
			'new_item' => __( 'New Link', 'bwstheme' ),
			'view_item' => __( 'View Links', 'bwstheme' ),
			'search_items' => __( 'Search Links', 'bwstheme' ),
			'not_found' =>  __( 'No Link found', 'bwstheme' ),
			'not_found_in_trash' => __( 'No Link found in Trash', 'bwstheme' ),
			'parent_item_colon' => ''
		  ),
		  'public' => true,
		  'supports' => array('title'),
		  'query_var' => true,
		  'rewrite' => array( 'slug' => 'go' ),
		  'menu_icon' => 'dashicons-admin-links',
		  
		)
	);	
}
// Add taxonomies
add_action( 'init', 'create_taxonomies' );
//create taxonomies
function create_taxonomies() {	
// tutorial taxonomies
	$tuto_cats = array(
		'name' => __( 'Tutorial Categories', 'bwstheme' ),
		'singular_name' => __( 'Tutorial Category', 'bwstheme' ),
		'search_items' =>  __( 'Search Tutorial Categories', 'bwstheme' ),
		'all_items' => __( 'All Tutorials Categorie', 'bwstheme' ),
		'parent_item' => __( 'Parent Tutorial Category', 'bwstheme' ),
		'parent_item_colon' => __( 'Parent Tutorial Category:', 'bwstheme' ),
		'edit_item' => __( 'Edit Tutorial Category', 'bwstheme' ),
		'update_item' => __( 'Update Tutorial Category', 'bwstheme' ),
		'add_new_item' => __( 'Add New Tutorial Category', 'bwstheme' ),
		'new_item_name' => __( 'New Tutorial Category Name', 'bwstheme' ),
		'choose_from_most_used'	=> __( 'Choose from the most used Tutorial categories', 'bwstheme' )
	); 	

	register_taxonomy('tutorial_cats','tutorial',array(
		'hierarchical' => true,
		'labels' => $tuto_cats,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'kategori' ),
	));		
}

/*custom column */
add_filter( 'manage_chapter_posts_columns', 'set_custom_edit_chapter_columns' );
add_action( 'manage_chapter_posts_custom_column' , 'custom_chapter_column', 10, 2 );

function set_custom_edit_chapter_columns($columns) {
   $columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Judul Chapter' ),
		'chapter' => __( 'Chapter' ),
		'chapter2' => __( 'Chapter' ),
		'chapter3' => __( 'Chapter' ),
		'chapter4' => __( 'Chapter' ),
	);
    return $columns;
}

function custom_chapter_column( $column, $post_id ) {
    switch ( $column ) {

        case 'chapter' :
            echo get_post_meta( $post_id , 'chapter_num' , true ); 			
            break; 
		case 'chapter2' :
			$terms = wp_get_post_terms($post_id, 'fraksi', array("fields" => "all"));
            if($terms) {
				foreach ( $terms as $term ) {
					$term_link = get_term_link( $term );
					if ( is_wp_error( $term_link ) ) {
						continue;
					}
					echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
				}
			} 
            break;
		case 'chapter3' :
            $terms = wp_get_post_terms($post_id, 'komisi', array("fields" => "all"));
            if($terms) {
				foreach ( $terms as $term ) {
					$term_link = get_term_link( $term );
					if ( is_wp_error( $term_link ) ) {
						continue;
					}
					echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
				}
			} else { echo "-";}
            break;case 'chapter4' :
            $terms = wp_get_post_terms($post_id, 'komisi', array("fields" => "all"));
            if($terms) {
				foreach ( $terms as $term ) {
					$term_link = get_term_link( $term );
					if ( is_wp_error( $term_link ) ) {
						continue;
					}
					echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
				}
			} else { echo "-";}
            break;
    }
}
