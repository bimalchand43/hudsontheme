jQuery(document).ready(function() {
  jQuery('#page_template').change(function() {
    //jQuery('#common_heading').hide();
    jQuery('#hbd_homepage_section').hide();
    jQuery('#hbd_program_section').hide();
    jQuery('#_hbd_contactus_section').hide();
    jQuery('#_hbd_home_page_section_id').hide();

    console.log('everythings will be ok');
    switch (jQuery(this).val()) {
      case 'templates/template-homepage.php':
      //jQuery('#common_heading').show();
      jQuery('#hbd_homepage_section').show();      
      break;

      case 'templates/template-programs.php':
      jQuery('#hbd_program_section').show();      
      break;

      case 'templates/template-contact.php':
      jQuery('#_hbd_contactus_section').show();      
      break;
      
      case 'templates/test-home.php':
      jQuery('#_hbd_home_page_section_id').show();
      break;


      default:
      jQuery('#notice_section').show();
      break;
    }
  }).change();

});