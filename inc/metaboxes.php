<?php
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
function rws_common_metabox_section( $post_type )
{
	$common = array(
                'name'   => 'page_banner_section',
                'title'  => ucwords( $post_type ).' Banner',
                'fields' => array(
                    /*array(
                        'type'          => 'notice',
                        'class'         => 'info',
                        'content'       => __( 'Banner Single Image or Banner Slider. Need to enable the option to view the option. When one option is enabled, other option is disabled.' ),
                    ),*/
                    array(
                        'id'            => 'banner_image_enable',
                        'type'          => 'switcher',
                        'title'         => __('Banner Image Enable'),
                        //'dependency'    => array('banner_slider_enable', '!=', 'true'),
                    ),
                    array(
                        'id'            => 'banner_image',
                        'type'          => 'image',
                        'title'         => __('Banner Image'),
                        'dependency'    => array('banner_image_enable', '==', 'true'),
                    ),

                    /*array(
                        'id'            => 'banner_slider_enable',
                        'type'          => 'switcher',
                        'title'         => __('Banner Slider Enable'),
                        'dependency'    => array('banner_image_enable', '!=', 'true'),
                    ),*/
                    // slider repeater groups
                    /*array(
                        'id'                => 'slider_images',
                        'type'              => 'group',
                        'title'             => __('Add Slider Images'),
                        'button_title'      => __('Add Slider Images'),
                        'accordion_title'   => __('Add Slider Details with Image'),
                        'fields'            => array(
                            
                            array(
                                'id'        => 'slider_img',
                                'type'      => 'image',
                                'title'     => __('Slider Image'),
                            ),
                            array(
                                'id'         => 'slider_desc',
                                'type'       => 'textarea',
                                'title'      => __('Slider Description'),
                                'attributes' => array(
                                    'placeholder' => 'Slider Description',
                                ),
                            ),
                            array(
                                'id'         => 'banner_video_enable',
                                'type'       => 'switcher',
                                'title'      => __('Banner Video Enable'),
                            ),
                            array(
                                'type'      => 'notice',
                                'class'     => 'info',
                                'content'   => __( 'Slider Image Will be used as video poster.' ),
                                'dependency' => array('banner_video_enable', '==', 'true'),
                            ),
                            array(
                                'id'         => 'slider_video_webm',
                                'type'       => 'text',
                                'title'      => __('Slider Video webm source'),
                                'dependency' => array('banner_video_enable', '==', 'true'),
                            ),
                            array(
                                'id'         => 'slider_video_mp4',
                                'type'       => 'text',
                                'title'      => __('Slider Video mp4 source'),
                                'dependency' => array('banner_video_enable', '==', 'true'),
                            ),
                            array(
                                'id'        => 'slider_button_enable',
                                'type'      => 'switcher',
                                'title'     => __('Slider Button Enable'),
                            ),
                            array(
                                'id'        => 'slider_button_label',
                                'type'      => 'text',
                                'title'     => __('Slider Button Label'),
                                'dependency' => array('slider_button_enable', '==', 'true'),
                            ),
                            array(
                                'id'        => 'slider_button_url',
                                'type'      => 'text',
                                'title'     => __('Slider Button URL'),
                                'dependency' => array('slider_button_enable', '==', 'true'),
                            ),

                        ),
                        'dependency'      => array('banner_slider_enable', '==', 'true'),
                    ),*/ // end of slider repeater groups

                ),
            );
	
	return $common;
}

