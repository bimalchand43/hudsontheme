<?php
if ( ! defined('ABSPATH')) {die;}
// Cannot access pages directly.

/**
 * initializing the theme options array
 * @return array
 */
function hbd_framework_options()
{
// ==================================================================================
// FRAMEWORK SETTINGS
// ==================================================================================

    $settings           = array(
        'menu_title'      => 'Theme Options',
        //'menu_type'       => 'add_theme_page', old version of codestar
        'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
        'menu_slug'       => 'hbd-framework',
        'ajax_save'       => true,
        'show_reset_all'  => false,
        'framework_title' => 'HBD Framework <small>by hudson brauntz</small>',
    );
// ===================================================================================
// FRAMEWORK OPTIONS
// ===================================================================================
    $options = array();

    // ------------------------------
    // a option section with tabs   -
    // ------------------------------
    $options[]      = array(
      'name'        => 'general-options',
      'title'       => 'General',
      'icon'        => 'fa fa-cog',

      // begin: fields
      'fields'      => array(
        array(
            'id'        => 'notice',
            'type'      => 'subheading',
            'content'   => __( 'General Theme Options', 'hbd-aep'),

        ),

        array(
            'type'      => 'notice',
            'class'     => 'info',
            'content'   => __( 'Goto Appearance > Customize > Site Identity > Logo for site logo and Site Icon to add the Favicon.' ),

        ),

        array(
          'id'         => 'site_copyright',
          'type'       => 'textarea',
          'title'      => 'Copyright',
          'attributes' => array(
            'style'    => 'width: 100%;'
          ),
          'sanitize'   => 'html',
        ),

      ), // end: fields
    );

    $options[]   = array(
          'name'      => 'top_header_menu',
          'title'     => 'Top Header Menu',
          'icon'      => 'fa fa-align-justify',
          // begin: fields
          'fields'    => array(
                array(
                    'type'      => 'notice',
                    'class'     => 'info',
                    'content'   => 'Header Top Menu with Icon.',
                ),
                array(
                    'id'                => 'top_header_menu_list',
                    'type'              => 'group',
                    'title'             => 'Add Menu',
                    'button_title'      => 'Add New',
                    'accordion_title'   => 'Add New',
                    'fields'            => array(
                        array(
                            'id'    => 'top_header_menu_list_title',
                            'type'  => 'text',
                            'title' => 'Link Label',
                            ),
                        array(
                            'id'    => 'top_header_menu_list_link',
                            'type'  => 'text',
                            'title' => 'Link URL',
                            ),
                        array(
                            'id'    => 'top_header_menu_list_icon',
                            'type'  => 'icon',
                            'title' => 'Icon',
                            //'desc'  => 'Fontawesome icon class as fa-home',
                            'default' => 'fa fa-heart',
                            ),

                        ), 
                    ), // end about page management groups 
    
          ), // end: fields
        ); // end: text options

    $options[]      = array(
      'name'        => 'call-to-section',
      'title'       => 'Call To Action',
      'icon'        => 'fa fa-cog',

      // begin: fields
      'fields'      => array(
        /*array(
            'id'        => 'notice',
            'type'      => 'subheading',
            'content'   => __( 'General Theme Options', 'hbd-aep'),

        ),

        array(
            'type'      => 'notice',
            'class'     => 'info',
            'content'   => __( 'Goto Appearance > Customize > Site Identity > Logo for site logo and Site Icon to add the Favicon.' ),

        ),

        array(
          'id'         => 'site_copyright',
          'type'       => 'text',
          'title'      => 'Copyright',
          'attributes' => array(
            'style'    => 'width: 100%;'
          ),      
        ),*/

        array(
            'type'      => 'notice',
            'class'     => 'info',
            'content'   => __( 'Call to Action Section.' ),

        ),
       /* array(
            'id'        => 'hp_newsletter_section_bg_img',
            'type'      => 'image',
            'title'     => 'Section Background Image',
        ),*/
        array(
            'id'        => 'cta_section_title',
            'type'      => 'text',
            'title'     => 'Section Title',
            ),
        array(
            'id'        => 'cta_section_apply_enable',
            'type'      => 'switcher',
            'title'     => 'Apply Button Enable',
        ),
        array(
            'id'        => 'cta_section_apply_label',
            'type'      => 'text',
            'title'     => 'Apply Button Label',
            'dependency'=> array('cta_section_apply_enable', '==', 'true'),
            ),
        array(
            'id'        => 'cta_section_apply_link',
            'type'      => 'text',
            'title'     => 'Apply URL',
            'dependency'=> array('cta_section_apply_enable', '==', 'true'),
            ),
        array(
            'id'        => 'cta_section_donate_enable',
            'type'      => 'switcher',
            'title'     => 'Apply Button Enable',
        ),
        array(
            'id'        => 'cta_section_donate_label',
            'type'      => 'text',
            'title'     => 'Donate Button Label',
            'dependency'=> array('cta_section_donate_enable', '==', 'true'),
            ),
        array(
            'id'        => 'cta_section_donate_link',
            'type'      => 'text',
            'title'     => 'Apply URL',
            'dependency'=> array('cta_section_donate_enable', '==', 'true'),
            ),
        /*array(
            'id'        => 'hp_newsletter_section_content',
            'type'      => 'textarea',
            'title'     => 'Section Content',
            'desc'      => 'Here we can insert shortcode or other content',
        ),*/

      ), // end: fields
    );

    $options[]      = array(
      'name'        => 'site-custom-styling',
      'title'       => 'Custom Styling',
      'icon'        => 'fa fa-paint-brush',

      // begin: fields
      'fields'      => array(
        array(
            'type'      => 'notice',
            'class'     => 'info',
            'content'   => __( 'Site Custom Styling.' ),

        ),
        array(
            'id'        => 'site_title_bg_color',
            'type'      => 'color_picker',
            'title'     => 'Title Background Color',
            'default'   => '#ffbc00',
            'rgba'      => true,
        ),
        array(
            'id'        => 'site_title_text_color',
            'type'      => 'color_picker',
            'title'     => 'Text Color',
            'default'   => '#fff',
            'rgba'      => true,
        ),

      ), // end: fields
    );

    /*$options[]      = array(
      'name'        => 'footer',
      'title'       => 'Footer',
      'icon'        => 'fa fa-th',

      // begin: fields
      'fields'      => array(

        array(
          'id'              => 'footer_widgets',
          'type'            => 'group',
          'title'           => 'Footer Widgets',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Link',
          'fields'          => array(

            array(
              'id'          => 'widget_col_name',
              'type'        => 'text',
              'title'       => 'Widget Name',
            ),        

            array(
              'id'          => 'widget_col_content',
              'type'        => 'textarea',
              'title'       => 'Widget Content',
            ),
            array(
              'id'          => 'widget_col_class',
              'type'        => 'text',
              'title'       => 'Widget Class',
            ),

          ),
          'default'                     => array(
            array(
              'widget_col_name'            => 'Column 1',         
             
            ),
            array(
              'widget_col_name'            => 'Column 2',
             
            ),
          )
        ),

        

      ), // end: fields
    );*/


// ------------------------------

    return $options;
}

add_action('cs_framework_options', 'hbd_framework_options');