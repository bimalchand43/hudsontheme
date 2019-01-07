<?php 
/*
Template Name: Students Template
*/
get_header();
global $hbd_options;
//$aboutpage_meta			= get_post_meta( get_the_id (), 'hbd_about_section', true );
?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        	<section class="member-section">
        	    <div class="container">
        	        <div class="member-content">
        	        	<?php 
    	        			if ( have_posts() ):
    	        				while ( have_posts() ) : the_post();
        	        	?>
			        	            <header class="entry-header heading">
			        	            	<?php the_title('<h2 class="entry-title">','</h2>'); ?>
			        	            </header>
			        	            <div class="section-info">
			        	                <?php the_content()?>
			        	            </div>
		        	        <?php 		        	            
	        	            	endwhile;
	        	            endif;
        	            ?>
        	            <div class="member-item-wrapper">
            				<?php
            					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            					$current_class_arg 	= array(								
            										'post_type'   => 'student',
            										'post_status' => 'publish',
            										
            										//Order & Orderby Parameters
            										'order'               => 'DESC',
            										'orderby'             => 'date',
            							
            										//Pagination Parameters
            										'posts_per_page'         => 16,
            										//'posts_per_archive_page' => 10,
            										'nopaging'               => false,
            										'paged'                  => $paged,
            										
            									);
            					
            					$current_class_query = new WP_Query( $current_class_arg );
            					
            					if( $current_class_query->have_posts() ){
            						while( $current_class_query->have_posts() ){
            							$current_class_query->the_post();

                                        $student_meta   = get_post_meta( get_the_id (), 'student_meta', true );
                                        $student_school = $student_meta['student_school']; 
            							?>
        								<div class="member-item">
        									<?php if( has_post_thumbnail() ){ ?>
    											<figure class='featured-image'>
        								        	<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'current-class' ); ?>" alt="">
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
                                                <?php if( !empty( $student_school )): ?>
        								            <span class="member-habbit"><?php echo $student_school; ?></span>
                                                <?php endif; ?>
        								    </div>
        								</div>
            							<?php
            						}

            						/* pagination */
            						/* if ($current_class_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
            						  	<nav class="prev-next-posts">
            							    <div class="next-posts-link">
            							      	<?php echo get_previous_posts_link( 'Newer Articles' ); // display newer posts link ?>
            							    </div>
            							    <div class="prev-posts-link">
            							      	<?php echo get_next_posts_link( 'Older Articles', $current_class_query->max_num_pages ); // display older posts link ?>
            							    </div>
            						 	</nav>
            						<?php } */

            						echo hbd_custom_pagination( $current_class_query );
            						wp_reset_postdata();
            						wp_reset_query();
            					} 
            				?>
        	                
        	            </div>
        	        </div>
        	    </div>
        	</section>

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- #content -->
<?php 
get_footer();