<?php
/*---------------------------------------------------------------------------------*/
/* WP_Widget_shopbycat widget */
/*---------------------------------------------------------------------------------*/
class WP_Widget_shopbycats extends WP_Widget {

	function __construct() {
		$widget_ops = array('description' => 'Shop By Category.' );

		parent::__construct(false, __('Shop By category', 'woodpecker'),$widget_ops);      
	}

	function widget($args, $instance) {  
		extract( $args );
        $number = empty($instance['number']) ? 5 : $instance['number'];
		$title = apply_filters('widget_title', $instance['title'] );
		$cat = empty($instance['cat']) ? 0 : $instance['cat'];
		
		echo $before_widget;
		
		if($title) {		
			echo $before_title . $title. $after_title;
		}
?>			
	<article>
		<ul>
		<?php
		
					$term_id = get_queried_object()->term_id;
					$taxonomy_name = 'product_cat';
					$term_children = get_term_children( $term_id, $taxonomy_name );
					
					if ( $term_children ) {	
					
						$term = get_term_by( 'id', $term_id, $taxonomy_name );
						
						get_term_link( $term, $taxonomy_name );
						echo '<li><a href="' . get_term_link( $term, $taxonomy_name ) . '">All ' . $term->name . '</a></li>';
						
						foreach ( $term_children as $child ) {
							$term = get_term_by( 'id', $child, $taxonomy_name );
							
							get_term_link( $child, $taxonomy_name );
							echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
						}
							
						
					} else {						
						
						/* cari parentnya */
						$child_term = get_term( $term_id, $taxonomy_name );
						$parent_term = get_term( $child_term->parent, $taxonomy_name );	
						
						$parent_id = $parent_term->term_id;
						
						if( $parent_id ) {	//jika dia memiliki parent maka
							
							$terms = get_terms( array(
								'taxonomy' => $taxonomy_name,
								'hide_empty' => false,
								'parent' => $parent_id,
							) );
							
							$term = get_term_by( 'id', $parent_id, $taxonomy_name );
							
							get_term_link( $term, $taxonomy_name );
							echo '<li><a href="' . get_term_link( $term, $taxonomy_name ) . '">All ' . $term->name . '</a></li>';
							
							foreach( $terms as $term ) {							
								
								echo '<li><a href="' . get_term_link( $term, $taxonomy_name ) . '">' . $term->name . '</a></li>';
								
							}
						} else {
							
							$term = get_term_by( 'id', $term_id, $taxonomy_name );
						
							get_term_link( $term, $taxonomy_name );
							echo '<li><a href="' . get_term_link( $term, $taxonomy_name ) . '">All ' . $term->name . '</a></li>';
							
						} // end if $parent_term
					}
					
					?> 				
							
		</ul>
	</article>	
		
<?php			
	   echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
	 
		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = strip_tags( $new_instance['number'] );
		$instance['cat'] = strip_tags( $new_instance['cat'] );
		
		return $instance;
	}

    function form($instance) {
		//Set up some default widget settings.
		$defaults = array( 'title' => __('Latest News', 'woodpecker'), 'number' => __(5, 'woodpecker'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
      
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'woodpecker'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>		 

		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number: (default = 5)', 'woodpecker'); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" style="width:100%;" />
		</p>
		<p>
			<select id="<?php echo $this->get_field_id('cat'); ?>" name="<?php echo $this->get_field_name('cat'); ?>" class="widefat" style="width:100%;">
				<option <?php selected( $instance['cat'], $term->term_id ); ?> value="0">All</option>
				<?php foreach(get_terms('category','parent=0&hide_empty=0') as $term) { ?>				
				<option <?php selected( $instance['cat'], $term->term_id ); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
				<?php } ?>      
			</select>
		</p>
		
		<?php
	}
} 

register_widget('WP_Widget_shopbycats');
?>