function rws_common_meta( $post_type )
{
    if($post_type == 'page' || $post_type == 'post') {
        $options = array(
        	'id'        => 'common_heading',
        	'title'     => 'Common '.ucwords( $post_type ).' Options',
        	'post_type' => $post_type,
        	'context'   => 'normal',
        	'priority'  => 'high',
        	'sections'  => array(
            		rws_common_metabox_section( $post_type ),
        		),
    	);
        $options['sections'][]  = array(
            'id'        => 'rws_page_heading',
            'name'      => 'rws_page_heading',
            'title'     => ucwords( $post_type ).' Heading Block',
            'fields'    => array(
                array(
                    'id'            => 'banner_heading_enable',
                    'type'          => 'switcher',
                    'title'         => __('Banner Image Enable'),
                ),
                array(
                    'id'            => 'rws_page_title',
                    'type'          => 'text',
                    'title'         => ucwords( $post_type ).' Title',
                    'dependency'    => array('banner_heading_enable', '==', 'true'),
                    ),
                array(
                    'id'            => 'rws_page_subtitle',
                    'type'          => 'textarea',
                    'title'         => ucwords( $post_type ).' Subtitle',
                    'dependency'    => array('banner_heading_enable', '==', 'true'),
                    ),
                array(
                    'id'            => 'rws_banner_btn_enable',
                    'type'          => 'switcher',
                    'title'         => 'Banner Button Enable',
                    'dependency'    => array('banner_heading_enable', '==', 'true'),
                ),
                array(
                    'id'            => 'rws_banner_btn_label',
                    'type'          => 'text',
                    'title'         => 'Button Label',
                    'dependency'    => array('rws_banner_btn_enable', '==', 'true'),
                ),
                array(
                    'id'            => 'rws_banner_btn_url',
                    'type'          => 'text',
                    'title'         => 'Button URL',
                    'dependency'    => array('rws_banner_btn_enable', '==', 'true'),
                ),

            )
        ); 
    }

    return $options;
}

/**
 *
 * @return array
 */


