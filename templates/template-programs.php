<?php 
/*
Template Name: Programs Template
*/
get_header();
global $hbd_options;
$programpage_meta			= get_post_meta( get_the_id (), 'hbd_program_section', true );

$hbd_creating_opportunity_enable	= $programpage_meta['hbd_creating_opportunity_enable'];
$pp_creating_opportunity_sec_title 	= $programpage_meta['pp_creating_opportunity_sec_title'];
$pp_creating_opportunity_desc 		= $programpage_meta['pp_creating_opportunity_desc'];

$hbd_our_story_enable 				= $programpage_meta['hbd_our_story_enable'];
$pp_our_story_title 				= $programpage_meta['pp_our_story_title'];
$pp_our_story_desc 					= $programpage_meta['pp_our_story_desc'];
$pp_our_story_list 					= $programpage_meta['pp_our_story_list'];
$pp_our_story_apply_now_enable 		= $programpage_meta['pp_our_story_apply_now_enable'];
$pp_our_story_link_label 			= $programpage_meta['pp_our_story_link_label'];
$pp_our_story_link_url	 			= $programpage_meta['pp_our_story_link_url'];

$hbd_our_brand_enable 				= $programpage_meta['hbd_our_brand_enable'];
$pp_our_brands_title 				= $programpage_meta['pp_our_brands_title'];
$pp_our_brands_desc 				= $programpage_meta['pp_our_brands_desc'];
$pp_our_brands_list 				= $programpage_meta['pp_our_brands_list'];

$hbd_our_culture_enable 			= $programpage_meta['hbd_our_culture_enable'];
$pp_our_culture_title 				= $programpage_meta['pp_our_culture_title'];
$pp_our_culture_list 				= $programpage_meta['pp_our_culture_list'];

$hbd_about_program_enable 			= $programpage_meta['hbd_about_program_enable'];
$pp_about_program_title 			= $programpage_meta['pp_about_program_title'];
$pp_about_program_desc 				= $programpage_meta['pp_about_program_desc'];
$pp_about_program_gallery			= $programpage_meta['pp_about_program_gallery'];

