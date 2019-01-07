<?php 
/*
Template Name: Update User Information Template
*/

if( ! is_user_logged_in() ) {
    wp_safe_redirect( esc_url( site_url() ), 302 );
    # redirect code goes here if accessed directly.
}

get_header();


$current_user = wp_get_current_user();

$user_id = $current_user->ID;


if ($_POST) {

    $update_data = array();

    $update_data['first_name'] = sanitize_text_field( $_POST['txtFirstname'] );
    $update_data['last_name'] = sanitize_text_field( $_POST['txtLastname'] );
    $update_data['user_pass'] = sanitize_text_field( $_POST['txtChangePassword'] );
    

    $update_data['ID'] = $user_id;

    $id = wp_update_user( $update_data );

    if( ! is_wp_error( $id ) ) {
      echo 'succesfully updated';
    } else {
        echo $id->get_error_message();
    }
}

?>
<form method="post">
  <p>
    <label for="txtFirstname">First Name</label>
    <input type="text" id="txtFirstname" name="txtFirstname" value="<?php echo $current_user->user_firstname; ?>">
  </p>
  <p>
    <label for="txtLastname">Last Name</label>
    <input type="text" id="txtLastname" name="txtLastname" value="<?php echo $current_user->user_lastname; ?>">
  </p>
  <p>
    <label for="txtChangePassword">Password</label>
    <input type="password" id="txtChangePassword" name="txtChangePassword" value="<?php echo $current_user->user_pass; ?>">
  </p>
  <p>
    <input type="submit" id="btnSubmit" name="btnSubmit" value="Update" />
  </p>
</form>



<?php get_footer();