<?php 

add_action( 'after_setup_theme', 'default_custom_theme_setup' );

function default_custom_theme_setup() {
   
	add_image_size( 'photo_large_crop', 960, 450, true ); //(cropped)
	add_theme_support( 'post-thumbnails' );
}


/**
 * Register nav menu
 */
register_nav_menus( array(
	'topbar' => 'Top Bar',
) );

/**
 * Adds galerie_photos_widget widget.
 */
class galerie_photos_widget extends WP_Widget {
	function __construct() {
		parent::__construct(
			'photos_widgets', // Base ID
			__('Photos Widget', 'text_domain'), // Name
			array( 'description' => __( 'Displays thumbanils of related posts in a fancy way', 'text_domain' ), ) // Args
		);
	}
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$post_type = apply_filters( 'widget_title', $instance['post_type'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		echo '<ul class="photos">';
		$the_query = new WP_Query( array( 'post_type' => $post_type, 'posts_per_page' => 40)  );
		
		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				echo '<li><a href="';
				the_permalink();
				echo '">';
				the_post_thumbnail( array(320,320) );
				echo '</a></li>';
			}
		} else {
			// no posts found
		}
		echo '</ul>';
		echo '<div class="preview"></div>';
		/* Restore original Post Data */
		wp_reset_postdata();
		
		?>
		<script>
		jQuery(document).ready(function(){
			jQuery('ul.photos li').hover(function(){
				jQuery('.widget .preview').html(jQuery(this).html());
							
			})
		})
		</script>
		<?php
		
		echo $args['after_widget'];
	}
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
			$post_type = $instance[ 'post_type' ];
		}
		else {
			$title = __( 'Photos', 'text_domain' );
			$post_type = 'post';
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php _e( 'Post Type (default to post):' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>" type="text" value="<?php echo esc_attr( $post_type ); ?>" />
		</p>
		<?php 
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['post_type'] = ( ! empty( $new_instance['post_type'] ) ) ? strip_tags( $new_instance['post_type'] ) : '';
		
		return $instance;
	}

} // class galerie_photos_widget

// register galerie_photos_widget widget
function register_foo_widget() {
    register_widget( 'galerie_photos_widget' );
}
add_action( 'widgets_init', 'register_foo_widget' );


/* Register places post type */
function register_place_post_type() {
	$labels = array(
		'name'               => _x( 'Places', 'post type general name', 'galerie' ),
		'singular_name'      => _x( 'Place', 'post type singular name', 'galerie' ),
		'menu_name'          => _x( 'Places', 'admin menu', 'galerie' ),
		'name_admin_bar'     => _x( 'Place', 'add new on admin bar', 'galerie' ),
		'add_new'            => _x( 'Add New', 'place', 'galerie' ),
		'add_new_item'       => __( 'Add New Place', 'galerie' ),
		'new_item'           => __( 'New Place', 'galerie' ),
		'edit_item'          => __( 'Edit Place', 'galerie' ),
		'view_item'          => __( 'View Place', 'galerie' ),
		'all_items'          => __( 'All Places', 'galerie' ),
		'search_items'       => __( 'Search Places', 'galerie' ),
		'parent_item_colon'  => __( 'Parent Places:', 'galerie' ),
		'not_found'          => __( 'No places found.', 'galerie' ),
		'not_found_in_trash' => __( 'No places found in Trash.', 'galerie' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'place' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'place', $args );
}
add_action( 'init', 'register_place_post_type' );