<?php

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function hbd_student_posttype() {

    $labels = array(
        'name'                => __( 'Students', 'hbd-aep' ),
        'singular_name'       => __( 'Student', 'hbd-aep' ),
        'add_new'             => _x( 'Add New Student', 'hbd-aep', 'hbd-aep' ),
        'add_new_item'        => __( 'Add New Student', 'hbd-aep' ),
        'edit_item'           => __( 'Edit Student', 'hbd-aep' ),
        'new_item'            => __( 'New Student', 'hbd-aep' ),
        'view_item'           => __( 'View Student', 'hbd-aep' ),
        'search_items'        => __( 'Search Students', 'hbd-aep' ),
        'not_found'           => __( 'No Students found', 'hbd-aep' ),
        'not_found_in_trash'  => __( 'No Students found in Trash', 'hbd-aep' ),
        'parent_item_colon'   => __( 'Parent Student:', 'hbd-aep' ),
        'menu_name'           => __( 'Students', 'hbd-aep' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'Custom Post Type Created for Students',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-id',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => false,  //true
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'post-formats')
    );

    register_post_type( 'student', $args );
}

add_action( 'init', 'hbd_student_posttype' );


add_filter('manage_student_posts_columns', 'hbd_head_only_students');
add_action('manage_student_posts_custom_column', 'hbd_content_only_students', 10, 2);
 
//adding column in the listing of the our mentors
function hbd_head_only_students($defaults) {
    $defaults['featured_image'] = 'Student Image';
    return $defaults;
}
function hbd_content_only_students($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_thumbnail_id = get_post_thumbnail_id($post_ID);
        if ($post_thumbnail_id) {
            $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
            echo "<img src='".$post_thumbnail_img[0]."' width='80'/>";
        }
    }
}

// set metaboxes
function hbd_students_metabox_options( $options ) {
    $options[]    = array(
        'id'        => 'student_meta',
        'title'     => 'Student Others Details',
        'post_type' => 'student',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'  => 'general',
                //'title' => 'General',
                //'icon'  => 'fa fa-cog',
                'fields' => array(
                    array(
                        'id'        => 'student_school',
                        'type'      => 'text',
                        'title'     => 'School Name',
                        'add_title' => 'Student School Name',
                    ),

                    array(
                        'id'                => 'student_social_link',
                        'type'              => 'group',
                        'title'             => 'Social Links',
                        'button_title'      => 'Add New',
                        'accordion_title'   => 'Add New Social Link',
                        'fields'            => array(
                            array(
                                'id'        => 'student_social_link_url',
                                'type'      => 'text',
                                'title'     => 'Social Link URL',
                                ),

                            ), 
                        ), // end of page section groups

                ), // END fields
            ), // END section
        ), // END sections
    ); // END $options
    return $options;
}
add_filter( 'cs_metabox_options', 'hbd_students_metabox_options' );


/*
* Creating a function to create user email meta
*/
 
function create_user_email_metabox(){
	add_meta_box(
			'our_first_meta',
			'About Aubhor',
			'create_user_email_metabox_callback',
			'student',
			'side',
			'high'
			
	
	);
	
}
add_action('add_meta_boxes','create_user_email_metabox');

// meta box callback
function create_user_email_metabox_callback(){
	wp_nonce_field( basename(__FILE__),  'nonce_email_formeta' );
	$value = get_post_meta(get_the_ID(), '_user_metabox_post', true );
	?>
	<div class="metabox-comtainer">
		<div class="single-metabox">
		<label for="">User Email</label>
		<input type="text" id="user-email" style="height:200px; width:100%;" name="user-email" value="<?php
			if(!empty($value)){
				echo $value;
				
				
			}
	


		?>" />
		</div>
	</div>
	
	
	
<?php	
}

function save_our_metabox_value(){
	if(!wp_verify_nonce( $_POST['nonce_email_formeta'], basename(__FILE__)  )){
		return;
	}
	
	if(!isset($_POST['user-email'])){
		return;
		
	}
	
	update_post_meta(get_the_ID(), '_user_metabox_post', sanitize_text_field($_POST['user-email'])); 
	
	
}

add_action( 'save_post', 'save_our_metabox_value' );