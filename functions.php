<?php 

if ( ! isset( $content_width ) ) {
	$content_width = 940;
}

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

if ( ! function_exists( 'default_custom_theme_setup' ) ) :
	function default_custom_theme_setup() {
	   
		add_image_size( 'photo_large_crop', 960, 450, true ); //(cropped)
		add_image_size( 'photo_small_thumbnail', 100, 58, true ); //(cropped)		
		add_theme_support( 'post-thumbnails' );
		load_theme_textdomain( 'translate', get_template_directory() . '/languages' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );
		add_filter('widget_text', 'do_shortcode'); // Allow Shortcodes on Sidebar
		add_editor_style( 'css/editor-style.css' ); 
		register_nav_menus( array(
			'topbar' => 'Top Bar',
		) );
		
	}
	add_action( 'after_setup_theme', 'default_custom_theme_setup' );
endif; // default_custom_theme_setup


if ( ! function_exists('default_theme_unregister_default_wp_widgets') ) :
	function default_theme_unregister_default_wp_widgets() {
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Links');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_RSS');
		unregister_widget('WP_Widget_Search');
		//unregister_widget('WP_Widget_Text');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Tag_Cloud');
		unregister_widget('WP_Nav_Menu_Widget');
		unregister_widget('WP_Widget_RSS');
	
	}
	add_action('widgets_init', 'default_theme_unregister_default_wp_widgets');
endif;


/**
 * Enqueue scripts and styles
 */
if ( ! function_exists( 'default_theme_remove_header' ) ) :
	function default_theme_name_scripts() {
		
		// Deregister the included library
		wp_deregister_script( 'jquery' );
		 
		// Register the library again from Google's CDN
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), null, false );
		
		// Register Custom Scripts
		wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '1.0.0', true );
		
		
	}
	
	add_action( 'wp_enqueue_scripts', 'default_theme_name_scripts' );
endif; // default_theme_remove_header

/**
 * Enqueue Admin scripts and styles
 */
function default_theme_admin_name_scripts() {
	
	global $wp_styles;
	wp_enqueue_style( 'default_admin_style', get_template_directory_uri().'/css/admin.css' , false );
	wp_enqueue_style( 'child_admin_style_if_any', get_stylesheet_directory_uri().'/css/admin.css' , false );
	$wp_styles->add_data( 'face3_theme_options', 'rtl', true );
}
add_action( 'admin_print_styles', 'default_theme_admin_name_scripts'  );


/* -------------------------------------------------- */
/* Remove Header Spacing
/* -------------------------------------------------- */
if ( ! function_exists( 'default_theme_remove_header' ) ) :

  function default_theme_remove_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }
add_action('get_header', 'default_theme_remove_header');
endif; // default_theme_remove_header


/* -------------------------------------------------- */
/* Change Excerpt 
/* -------------------------------------------------- */
if ( ! function_exists( 'default_theme_custom_excerpt_more' ) ) :
	function default_theme_custom_excerpt_more($more) {
		return '…';
	}
add_filter('excerpt_more', 'default_theme_custom_excerpt_more');
endif; // default_theme_custom_excerpt_more

if ( ! function_exists( 'default_theme_custom_excerpt_length' ) ) :
	function default_theme_custom_excerpt_length($length) {
	    return 25;
	}
add_filter('excerpt_length', 'default_theme_custom_excerpt_length');
endif;

/* -------------------------------------------------- */
/* SHOW FEATURED IMAGE ON POST AND PAGES COLUMN 
/* -------------------------------------------------- */

// GET FEATURED IMAGE  
function default_theme_get_featured_image($post_ID) {  
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);  
    if ($post_thumbnail_id) {  
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'photo_small_thumbnail');  
        return $post_thumbnail_img[0];  
    }else{ }
}  

// ADD NEW COLUMN
function default_theme_admin_columns_head($defaults) {
	$defaults['featured_image'] = 'Featured Image';
	return $defaults;
}

// SHOW THE FEATURED IMAGE
function default_theme_admin_columns_content($column_name, $post_ID) {
	if ($column_name == 'featured_image') {
		$post_featured_image = default_theme_get_featured_image($post_ID); 
		if ($post_featured_image) {
			echo '<img src="' . $post_featured_image . '" style="width: 100px; height:auto;"/>';
		}
	}
}

// Show featured images on posts
add_filter('manage_posts_columns', 'default_theme_admin_columns_head');  
add_action('manage_posts_custom_column', 'default_theme_admin_columns_content', 10, 2);  

// Show featured images on pages
add_filter('manage_pages_columns', 'default_theme_admin_columns_head');  
add_action('manage_pages_custom_column', 'default_theme_admin_columns_content', 10, 2);  
/* -------------------------------------------------- */




