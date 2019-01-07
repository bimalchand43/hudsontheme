<?php 
/*
Template Name: Our Mentor Template
*/
get_header();
global $hbd_options;
//$aboutpage_meta			= get_post_meta( get_the_id (), 'hbd_about_section', true );
?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        	<section class="member-section template-our-mentor">
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
            					$our_mentor_arg 	= array(								
            										'post_type'   => 'ourmentor',
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
            					
            					$our_mentor_query = new WP_Query( $our_mentor_arg );
            					
            					if( $our_mentor_query->have_posts() ){
            						while( $our_mentor_query->have_posts() ){
            							$our_mentor_query->the_post();

                                        $our_mentor_meta    =get_post_meta( get_the_id (), 'our_mentor_meta', true );
                                        $mentor_designation = $our_mentor_meta['mentor_designation']; 
                                        $mentor_linkendin   = $our_mentor_meta['mentor_linkendin_id']; 
            							?>
        								<div class="member-item">
        									<?php if( has_post_thumbnail() ){ ?>
    											<figure class='featured-image'>
        								        	<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'current-class' ); ?>" alt="">
                                                    <?php if( !empty( $mentor_linkendin )):?>
    	        								        <div class="profile-section linkedin-link">
    	        								            <a href="<?php echo esc_url( $mentor_linkendin );?>" target="_blank">Linkendin</a>
    	        								        </div>
                                                    <?php endif; ?>
    											</figure>
        									<?php } ?>
        								    <!-- <figure class="featured-image">
        								    </figure> -->
        								    <div class="entry-content">
        								    	<?php
        								    		the_title( '<h3 class="member-name"><a href="' . esc_url( $mentor_linkendin ) . '" rel="bookmark" target="_blank">', '</a></h3>' );
        								    	?>
                                                <?php if( !empty( $mentor_designation )):?>
        								            <span class="member-habbit"><?php echo $mentor_designation; ?></span>
                                                <?php endif;?>
        								    </div>
        								</div>
            							<?php
            						}

            						/* pagination */
            						/* if ($our_mentor_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
            						  	<nav class="prev-next-posts">
            							    <div class="next-posts-link">
            							      	<?php echo get_previous_posts_link( 'Newer Articles' ); // display newer posts link ?>
            							    </div>
            							    <div class="prev-posts-link">
            							      	<?php echo get_next_posts_link( 'Older Articles', $our_mentor_query->max_num_pages ); // display older posts link ?>
            							    </div>
            						 	</nav>
            						<?php } */

            						echo hbd_custom_pagination( $our_mentor_query );
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