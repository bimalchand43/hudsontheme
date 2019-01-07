<?php 
/*
Template Name: Registration Template
*/
get_header();

global $wpdb;

if ($_POST) {

    $username = $wpdb->escape($_POST['txtUsername']);
    $email = $wpdb->escape($_POST['txtEmail']);
    $password = $wpdb->escape($_POST['txtPassword']);
    $ConfPassword = $wpdb->escape($_POST['txtConfirmPassword']);

    $error = array();
    if (strpos($username, ' ') !== FALSE) {
        $error['username_space'] = "Username has Space";
    }

    if (empty($username)) {
        $error['username_empty'] = "Needed Username must";
    }

    if (username_exists($username)) {
        $error['username_exists'] = "Username already exists";
    }

    if (!is_email($email)) {
        $error['email_valid'] = "Email has no valid value";
    }

    if (email_exists($email)) {
        $error['email_existence'] = "Email already exists";
    }

    if (strcmp($password, $ConfPassword) !== 0) {
        $error['password'] = "Password didn't match";
    }

    if (count($error) == 0) {

        wp_create_user($username, $password, $email);
        echo "User Created Successfully";
        exit();
    }else{
        
        print_r($error);
        
    }
}

?>

<div id="registration-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="registration-form">
                    <form method="post">
                        <p>
                            <label for="txtUsername">Enter Username</label>
                            <input type="text" name="txtUsername" id="txtUsername" />
                        </p>
                        <p>
                            <label for="txtEmail">Enter Email</label>
                            <input type="email" name="txtEmail" id="txtEmail" />
                        </p>
                        <p>
                            <label for="txtPassword">Enter Password</label>
                            <input type="password" name="txtPassword" id="txtPassword" />
                        </p>
                        <p>
                            <label for="txtConfirmPassword">Enter Confirm Password</label>
                            <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" />
                        </p>
                        <p>
                            <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
                        </p>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();