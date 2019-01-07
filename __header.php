<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <?php wp_head();?>
</head>
<body <?php body_class();?> >
<?php global $hbd_options; ?>
<div class="loader"></div>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header header"  role="banner">
		<?php 
			$top_header_menu_list = $hbd_options['top_header_menu_list'];
			if( !empty( $top_header_menu_list )):
		?>
			<div class="top-menu-toggle_bar_wrapper">
				<div class="top-menu-toggle_trigger">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			
			<div class="top-header">
			    <div class="container">
			        <div class="topbar-menu">
			            <ul>
			            	<?php foreach ( $top_header_menu_list as $key => $value) : 
			            		$top_menu_title	= $value['top_header_menu_list_title'];
					            $top_menu_link	= $value['top_header_menu_list_link'];
					            $top_menu_icon	= $value['top_header_menu_list_icon'];
			            	?>
				                <li>
				                	<a href="<?php echo $top_menu_link; ?>">
				                		<?php if( !empty( $top_menu_icon ) ): ?>
				                			<i class="<?php echo $top_menu_icon; ?>"></i>
			                			<?php endif; 
			                			echo $top_menu_title;
			                			?>
		                			</a>
				                </li>			            		
			            	<?php endforeach; ?>
			            </ul>
			        </div>
			    </div>
			</div>
		<?php endif; ?>
		<div class="container">
		    <div class="hgroup-wrap">
		        <div class="site-branding">
		            <?php 
		                $site_logo_id   = get_theme_mod( 'custom_logo' );
		                $site_logo_url	= hbd_image_src ( array ( 'id' => $site_logo_id, 'size' => 'full' ) );
		            ?>
		            <a href="<?php echo home_url(); ?>">
		                <?php if($site_logo_id) { ?>
		                    <img src="<?php echo esc_url( $site_logo_url );?>" alt="<?php echo get_bloginfo('name');?>" title="<?php echo get_bloginfo('name');?>" >
		                <?php } else {
		                    echo '<h1>'.get_bloginfo('name').'</h1>';
		                } ?>
		            </a>
		        </div><!-- .site-branding -->
		        <div class="hgroup-right">
		            <nav class="main-navigation">
	                	<?php 
						   /**
							* Displays a navigation menu
							* @param array $args Arguments
							*/
						if( has_nav_menu( 'primary' )):
							$args = array(
								'theme_location' => 'primary',
								'menu' => '',
								'container' => '',
								'container_class' => '',
								'container_id' => '',
								'menu_class' => '',
								'menu_id' => '',
								'echo' => true,
								'fallback_cb' => '',
								'before' => '',
								'after' => '',
								//'link_before' => '<div>',
								//'link_after' => '</div>',
								'items_wrap' => '<ul>%3$s</ul>',
								'depth' => 0,
								'walker' => ''
							);						
							wp_nav_menu( $args );
						endif;
						?>
		            </nav><!-- .main-navigation -->
		        </div>
		    </div>
		</div><!-- .container -->
	    <?php
	    	//banner hook : check in hook-functions.php
	    	if( is_page() ) {
	    		do_action ( 'hbd_banner' ) ;
	    	}
    	?>
	</header><!-- #masthead -->
    
    <!-- //fetch value of cs as $hbd_options['name_here']; -->