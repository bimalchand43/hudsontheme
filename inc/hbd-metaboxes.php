<?php 
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

// framework options filter example
function extra_cs_framework_options( $metabox ) {

	$metabox = array();

	$metabox[] = array(
		'id'         => '_hbd_home_page_section_id',
		'title'      => esc_html__( 'Shop Page Options', 'theme-text-domain' ),
		'post_type'  => 'page',
		'context'    => 'normal',
		'priority'   => 'default',
		'sections'   => array(
	   /* homepage Slider start*/
                array(
                    'name'  => 'homepage_slider',
                    'title' => 'Home Page Slider',
                    'fields' => array(
                        array(
                            'id'            => 'home_slider_enable',
                            'type'          => 'switcher',
                            'title'         => __('Home Slider Enable'),
                        ),
                        array(
                          'id'              => 'home_sliders',
                          'type'            => 'group',
                          'title'           => 'Home Slider',
                          'button_title'    => 'Add New',
                          'accordion_title' => 'Add New Slider',
                          'fields'          => array(
                            array(
                              'id'    => 'slider_title',
                              'type'  => 'textarea',
                              'title' => 'Title',
                            ),
                            array(
                              'id'    => 'slider_description',
                              'type'  => 'textarea',
                              'title' => 'Description',
                            ),
                            array(
                              'id'    => 'slider_image',
                              'type'  => 'image',
                              'title' => 'Image',
                            ),
                            array(
                                'id'            => 'home_slider_button_enable',
                                'type'          => 'switcher',
                                'title'         => 'Home Slider Button Enable',
                            ),
                            array(
                              'id'    => 'button_text',
                              'type'  => 'text',
                              'title' => 'Button Text',
                              'dependency'    => array('home_slider_button_enable', '==', 'true'),
                            ),
                            array(
                              'id'    => 'button_url',
                              'type'  => 'text',
                              'title' => 'Button URL',
                              'dependency'    => array('home_slider_button_enable', '==', 'true'),
                            ),
                            
                          ),
                          'dependency'    => array('home_slider_enable', '==', 'true'),

                        ),
                    ),
                ),

                /* homepage Slider ends*/
                
                
            /* homepage Store start*/

                array(

                    'name'  => 'homepage_store_section',

                    'title' => 'Store Section',

                    'fields'=> array(
                        array(
                            'id'            => 'homepage_store_enable',
                            'type'          => 'switcher',
                            'title'         => 'Store Enable',
                        ),
                        array(
                            'id'            => 'store_title',
                            'type'          => 'textarea',
                            'title'         => 'Section Title',
                            'dependency'    => array('homepage_store_enable', '==', 'true'),
                        ),
                        array(
                            'id'            => 'store_no_of_cat',
                            'type'          => 'number',
                            'title'         => 'Number of Category',
                            'desc'          => 'For all Please Input -1',
                            'dependency'    => array('homepage_store_enable', '==', 'true'),
                        ),
                        array(
                            'id'            => 'store_no_of_product',
                            'type'          => 'number',
                            'title'         => 'Number of Product per Catefory',
                            'desc'          => 'For all Please Input -1',
                            'dependency'    => array('homepage_store_enable', '==', 'true'),
                        ),
                    ),
                ),

                /* homepage Store ends*/
          
		),
	);
	
	
//============== metabox for Contact Us Page==========
        $metabox[]   = array(

            'id'            => 'hbd_contactus_section',
            'title'         => 'Contact Us Details',
            'post_type'     => 'page',
            'context'       => 'normal',
            'priority'      => 'high',
            'sections'      => array(
                /* Header Section Start */
                array(
                    'name'  => 'header_section',
                    'title' => 'Header',
                    'fields'=> array(
                        array(
                            'id'            => 'title',
                            'type'          => 'textarea',
                            'title'         => 'Header Title',
                        ),
                        array(
                            'id'            => 'content',
                            'type'          => 'wysiwyg',
                            'title'         => 'Header Content',
                        ),
                    ),
                ),

                /* Header Section End */

                /* Contact Details Section Start */

                array(

                    'name'  => 'contact_details_section',

                    'title' => 'Contact Details',

                    'fields'=> array(
                        array(
                            'id'            => 'address',
                            'type'          => 'textarea',
                            'title'         => 'Address',
                        ),
                        array(
                            'id'            => 'phone',
                            'type'          => 'textarea',
                            'title'         => 'Phone',
                        ),
                        array(
                            'id'            => 'email',
                            'type'          => 'textarea',
                            'title'         => 'Email',
                        ),
                        array(
                            'id'            => 'map-address',
                            'type'          => 'textarea',
                            'title'         => 'Map Iframe',
                            'sanitize'      => 'html',
                        ),
                    ),
                ),

                /* Contact Details Section End*/

                /* Form Section Start */

                array(

                    'name'  => 'form_section',

                    'title' => 'Form Details',

                    'fields'=> array(
                        array(
                            'id'            => 'form_title',
                            'type'          => 'textarea',
                            'title'         => 'Form Title',
                        ),
                        array(
                            'id'            => 'form_content',
                            'type'          => 'textarea',
                            'title'         => 'Form Content',
                        ),
                        array(
                            'id'            => 'form_shortcode',
                            'type'          => 'textarea',
                            'title'         => 'Form Shortcode',
                        ),
                    ),
                ),

                /* Form Section End*/
            ),//end section
        );

	return $metabox;
    
}
add_filter( 'cs_metabox_options', 'extra_cs_framework_options' );