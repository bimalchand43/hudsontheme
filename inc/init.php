<?php
if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
//require cs-framework
require_once(get_template_directory().'/inc/cs-framework/cs-framework.php');
// theme options controls
require_once(get_template_directory().'/inc/theme-options.php'); 
// metaboxes controls
//require_once(get_template_directory().'/inc/metaboxes.php');
require_once(get_template_directory().'/inc/hbd-metaboxes.php');
// shortcodes
require_once(get_template_directory().'/inc/shortcodes.php');

// template functions
require_once(get_template_directory().'/inc/template-functions.php'); 
require_once(get_template_directory().'/inc/ajaxrelated-functions.php'); 
// hooks
require_once(get_template_directory().'/inc/hook-functions.php');

// hbd custom post type
require_once(get_template_directory().'/inc/ourteam-cpt.php');
require_once(get_template_directory().'/inc/board-member-cpt.php');
require_once(get_template_directory().'/inc/alumni-cpt.php');
require_once(get_template_directory().'/inc/students-cpt.php');
require_once(get_template_directory().'/inc/core-metaboxes.php');


add_action('cs_customize_options','hbd_disable_customizer_cs_defaults');
//used to add customizer fields from cs framework.
function hbd_disable_customizer_cs_defaults(){
	$options 	= array(); // for removing customizer defaults by cs framework	
	return $options;
}