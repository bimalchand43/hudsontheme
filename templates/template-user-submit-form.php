<?php
/**
 Template Name: Form For User
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
 if( ! is_user_logged_in() ) {
    wp_safe_redirect( esc_url( site_url() ), 302 );
    # redirect code goes here if accessed directly.
}
$current_user = wp_get_current_user();

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<h1 class="headingform">User Form</h1>
			<div class="msg"></div>
			<form  class="userform">
				<p>Name</p>
				<input type="text" id="username" />
				<p>Email</p>
				<input type="email" id="useremail" />
				<p>Option</p>
				<select name="" id="useroption">
					<option value="Option One">Option One</option>
					<option value="Option Two">Option Two</option>
					<option value="Option Two">Option Three</option>
				</select>
				<textarea name="" id="usercontent" cols="30" rows="10"></textarea>
				<input type="hidden" name="user_id" id="user_id" value="<?php echo $current_user->id; ?>" />
				<input  id="usersubmit"type="submit" Value="Submit" />
			</form>
		
		
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php
get_footer();