?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        	<!-- start creating opportunity -->
        	<?php if( 1 == $hbd_creating_opportunity_enable ): ?>
        		<section class="opportunity-section">
        		    <div class="container">
        		        <div class="opportunity-content">
        		            <header class="entry-header heading">
        		                <h2 class="entry-title"><?php echo ($pp_creating_opportunity_sec_title) ? $pp_creating_opportunity_sec_title : 'Creating Opportunity'; ?></h2>
        		            </header>
        		            <article class="entry-content">
        		                <?php echo wpautop( $pp_creating_opportunity_desc );?>
        		            </article>
        		        </div>
        		    </div>
        		</section>
        	<?php endif;?>
        	<!-- ends creating opportunity -->

        	<!-- Starts Our Story -->
        	<?php if( 1 == $hbd_our_story_enable ): ?>
        		<section class="story-section">
        		    <div class="container">
        		        <header class="entry-header heading">
        		            <h2 class="entry-title"><?php echo ($pp_our_story_title) ? $pp_our_story_title : 'Our Story';?></h2>
        		        </header>
        		        <div class="section-info">
        		            <?php echo wpautop( $pp_our_story_desc );?>
        		        </div>
        		        <?php if( !empty( $pp_our_story_list )): ?>
	        		        <div class="story-item-wrapper">
	        		        	<?php foreach ( $pp_our_story_list as $key => $value ):
	        		        		$pp_our_story_title 	= $value['pp_our_story_title'];
	        		        		$pp_our_story_image_id 	= $value['pp_our_story_image'];
	        		        		$pp_our_story_desc 		=  $value['pp_our_story_desc'];
	        		        		$pp_our_story_img_src 	= hbd_image_src ( array ( 'id' => $pp_our_story_image_id, 'size' => 'thumbnail' ) );
	        		        	?>
		        		            <div class="story-item">
		        		                <figure class="story-image">
		        		                    <img src="<?php echo $pp_our_story_img_src; ?>" alt="">
		        		                </figure>
		        		                <h3 class="entry-title">
		        		                    <a href="#"><?php echo $pp_our_story_title; ?></a>
		        		                </h3>
		        		                <article class="entry-conetnt">
		        		                    <?php echo wpautop( $pp_our_story_desc );?>
		        		                </article>
		        		            </div>
        		        		<?php endforeach; ?>

	        		        </div>
        		        <?php endif; ?>
        		        <?php if( 1 == $pp_our_story_apply_now_enable ): ?>
        		        	<a href="<?php echo $pp_our_story_link_url; ?>" class="box-button"><?php echo ($pp_our_story_link_label) ? $pp_our_story_link_label : 'apply now'; ?></a>
    		        	<?php endif; ?>
        		    </div>
        		</section>
        	<?php endif; ?>
        	<!-- Ends Our Story -->

        	<!-- Starts Our Brand -->
        	<?php if( 1 == $hbd_our_brand_enable ): ?>
        		<section class="brand-section">
        		    <div class="container">
        		        <header class="entry-header heading">
        		            <h2 class="entry-title"><?php echo ($pp_our_brands_title) ? $pp_our_brands_title : 'Our brand'; ?></h2>
        		        </header>
        		        <div class="section-info">
        		            <?php echo wpautop( $pp_our_brands_desc );?>
        		        </div>
        		        <?php if( !empty( $pp_our_brands_list )): ?>
	        		        <div class="brand-content-wrapper">
	        		        	<?php foreach ($pp_our_brands_list as $key => $value):
        		        		  	$brands_image_id  = $value['pp_our_brands_list_image'];
                                	$brands_image_src = hbd_image_src ( array ( 'id' => $brands_image_id, 'size' => 'investor-slides' ) );
	        		        	?>
		        		            <div class="brand-item">
		        		                <a href="#">
		        		                    <img src="<?php echo $brands_image_src; ?>" alt="">
		        		                </a>
		        		            </div>	        		        		
        		        		<?php endforeach; ?>
	        		        </div>
        		        <?php endif; ?>
        		    </div>
        		</section>
        	<?php endif; ?>
        	<!-- Ends Our Brand -->

        	<!-- Starts Our Culture -->
        	<?php if( 1 == $hbd_our_culture_enable ): ?>
        		<section class="culture-section">
        		    <div class="container">
        		        <header class="entry-header heading">
        		            <h2 class="entry-title"><?php echo ($pp_our_culture_title) ? $pp_our_culture_title : 'Our Culture' ;?></h2>
        		        </header>
        		        <?php if( !empty( $pp_our_culture_list )): ?>
	        		        <div class="row post-wrapper">
	        		        	<?php foreach ($pp_our_culture_list as $key => $value): 
	        		        		$pp_our_culture_list_title	= $value['pp_our_culture_list_title'];
	        		        		$pp_our_culture_list_img_id	= $value['pp_our_culture_list_image'];
	        		        		$pp_our_culture_list_level 	= $value['pp_our_culture_list_level'];
	        		        		$pp_our_culture_list_credits= $value['pp_our_culture_list_credits'];
	        		        		$pp_our_culture_list_application_deadline= $value['pp_our_culture_list_application_deadline'];
	        		        		$pp_our_culture_image_src 	= hbd_image_src ( array ( 'id' => $pp_our_culture_list_img_id, 'size' => 'our-culture' ) );
	        		        	?>
		        		            <div class="col-sm-4">
		        		                <div class="post">
		        		                	<?php if( !empty( $pp_our_culture_list_img_id )): ?>
			        		                    <figure class="featured-image">
			        		                        <img src="<?php echo $pp_our_culture_image_src; ?>" alt="<?php echo $pp_our_culture_list_title; ?>">
			        		                    </figure>
		        		                    <?php endif;?>
		        		                    <h2 class="entry-title"><a href="#"><?php echo $pp_our_culture_list_title; ?></a></h2>
		        		                    <div class="post-information">
		        		                        <ul>
		        		                        	<?php if( !empty( $pp_our_culture_list_level )): ?>
		        		                            	<li><span class="post-detail-title">Level:</span> <?php echo $pp_our_culture_list_level; ?></li>
	        		                            	<?php endif; ?>
		        		                        	<?php if( !empty( $pp_our_culture_list_credits )): ?>
		        		                            	<li><span class="post-detail-title">Credits:</span><?php echo $pp_our_culture_list_credits; ?> </li>
	        		                            	<?php endif; ?>
		        		                        	<?php if( !empty( $pp_our_culture_list_application_deadline )): ?>
		        		                            	<li><span class="post-detail-title">Application Deadline:</span>  <?php echo $pp_our_culture_list_application_deadline?></li>
	        		                            	<?php endif; ?>
		        		                        </ul>
		        		                    </div>
		        		                </div>
		        		            </div>	        		        	
	        		        	<?php endforeach; ?>

	        		        </div>
        		    	<?php endif; ?>
        		    </div>
        		</section>
        	<?php endif; ?>
        	<!-- Ends Our Culture -->

        	<!-- Starts About the Program -->
    		<?php if( 1 == $hbd_about_program_enable ): ?>
    			<section class="program-section">
    			    <div class="container">
    			        <header class="entry-header heading">
    			            <h2 class="entry-title"><?php echo ( $pp_about_program_title ) ? $pp_about_program_title : 'About The Program'; ?></h2>
    			        </header>
    			        <article class="entry-content">
    			            <?php echo wpautop( $pp_about_program_desc );?>
    			        </article>
    			        <div class="program-gallery">
    			        	<?php echo wpautop( do_shortcode( $pp_about_program_gallery ) );?>
    			        </div>
    			    </div>
    			</section>
    		<?php endif; ?>
        	<!-- Ends About the Program -->

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- #content -->
<?php get_footer();