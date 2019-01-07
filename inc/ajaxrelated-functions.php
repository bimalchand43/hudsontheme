<?php
function cots_redict_user_if_access_bypagination_url(){
	$full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if(strchr($full_url, '/page/')){
		if(get_option('page_for_posts')){
			wp_redirect( esc_url(get_permalink(get_option('page_for_posts'))), 301 );
			exit();
			
		}else{
			wp_redirect( esc_url( home_url( ) ), 301 );
			exit();
			
		}
		
		
	}
	
	
	
	
}
add_action('template_redirect', 'cots_redict_user_if_access_bypagination_url');


function cots_ajaload_function (){
	$page = $_POST['page'] + 1;
	$post_per_page = $_POST['postpage'];
// the query
$the_query = new WP_Query( array(
	'post_type'=>'student',
	'paged' => $page,
    'posts_per_page' => $post_per_page
) ); 

 if ( $the_query->have_posts() ) :

	
	while ( $the_query->have_posts() ) : $the_query->the_post(); 
	$backgroundImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
	set_query_var( 'newpost', 'newpost' ); ?>
		<div class="col-sm-4 <?php echo  $get_post_class; ?>">
            <div class="student-content">
                <div class="studen-img"><img src="<?php echo $backgroundImage; ?>" /></div>
                <div class="student-title"><h2><?php the_title(); ?></h2></div>
                <div class="student-desc"><?php the_excerpt(); ?></div>
            </div>
        </div>
        <?php
	endwhile;
	
endif;
	 wp_reset_postdata();

die();	
}
add_action('wp_ajax_ajax_load_post_action', 'cots_ajaload_function');
add_action('wp_ajax_nopriv_ajax_load_post_action', 'cots_ajaload_function');