function rws_metaboxes()
{

    $options[] = array();

    $options[]      = rws_common_meta ( 'page' );
    $options[]      = rws_common_meta ( 'post' );

    //==============  for homepage starts ========================//
    $options[]   = array(
        'id'            => 'rws_homepage_section',
        'title'         => 'Other Content Homepage',
        'post_type'     => 'page',
        'context'       => 'normal',
        'priority'      => 'high',
        'sections'      => array(
            /* homepage Our Students start*/
            array(
                'name'  => 'homepage_our_student',
                'title' => 'Our Students Section',
                'fields' => array(
                            array(
                                'id'            => 'rws_our_student_enable',
                                'type'          => 'switcher',
                                'title'         => 'Our Student Enable',
                            ),
                            array(
                                'id'            => 'hp_our_students_sec_title',
                                'type'          => 'text',
                                'title'         => 'Section Title',
                                'dependency'    => array('rws_our_student_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'hp_our_students_title',
                                'type'          => 'textarea',
                                'title'         => 'Content Title',
                                /*'attributes'    => array(
                                                    'placeholder' => 'Wrap text with <strong></strong> for some text if required different.',
                                                ),*/
                                'dependency'    => array('rws_our_student_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'hp_our_students_desc',
                                'type'          => 'textarea',
                                'title'         => 'Content Description',
                                'dependency'    => array('rws_our_student_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'hp_our_students_image',
                                'type'          => 'image',
                                'title'         => 'Image',
                                'dependency'    => array('rws_our_student_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'hp_our_students_btn_enable',
                                'type'          => 'switcher',
                                'title'         => 'Read More Button Enable',
                                'dependency'    => array('rws_our_student_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'hp_our_students_btn_label',
                                'type'          => 'text',
                                'title'         => 'Read More Label',
                                'dependency'    => array('hp_our_students_btn_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'hp_our_studentsr_btn_url',
                                'type'          => 'text',
                                'title'         => 'Read More URL',
                                'dependency'    => array('hp_our_students_btn_enable', '==', 'true'),
                            ),
                    )
                ),
            /* homepage Our Students ends*/

            /* homepage Our Impact start*/
            array(
                'name'  => 'homepage_our_impact',
                'title' => 'Our Impact Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_our_impact_enable',
                                'type'          => 'switcher',
                                'title'         => 'Our Impact Enable',
                            ),
                            array(
                                'id'            => 'hp_our_impacts_title',
                                'type'          => 'textarea',
                                'title'         => 'Section Title',
                                /*'attributes'    => array(
                                                    'placeholder' => 'Wrap text with <strong></strong> for some text if required different.',
                                                ),*/
                                'dependency'    => array('rws_our_impact_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'hp_our_impacts_desc',
                                'type'          => 'textarea',
                                'title'         => 'Section Description',
                                'dependency'    => array('rws_our_impact_enable', '==', 'true'),
                                ),
                            array(
                                'id'                => 'hp_our_impacts_list',
                                'type'              => 'group',
                                'title'             => 'Our Impact List',
                                'button_title'      => 'Add New',
                                'accordion_title'   => 'Add New',
                                'fields'            => array(
                                    array(
                                        'id'        => 'hp_our_impacts_title',
                                        'type'      => 'text',
                                        'title'     => 'Title',
                                        ),
                                    array(
                                        'id'        => 'hp_our_impacts_image',
                                        'type'      => 'image',
                                        'title'     => 'Image',
                                        ),
                                    array(
                                        'id'        => 'hp_our_impacts_desc',
                                        'type'      => 'textarea',
                                        'title'     => 'Description',
                                        ),
                                    array(
                                        'id'        => 'hp_our_impacts_link_label',
                                        'type'      => 'text',
                                        'title'     => 'Read More Label',
                                        ),
                                    array(
                                        'id'        => 'hp_our_impacts_link_url',
                                        'type'      => 'text',
                                        'title'     => 'Read More URL',
                                        ),

                                    ), 
                                'dependency'    => array('rws_our_impact_enable', '==', 'true'),
                                ), // end of page section groups
                                
                    )
                ),
            /* homepage Our Impact ends*/

            /* homepage Our Mentor start*/
            array(
                'name'  => 'homepage_our_mentor',
                'title' => 'Our Mentor Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_our_mentor_enable',
                                'type'          => 'switcher',
                                'title'         => 'Our Mentor Enable',
                            ),
                            array(
                                'id'            => 'hp_our_mentors_title',
                                'type'          => 'textarea',
                                'title'         => 'Section Title',
                                /*'attributes'    => array(
                                                    'placeholder' => 'Wrap text with <strong></strong> for some text if required different.',
                                                ),*/
                                'dependency'    => array('rws_our_mentor_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'hp_our_mentors_desc',
                                'type'          => 'textarea',
                                'title'         => 'Section Description',
                                'dependency'    => array('rws_our_mentor_enable', '==', 'true'),
                                ),
                            array(
                                'id'                => 'hp_our_mentors_list',
                                'type'              => 'group',
                                'title'             => 'Our Mentors List',
                                'button_title'      => 'Add New',
                                'accordion_title'   => 'Add New',
                                'fields'            => array(
                                    array(
                                        'id'            => 'hp_our_mentors_list_id',
                                        'type'          => 'select',
                                        'title'         => 'Select Mentor',
                                        'options'       => 'posts',
                                        // query_args is option for all
                                        'query_args'    => array(
                                                    'post_type'   => 'ourmentor',
                                                    'sort_order'  => 'ASC',
                                                    'sort_column' => 'post_title',
                                                  ),
                                    ),

                                ), 
                                'dependency'        => array('rws_our_mentor_enable', '==', 'true'),
                            ), // end of page section groups
                            array(
                                'id'            => 'hp_our_mentors_btn_enable',
                                'type'          => 'switcher',
                                'title'         => 'View All Button Enable',
                                'dependency'    => array('rws_our_mentor_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'hp_our_mentors_btn_label',
                                'type'          => 'text',
                                'title'         => 'Button Label',
                                'dependency'    => array('hp_our_mentors_btn_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'hp_our_mentors_btn_url',
                                'type'          => 'text',
                                'title'         => 'View All URL',
                                'dependency'    => array('hp_our_mentors_btn_enable', '==', 'true'),
                            ),
                    )
                ),
            /* homepage Our Mentor ends*/

            /* homepage Our Investor start*/
            array(
                'name'  => 'homepage_our_investor',
                'title' => 'Our Investor Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_our_investor_enable',
                                'type'          => 'switcher',
                                'title'         => 'Our Investor Enable',
                            ),
                            array(
                                'id'            => 'hp_our_investors_title',
                                'type'          => 'textarea',
                                'title'         => 'Section Title',
                                /*'attributes'    => array(
                                                    'placeholder' => 'Wrap text with <strong></strong> for some text if required different.',
                                                ),*/
                                'dependency'    => array('rws_our_investor_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'hp_our_investors_desc',
                                'type'          => 'textarea',
                                'title'         => 'Section Description',
                                'dependency'    => array('rws_our_investor_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'hp_our_investors_btn_enable',
                                'type'          => 'switcher',
                                'title'         => 'View All Button Enable',
                                'dependency'    => array('rws_our_investor_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'hp_our_investors_btn_label',
                                'type'          => 'text',
                                'title'         => 'Button Label',
                                'dependency'    => array('hp_our_investors_btn_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'hp_our_investors_btn_url',
                                'type'          => 'text',
                                'title'         => 'View All URL',
                                'dependency'    => array('hp_our_investors_btn_enable', '==', 'true'),
                            ),
                            /* list goes here */
                            array(
                                'id'                => 'hp_our_investors_list',
                                'type'              => 'group',
                                'title'             => 'Our Investors List',
                                'button_title'      => 'Add New',
                                'accordion_title'   => 'Add New',
                                'fields'            => array(
                                    array(
                                        'id'        => 'hp_our_investors_list_image',
                                        'type'      => 'image',
                                        'title'     => 'Image',
                                        ),
                                    ), 
                                'dependency'        => array('rws_our_investor_enable', '==', 'true'),
                                ), // end of page section groups

                    )
                ),
            /* homepage Our Investor ends*/


            ),//end section
        );
    //============== metabox for homepage ends =============================/

    //==============  metabox for program page starts =====================/
    $options[]   = array(
        'id'            => 'rws_program_section',
        'title'         => 'Other Content Program',
        'post_type'     => 'page',
        'context'       => 'normal',
        'priority'      => 'high',
        'sections'      => array(
            /* programpage Creating Opportunity start*/
            array(
                'name'  => 'programpage_creating_opportunity',
                'title' => 'Creating Opportunity Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_creating_opportunity_enable',
                                'type'          => 'switcher',
                                'title'         => 'Creating Opportunity Enable',
                            ),
                            array(
                                'id'            => 'pp_creating_opportunity_sec_title',
                                'type'          => 'text',
                                'title'         => 'Section Title',
                                'dependency'    => array('rws_creating_opportunity_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'pp_creating_opportunity_desc',
                                'type'          => 'textarea',
                                'title'         => 'Description',
                                'dependency'    => array('rws_creating_opportunity_enable', '==', 'true'),
                                ),
                    )
                ),
            /* programpage Creating Opportunity ends*/

            /* programpage Our Story start*/
            array(
                'name'  => 'programpage_our_story',
                'title' => 'Our Story Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_our_story_enable',
                                'type'          => 'switcher',
                                'title'         => 'Our Story Enable',
                            ),
                            array(
                                'id'            => 'pp_our_story_title',
                                'type'          => 'text',
                                'title'         => 'Section Title',
                                'dependency'    => array('rws_our_story_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'pp_our_story_desc',
                                'type'          => 'textarea',
                                'title'         => 'Section Description',
                                'dependency'    => array('rws_our_story_enable', '==', 'true'),
                                ),
                            array(
                                'id'                => 'pp_our_story_list',
                                'type'              => 'group',
                                'title'             => 'Our Story List',
                                'button_title'      => 'Add New',
                                'accordion_title'   => 'Add New',
                                'fields'            => array(
                                    array(
                                        'id'        => 'pp_our_story_title',
                                        'type'      => 'text',
                                        'title'     => 'Title',
                                        ),
                                    array(
                                        'id'        => 'pp_our_story_image',
                                        'type'      => 'image',
                                        'title'     => 'Image',
                                        ),
                                    array(
                                        'id'        => 'pp_our_story_desc',
                                        'type'      => 'textarea',
                                        'title'     => 'Description',
                                        ),

                                    ), 
                                'dependency'    => array('rws_our_story_enable', '==', 'true'),
                                ), // end of page section groups
                            array(
                                'id'        => 'pp_our_story_apply_now_enable',
                                'type'      => 'switcher',
                                'title'     => 'Apply Now Enable',
                                'dependency'=> array('rws_our_story_enable', '==', 'true'),
                            ),
                            array(
                                'id'        => 'pp_our_story_link_label',
                                'type'      => 'text',
                                'title'     => 'Apply Now Label',
                                'dependency'=> array('pp_our_story_apply_now_enable', '==', 'true'),
                                ),
                            array(
                                'id'        => 'pp_our_story_link_url',
                                'type'      => 'text',
                                'title'     => 'Apply Now URL',
                                'dependency'=> array('pp_our_story_apply_now_enable', '==', 'true'),
                                ),
                                
                    )
                ),
            /* programpage Our Story ends*/

            /* programpage Our Brand start*/
            array(
                'name'  => 'programpage_our_brand',
                'title' => 'Our Brand Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_our_brand_enable',
                                'type'          => 'switcher',
                                'title'         => 'Our Brand Enable',
                            ),
                            array(
                                'id'            => 'pp_our_brands_title',
                                'type'          => 'text',
                                'title'         => 'Section Title',
                                'dependency'    => array('rws_our_brand_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'pp_our_brands_desc',
                                'type'          => 'textarea',
                                'title'         => 'Section Description',
                                'dependency'    => array('rws_our_brand_enable', '==', 'true'),
                                ),
                            /*array(
                                'id'            => 'pp_our_brands_btn_enable',
                                'type'          => 'switcher',
                                'title'         => 'View All Button Enable',
                                'dependency'    => array('rws_our_brand_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'pp_our_brands_btn_label',
                                'type'          => 'text',
                                'title'         => 'Button Label',
                                'dependency'    => array('pp_our_brands_btn_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'pp_our_brands_btn_url',
                                'type'          => 'text',
                                'title'         => 'View All URL',
                                'dependency'    => array('pp_our_brands_btn_enable', '==', 'true'),
                            ), */
                            /* list goes here */
                            array(
                                'id'                => 'pp_our_brands_list',
                                'type'              => 'group',
                                'title'             => 'Our Brands List',
                                'button_title'      => 'Add New',
                                'accordion_title'   => 'Add New',
                                'fields'            => array(
                                    array(
                                        'id'        => 'pp_our_brands_list_image',
                                        'type'      => 'image',
                                        'title'     => 'Image',
                                        ),
                                    ), 
                                'dependency'        => array('rws_our_brand_enable', '==', 'true'),
                                ), // end of page section groups

                    )
                ),
            /* programpage Our Brand ends*/

            /* programpage Our Culture start*/
            array(
                'name'  => 'programpage_our_culture',
                'title' => 'Our Culture Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_our_culture_enable',
                                'type'          => 'switcher',
                                'title'         => 'Our Culture Enable',
                            ),
                            array(
                                'id'            => 'pp_our_culture_title',
                                'type'          => 'text',
                                'title'         => 'Section Title',
                                'dependency'    => array('rws_our_culture_enable', '==', 'true'),
                                ),
                            /* list goes here */
                            array(
                                'id'                => 'pp_our_culture_list',
                                'type'              => 'group',
                                'title'             => 'Our Culture List',
                                'button_title'      => 'Add New',
                                'accordion_title'   => 'Add New',
                                'fields'            => array(
                                    array(
                                        'id'        => 'pp_our_culture_list_title',
                                        'type'      => 'text',
                                        'title'     => 'Title',
                                        ),
                                    array(
                                        'id'        => 'pp_our_culture_list_image',
                                        'type'      => 'image',
                                        'title'     => 'Image',
                                        ),
                                    array(
                                        'id'        => 'pp_our_culture_list_level',
                                        'type'      => 'text',
                                        'title'     => 'Level',
                                        ),
                                    array(
                                        'id'        => 'pp_our_culture_list_credits',
                                        'type'      => 'text',
                                        'title'     => 'Credits',
                                        ),
                                    array(
                                        'id'        => 'pp_our_culture_list_application_deadline',
                                        'type'      => 'text',
                                        'title'     => 'Application Deadline',
                                        ),
                                    ), 
                                'dependency'        => array('rws_our_culture_enable', '==', 'true'),
                                ), // end of page section groups

                    )
                ),
            /* programpage Our Culture ends*/

            /* programpage About Program start*/
            array(
                'name'  => 'programpage_about_program',
                'title' => 'About Program Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_about_program_enable',
                                'type'          => 'switcher',
                                'title'         => 'About Program Enable',
                            ),
                            array(
                                'id'            => 'pp_about_program_title',
                                'type'          => 'text',
                                'title'         => 'Section Title',
                                'dependency'    => array('rws_about_program_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'pp_about_program_desc',
                                'type'          => 'textarea',
                                'title'         => 'Section Decription',
                                /*'settings'      => array(
                                                    'textarea_rows' => 5,
                                                    'tinymce'       => false,
                                                    'media_buttons' => false,
                                                ),*/
                                'dependency'    => array('rws_about_program_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'pp_about_program_gallery',
                                'type'          => 'wysiwyg',
                                'title'         => 'Gallery Image',
                                'settings'      => array(
                                                    'textarea_rows' => 5,
                                                    'tinymce'       => true,
                                                    'media_buttons' => true,
                                                ),
                                'dependency'    => array('rws_about_program_enable', '==', 'true'),
                            ),
                            /* list goes here */
                            /*array(
                                'id'                => 'pp_about_program_list',
                                'type'              => 'group',
                                'title'             => 'About Program List',
                                'button_title'      => 'Add New',
                                'accordion_title'   => 'Add New',
                                'fields'            => array(
                                    array(
                                        'id'        => 'pp_about_program_list_image',
                                        'type'      => 'image',
                                        'title'     => 'Image',
                                        ),
                                    ), 
                                'dependency'        => array('rws_about_program_enable', '==', 'true'),
                                ),*/ // end of page section groups

                    )
                ),
            /* programpage About Program ends*/


            ),//end section
        );
    //============== metabox for about page ends ==================//
    
    //==============  metabox for contact page starts =====================/
    $options[]   = array(
        'id'            => 'rws_contact_section',
        'title'         => 'Other Content Contact',
        'post_type'     => 'page',
        'context'       => 'normal',
        'priority'      => 'high',
        'sections'      => array(
            /* contactpage Contact Form start*/
            array(
                'name'  => 'contactpage_contact_form',
                'title' => 'Contact Form Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_contact_form_enable',
                                'type'          => 'switcher',
                                'title'         => 'Contact Form Enable',
                            ),
                            array(
                                'id'            => 'cp_contact_form_sec_title',
                                'type'          => 'text',
                                'title'         => 'Section Title',
                                'dependency'    => array('rws_contact_form_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_contact_form_desc',
                                'type'          => 'textarea',
                                'title'         => 'Description',
                                'dependency'    => array('rws_contact_form_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_contact_form_shortcode',
                                'type'          => 'textarea',
                                'title'         => 'Form Shortcode',
                                'desc'          => 'Create a form in Contact Form 7 or Salesforce then use shortcode here.',
                                'dependency'    => array('rws_contact_form_enable', '==', 'true'),
                                ),
                    )
                ),
            /* contactpage Contact Form ends*/

            /* contactpage Quick Contact start*/
            array(
                'name'  => 'contactpage_quick_contact',
                'title' => 'Quick Contact Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_quick_contact_enable',
                                'type'          => 'switcher',
                                'title'         => 'Quick Contact Enable',
                            ),
                            array(
                                'id'            => 'cp_quick_contact_title',
                                'type'          => 'text',
                                'title'         => 'Section Title',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_desc',
                                'type'          => 'textarea',
                                'title'         => 'Section Description',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_email_enable',
                                'type'          => 'switcher',
                                'title'         => 'Quick Contact Email Enable',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'cp_quick_contact_email_title',
                                'type'          => 'text',
                                'title'         => 'Email Title',
                                'dependency'    => array('cp_quick_contact_email_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_email_image',
                                'type'          => 'image',
                                'title'         => 'Email Image',
                                'dependency'    => array('cp_quick_contact_email_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_email_address',
                                'type'          => 'text',
                                'title'         => 'Email Address',
                                'dependency'    => array('cp_quick_contact_email_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_phone_enable',
                                'type'          => 'switcher',
                                'title'         => 'Quick Contact Phone Enable',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'cp_quick_contact_phone_title',
                                'type'          => 'text',
                                'title'         => 'Phone Title',
                                'dependency'    => array('cp_quick_contact_phone_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_phone_image',
                                'type'          => 'image',
                                'title'         => 'Phone Image',
                                'dependency'    => array('cp_quick_contact_phone_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_phone_no',
                                'type'          => 'text',
                                'title'         => 'Phone Number',
                                'dependency'    => array('cp_quick_contact_phone_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_follow_us_enable',
                                'type'          => 'switcher',
                                'title'         => 'Quick Contact Follow Us Enable',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'cp_quick_contact_follow_us_title',
                                'type'          => 'text',
                                'title'         => 'Follow Us Title',
                                'dependency'    => array('cp_quick_contact_follow_us_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_follow_us_image',
                                'type'          => 'image',
                                'title'         => 'Follow Us Image',
                                'dependency'    => array('cp_quick_contact_follow_us_enable', '==', 'true'),
                                ),
                            array(
                                'id'                => 'cp_quick_contact_follow_us_link',
                                'type'              => 'group',
                                'title'             => 'Quick Contact Follow List',
                                'button_title'      => 'Add New',
                                'accordion_title'   => 'Add New',
                                'fields'            => array(
                                    array(
                                        'id'        => 'cp_quick_contact_follow_url',
                                        'type'      => 'text',
                                        'title'     => 'Link URL',
                                        ),

                                    ), 
                                'dependency'    => array('cp_quick_contact_follow_us_enable', '==', 'true'),
                                ), // end of page section groups
                            array(
                                'id'            => 'cp_quick_contact_mailing_address_enable',
                                'type'          => 'switcher',
                                'title'         => 'Quick Contact Mailing Address Enable',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'cp_quick_contact_mailing_address_title',
                                'type'          => 'text',
                                'title'         => 'Mailing Address Title',
                                'dependency'    => array('cp_quick_contact_mailing_address_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_mailing_address_image',
                                'type'          => 'image',
                                'title'         => 'Mailing Address Image',
                                'dependency'    => array('cp_quick_contact_mailing_address_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_mailing_address_desc',
                                'type'          => 'textarea',
                                'title'         => 'Mailing Address Detail',
                                'dependency'    => array('cp_quick_contact_mailing_address_enable', '==', 'true'),
                                ),
                            

                    )
                ),
            /* contactpage Quick Contact ends*/

            ),//end section
        );
    //============== metabox for contact page ends ==================//

     //==============  metabox for board member post type starts =====================/
    $options[]   = array(
        'id'            => 'rws_board_member_section',
        'title'         => 'Other Content Contact',
        'post_type'     => 'page',
        'context'       => 'normal',
        'priority'      => 'high',
        'sections'      => array(
            /* contactpage Contact Form start*/
            array(
                'name'  => 'contactpage_contact_form',
                'title' => 'Contact Form Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_contact_form_enable',
                                'type'          => 'switcher',
                                'title'         => 'Contact Form Enable',
                            ),
                            array(
                                'id'            => 'cp_contact_form_sec_title',
                                'type'          => 'text',
                                'title'         => 'Section Title',
                                'dependency'    => array('rws_contact_form_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_contact_form_desc',
                                'type'          => 'textarea',
                                'title'         => 'Description',
                                'dependency'    => array('rws_contact_form_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_contact_form_shortcode',
                                'type'          => 'textarea',
                                'title'         => 'Form Shortcode',
                                'desc'          => 'Create a form in Contact Form 7 or Salesforce then use shortcode here.',
                                'dependency'    => array('rws_contact_form_enable', '==', 'true'),
                                ),
                    )
                ),
            /* contactpage Contact Form ends*/

            /* contactpage Quick Contact start*/
            array(
                'name'  => 'contactpage_quick_contact',
                'title' => 'Quick Contact Section',
                'fields'=> array(
                            array(
                                'id'            => 'rws_quick_contact_enable',
                                'type'          => 'switcher',
                                'title'         => 'Quick Contact Enable',
                            ),
                            array(
                                'id'            => 'cp_quick_contact_title',
                                'type'          => 'text',
                                'title'         => 'Section Title',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_desc',
                                'type'          => 'textarea',
                                'title'         => 'Section Description',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_email_enable',
                                'type'          => 'switcher',
                                'title'         => 'Quick Contact Email Enable',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'cp_quick_contact_email_title',
                                'type'          => 'text',
                                'title'         => 'Email Title',
                                'dependency'    => array('cp_quick_contact_email_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_email_image',
                                'type'          => 'image',
                                'title'         => 'Email Image',
                                'dependency'    => array('cp_quick_contact_email_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_email_address',
                                'type'          => 'text',
                                'title'         => 'Email Address',
                                'dependency'    => array('cp_quick_contact_email_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_phone_enable',
                                'type'          => 'switcher',
                                'title'         => 'Quick Contact Phone Enable',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'cp_quick_contact_phone_title',
                                'type'          => 'text',
                                'title'         => 'Phone Title',
                                'dependency'    => array('cp_quick_contact_phone_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_phone_image',
                                'type'          => 'image',
                                'title'         => 'Phone Image',
                                'dependency'    => array('cp_quick_contact_phone_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_phone_no',
                                'type'          => 'text',
                                'title'         => 'Phone Number',
                                'dependency'    => array('cp_quick_contact_phone_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_follow_us_enable',
                                'type'          => 'switcher',
                                'title'         => 'Quick Contact Follow Us Enable',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'cp_quick_contact_follow_us_title',
                                'type'          => 'text',
                                'title'         => 'Follow Us Title',
                                'dependency'    => array('cp_quick_contact_follow_us_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_follow_us_image',
                                'type'          => 'image',
                                'title'         => 'Follow Us Image',
                                'dependency'    => array('cp_quick_contact_follow_us_enable', '==', 'true'),
                                ),
                            array(
                                'id'                => 'cp_quick_contact_follow_us_link',
                                'type'              => 'group',
                                'title'             => 'Quick Contact Follow List',
                                'button_title'      => 'Add New',
                                'accordion_title'   => 'Add New',
                                'fields'            => array(
                                    array(
                                        'id'        => 'cp_quick_contact_follow_url',
                                        'type'      => 'text',
                                        'title'     => 'Link URL',
                                        ),

                                    ), 
                                'dependency'    => array('cp_quick_contact_follow_us_enable', '==', 'true'),
                                ), // end of page section groups
                            array(
                                'id'            => 'cp_quick_contact_mailing_address_enable',
                                'type'          => 'switcher',
                                'title'         => 'Quick Contact Mailing Address Enable',
                                'dependency'    => array('rws_quick_contact_enable', '==', 'true'),
                            ),
                            array(
                                'id'            => 'cp_quick_contact_mailing_address_title',
                                'type'          => 'text',
                                'title'         => 'Mailing Address Title',
                                'dependency'    => array('cp_quick_contact_mailing_address_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_mailing_address_image',
                                'type'          => 'image',
                                'title'         => 'Mailing Address Image',
                                'dependency'    => array('cp_quick_contact_mailing_address_enable', '==', 'true'),
                                ),
                            array(
                                'id'            => 'cp_quick_contact_mailing_address_desc',
                                'type'          => 'textarea',
                                'title'         => 'Mailing Address Detail',
                                'dependency'    => array('cp_quick_contact_mailing_address_enable', '==', 'true'),
                                ),
                            

                    )
                ),
            /* contactpage Quick Contact ends*/

            ),//end section
        );
    //============== metabox for board member post type ends ==================//
    
    return $options;
}

add_action('cs_metabox_options', 'rws_metaboxes');