/**
 * Register our sidebars and widgetized areas.
 *
 */
if ( ! function_exists( 'default_custom_theme_sidebars' ) ) :
	function default_custom_theme_sidebars() {

	register_sidebar( array(
		'name' => 'Bottom sidebar',
		'id' => 'default_bottom_1',
		'before_widget' => '<div class="thiswidget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => 'Top sidebar',
		'id' => 'default_top_1',
		'before_widget' => '<div class="thiswidget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => 'Right sidebar',
		'id' => 'default_right_1',
		'before_widget' => '<div class="thiswidget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => 'Mobile Top sidebar',
		'id' => 'default_mobile_top',
		'before_widget' => '<div class="thiswidget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => 'Mobile Bottom sidebar',
		'id' => 'default_mobile_bottom',
		'before_widget' => '<div class="thiswidget">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="rounded">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'default_custom_theme_sidebars' );
endif; // default_custom_theme_setup



// register galerie_photos_widget widget
if ( ! function_exists( 'register_default_theme_widgets' ) ) :
	function register_default_theme_widgets() {
		register_widget( 'galerie_photos_widget' );
	}
	add_action( 'widgets_init', 'register_default_theme_widgets' );
endif;
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
		
		echo '<ul class="default photos widget">';
		$the_query = new WP_Query( array( 'post_type' => $post_type, 'posts_per_page' => 40)  );
		
		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				
				if ( has_post_thumbnail() ) :
					echo '<li><a href="';
					the_permalink();
					echo '">';
					the_post_thumbnail( array(320,320) );
					echo '</a></li>';
				endif;
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



/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function default_theme_add_meta_box() {

	$screens = array( 'post', 'page' );
	
	// Show meta box in all post types:
	$screens = get_post_types( '', 'names' ); 	

	foreach ( $screens as $screen ) {

		add_meta_box(
			'default_article_info',
			__( 'Article Info', 'default' ),
			'default_theme_articleinfo_meta_box_callback',
			$screen,
			'side',
			'core'
		);
	}
}
add_action( 'add_meta_boxes', 'default_theme_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function default_theme_articleinfo_meta_box_callback( $post ) {

	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'default_theme_articleinfo_meta_box', 'default_theme_articleinfo_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$featured_video = get_post_meta( $post->ID, '_featured_video', true );

	echo '<label for="default_theme_featured_video">';
	_e( 'Insert a video link from Youtube', 'myplugin_textdomain' );
	echo '</label> ';
	echo '<input type="text" id="default_theme_featured_video" name="default_theme_featured_video" value="' . esc_attr( $featured_video ) . '" size="25" />';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function default_theme_save_meta_box_data( $post_id ) {
	
	if ( ! isset( $_POST['default_theme_articleinfo_meta_box_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['default_theme_articleinfo_meta_box_nonce'], 'default_theme_articleinfo_meta_box' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	
	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	if ( ! isset( $_POST['default_theme_featured_video'] ) ) {
		return;
	}

	$featured_video = sanitize_text_field( $_POST['default_theme_featured_video'] );

	update_post_meta( $post_id, '_featured_video', $featured_video );
}
add_action( 'save_post', 'default_theme_save_meta_box_data' );

/* ******************** */
/* Get Youtube Video
/* ******************** */
// Linkify youtube URLs which are not already links.
if ( ! function_exists( 'linkifyYouTubeURLs' ) ) :
	function embedfyYouTubeURLs($text) {
		$text = preg_replace('~
			# Match non-linked youtube URL in the wild. (Rev:20130823)
			https?://         # Required scheme. Either http or https.
			(?:[0-9A-Z-]+\.)? # Optional subdomain.
			(?:               # Group host alternatives.
			  youtu\.be/      # Either youtu.be,
			| youtube         # or youtube.com or
			  (?:-nocookie)?  # youtube-nocookie.com
			  \.com           # followed by
			  \S*             # Allow anything up to VIDEO_ID,
			  [^\w\s-]       # but char before ID is non-ID char.
			)                 # End host alternatives.
			([\w-]{11})      # $1: VIDEO_ID is exactly 11 chars.
			(?=[^\w-]|$)     # Assert next char is non-ID or EOS.
			(?!               # Assert URL is not pre-linked.
			  [?=&+%\w.-]*    # Allow URL (query) remainder.
			  (?:             # Group pre-linked alternatives.
				[\'"][^<>]*>  # Either inside a start tag,
			  | </a>          # or inside <a> element text contents.
			  )               # End recognized pre-linked alts.
			)                 # End negative lookahead assertion.
			[?=&+%\w.-]*        # Consume any URL (query) remainder.
			~ix', 
			'<iframe width="460" height="259" src="//www.youtube.com/embed/$1?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>',
			$text);
		return $text;
	}
endif; 