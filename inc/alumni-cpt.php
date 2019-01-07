<?php

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function hbd_alumni_posttype() {

    $labels = array(
        'name'                => __( 'Alumnis', 'hbd-aep' ),
        'singular_name'       => __( 'Alumni', 'hbd-aep' ),
        'add_new'             => _x( 'Add New Alumni', 'hbd-aep', 'hbd-aep' ),
        'add_new_item'        => __( 'Add New Alumni', 'hbd-aep' ),
        'edit_item'           => __( 'Edit Alumni', 'hbd-aep' ),
        'new_item'            => __( 'New Alumni', 'hbd-aep' ),
        'view_item'           => __( 'View Alumni', 'hbd-aep' ),
        'search_items'        => __( 'Search Alumnis', 'hbd-aep' ),
        'not_found'           => __( 'No Alumnis found', 'hbd-aep' ),
        'not_found_in_trash'  => __( 'No Alumnis found in Trash', 'hbd-aep' ),
        'parent_item_colon'   => __( 'Parent Alumni:', 'hbd-aep' ),
        'menu_name'           => __( 'Alumnis', 'hbd-aep' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'Custom Post Type Created for Alumnis',
        'taxonomies'          => array( 'alumni_class' ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-id',
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => false, //true
        'query_var'           => true,
        'can_export'          => true,
        /*'rewrite'             => array(
            'slug'  => 'alumnis',
            'with_front' => false
            ), */
        'rewrite'             => true,
        'can_export'          => true,
        'capability_type'     => 'post',
        'supports'            => array( 'title', 'editor', 'thumbnail', 'post-formats')
    );

    register_post_type( 'alumni', $args );

}
add_action( 'init', 'hbd_alumni_posttype' );

/**
 * Create a taxonomy
 */
function alumni_class_taxonomies() {

    $labels = array(
        'name'                      => _x( 'Class Years', 'Taxonomy plural name', 'hbd-aep' ),
        'singular_name'             => _x( 'Class Year', 'Taxonomy singular name', 'hbd-aep' ),
        'search_items'              => __( 'Search Class Years', 'hbd-aep' ),
        'popular_items'             => __( 'Popular Class Years', 'hbd-aep' ),
        'all_items'                 => __( 'All Class Years', 'hbd-aep' ),
        'parent_item'               => __( 'Parent Class Year', 'hbd-aep' ),
        'parent_item_colon'         => __( 'Parent Class Year', 'hbd-aep' ),
        'edit_item'                 => __( 'Edit Class Year', 'hbd-aep' ),
        'update_item'               => __( 'Update Class Year', 'hbd-aep' ),
        'add_new_item'              => __( 'Add New Class Year', 'hbd-aep' ),
        'new_item_name'             => __( 'New Class Year Name', 'hbd-aep' ),
        'add_or_remove_items'       => __( 'Add or remove Class Years', 'hbd-aep' ),
        'choose_from_most_used'     => __( 'Choose from most used hbd-aep', 'hbd-aep' ),
        'menu_name'                 => __( 'Class Year', 'hbd-aep' ),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical'      => true,
        'show_tagcloud'     => true,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => true,
        'query_var'         => true,
        'capabilities'      => array(),
    );

    register_taxonomy( 'alumni_class', array( 'alumni' ), $args );
}
add_action( 'init', 'alumni_class_taxonomies' );


add_filter('manage_alumni_posts_columns', 'hbd_head_only_alumnis');
add_action('manage_alumni_posts_custom_column', 'hbd_content_only_alumnis', 10, 2);
 
//adding column in the listing of the our mentors
function hbd_head_only_alumnis($defaults) {
    $defaults['featured_image'] = 'Alumni Image';
    return $defaults;
}
function hbd_content_only_alumnis($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_thumbnail_id = get_post_thumbnail_id($post_ID);
        if ($post_thumbnail_id) {
            $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
            echo "<img src='".$post_thumbnail_img[0]."' width='80'/>";
        }
    }
}

// set metaboxes
function hbd_alumnis_metabox_options( $options ) {
    $options[]    = array(
        'id'        => 'alumni_meta',
        'title'     => 'Alumni Others Details',
        'post_type' => 'alumni',
        'context'   => 'normal',
        'priority'  => 'default',
        'sections'  => array(
            array(
                'name'  => 'general',
                //'title' => 'General',
                //'icon'  => 'fa fa-cog',
                'fields' => array(
                    array(
                        'id'        => 'alumni_school',
                        'type'      => 'text',
                        'title'     => 'School Name',
                        'add_title' => 'Student School Name',
                    ),

                    array(
                        'id'                => 'alumni_social_link',
                        'type'              => 'group',
                        'title'             => 'Social Links',
                        'button_title'      => 'Add New',
                        'accordion_title'   => 'Add New Social Link',
                        'fields'            => array(
                            array(
                                'id'        => 'alumni_social_link_url',
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
add_filter( 'cs_metabox_options', 'hbd_alumnis_metabox_options' );