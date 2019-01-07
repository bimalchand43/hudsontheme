<?php

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function hbd_boardmember_posttype() {

    $labels = array(
        'name'                => __( 'Board Members', 'hbd-aep' ),
        'singular_name'       => __( 'Board Member', 'hbd-aep' ),
        'add_new'             => _x( 'Add New Board Member', 'hbd-aep', 'hbd-aep' ),
        'add_new_item'        => __( 'Add New Board Member', 'hbd-aep' ),
        'edit_item'           => __( 'Edit Board Member', 'hbd-aep' ),
        'new_item'            => __( 'New Board Member', 'hbd-aep' ),
        'view_item'           => __( 'View Board Member', 'hbd-aep' ),
        'search_items'        => __( 'Search Board Members', 'hbd-aep' ),
        'not_found'           => __( 'No Board Members found', 'hbd-aep' ),
        'not_found_in_trash'  => __( 'No Board Members found in Trash', 'hbd-aep' ),
        'parent_item_colon'   => __( 'Parent Board Member:', 'hbd-aep' ),
        'menu_name'           => __( 'Board Members', 'hbd-aep' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'Custom Post Type Created for Board Members',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-id',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => false, //set false to remove View btn
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'post-formats')
    );

    register_post_type( 'boardmember', $args );
}

add_action( 'init', 'hbd_boardmember_posttype' );


add_filter('manage_boardmember_posts_columns', 'hbd_head_only_boardmembers');
add_action('manage_boardmember_posts_custom_column', 'hbd_content_only_boardmembers', 10, 2);
 
//adding column in the listing of the our mentors
function hbd_head_only_boardmembers($defaults) {
    $defaults['featured_image'] = 'Board Member Image';
    return $defaults;
}
function hbd_content_only_boardmembers($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_thumbnail_id = get_post_thumbnail_id($post_ID);
        if ($post_thumbnail_id) {
            $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
            echo "<img src='".$post_thumbnail_img[0]."' width='80'/>";
        }
    }
}

// set metaboxes
function hbd_boardmembers_metabox_options( $options ) {
    $options[]    = array(
        'id'        => 'board_member_meta',
        'title'     => 'Board Members Others Details',
        'post_type' => 'boardmember',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'  => 'general',
                //'title' => 'General',
                //'icon'  => 'fa fa-cog',
                'fields' => array(
                    array(
                        'id'        => 'bm_designation',
                        'type'      => 'text',
                        'title'     => 'Designation',
                        'add_title' => 'Board Member Designation',
                    ),
                    array(
                        'id'        => 'bm_linkendin_id',
                        'type'      => 'text',
                        'title'     => 'linkedin',
                        'add_title' => 'Board Member linkedin ID',
                    ),
                ), // END fields
            ), // END section
        ), // END sections
    ); // END $options
    return $options;
}
add_filter( 'cs_metabox_options', 'hbd_boardmembers_metabox_options' );