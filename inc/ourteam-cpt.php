<?php

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function hbd_ourteam_posttype() {

    $labels = array(
        'name'                => __( 'Team', 'hbd-aep' ),
        'singular_name'       => __( 'Team', 'hbd-aep' ),
        'add_new'             => _x( 'Add New Team', 'hbd-aep', 'hbd-aep' ),
        'add_new_item'        => __( 'Add New Team', 'hbd-aep' ),
        'edit_item'           => __( 'Edit Team', 'hbd-aep' ),
        'new_item'            => __( 'New Team', 'hbd-aep' ),
        'view_item'           => __( 'View Team', 'hbd-aep' ),
        'search_items'        => __( 'Search Team', 'hbd-aep' ),
        'not_found'           => __( 'No Team found', 'hbd-aep' ),
        'not_found_in_trash'  => __( 'No Team found in Trash', 'hbd-aep' ),
        'parent_item_colon'   => __( 'Parent Team:', 'hbd-aep' ),
        'menu_name'           => __( 'Team', 'hbd-aep' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'Custom Post Type Created for Team',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-businessman',
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

    register_post_type( 'ourteam', $args );
}

add_action( 'init', 'hbd_ourteam_posttype' );


// set metaboxes
function hbd_ourteam_metabox_options( $options ) {
    $options[]    = array(
        'id'        => 'our_mentor_meta',
        'title'     => 'Team Others Details',
        'post_type' => 'ourteam',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'  => 'general',
                //'title' => 'General',
                //'icon'  => 'fa fa-cog',
                'fields' => array(
                    array(
                        'id'        => 'mentor_designation',
                        'type'      => 'text',
                        'title'     => 'Mentor Designation',
                        'add_title' => 'Mentor Designation',
                    ),
                    array(
                        'id'        => 'mentor_linkendin_id',
                        'type'      => 'text',
                        'title'     => 'Mentor linkedin',
                        'add_title' => 'Mentor linkedin ID',
                    ),
                    array(
                        'id'        => 'mentor_date',
                        'type'      => 'text',
                        'title'     => 'Mentor date',
                        'add_title' => 'Mentor date ',
                    ),
                ), // END fields
            ), // END section
        ), // END sections
    ); // END $options
    return $options;
}
add_filter( 'cs_metabox_options', 'hbd_ourteam_metabox_options' );
