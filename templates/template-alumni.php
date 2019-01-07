<?php 
/*
Template Name: Alumni Template
*/
get_header();
global $hbd_options;
//$aboutpage_meta			= get_post_meta( get_the_id (), 'hbd_about_section', true );
?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        	<section class="member-section template-alumni">
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

                        <?php 
                            /* if( $terms = get_terms( 'alumni_class', 'orderby=name' ) ) : // to make it simple I use default categories
                                echo '<select name="categoryfilter"><option>Select category...</option>';
                                foreach ( $terms as $term ) :
                                    echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
                                endforeach;
                                echo '</select>';
                            endif; */
                        ?>

                        <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter" data-permalink="<?php the_permalink(); ?>">
                            <?php
                                $term_id = isset($_GET['class']) ? $_GET['class'] : 0;
                                if( $terms = get_terms( 'alumni_class', 'orderby=name' ) ) : // to make it simple I use default categories
                                    echo '<select name="categoryfilter" id="categoryfilter"><option value="0">Select Class Year</option>';
                                    foreach ( $terms as $term ) :
                                        echo '<option value="' . $term->term_id . '" '.selected($term_id, $term->term_id, false).'>' . $term->name . '</option>'; // ID of the category as the value of an option
                                    endforeach;
                                    echo '</select>';
                                endif;
                            ?>
                            <!-- <button>Apply filter</button> -->
                            <input type="hidden" name="action" value="myfilter">
                        </form>
                        <div id="response"></div>


        	            <div class="member-item-wrapper without-ajax-member-item-wrapper">
            				<?php
            					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            					$alumni_arg 	= array(								
            										'post_type'   => 'alumni',
            										'post_status' => 'publish',
            										
            										//Order & Orderby Parameters
            										'order'               => 'DESC',
            										'orderby'             => 'date',
            							
            										//Pagination Parameters
            										//'posts_per_page'         => 16,
            										//'posts_per_archive_page' => 10,
            										//'nopaging'               => false,
            										'paged'                  => $paged,
            										
            									);

                                if( !empty($term_id) && absint( $term_id ) ){
                                    $alumni_arg['tax_query'] = array(
                                        array(
                                            'taxonomy'  => 'alumni_class',
                                            'field'     => 'id',
                                            'terms'     => absint($term_id),
                                        )
                                    );
                                }
            					
            					$alumni_query = new WP_Query( $alumni_arg );
            					
            					if( $alumni_query->have_posts() ){
            						while( $alumni_query->have_posts() ){
            							$alumni_query->the_post();
                                        $alumni_meta    = get_post_meta( get_the_id (), 'alumni_meta', true );
                                        $alumni_school  = $alumni_meta['alumni_school'];
            							?>
        								<div class="member-item">
        									<?php if( get_the_post_thumbnail_url( get_the_ID(), 'current-class' ) ){ ?>
    											<figure class='featured-image'>
        								        	<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'current-class' ); ?>" alt="">
	        								        <div class="profile-section">
	        								            <a href="<?php the_permalink();?>">View profile</a>
	        								        </div>
    											</figure>
        									<?php }else{ ?>
                                                <figure class='featured-image'>
                                                    <img src="<?php echo get_template_directory_uri();  ?>/images/no-image.jpg" alt="">
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

            						/* pagination */
            						/* if ($alumni_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
            						  	<nav class="prev-next-posts">
            							    <div class="next-posts-link">
            							      	<?php echo get_previous_posts_link( 'Newer Articles' ); // display newer posts link ?>
            							    </div>
            							    <div class="prev-posts-link">
            							      	<?php echo get_next_posts_link( 'Older Articles', $alumni_query->max_num_pages ); // display older posts link ?>
            							    </div>
            						 	</nav>
            						<?php } */
            						echo hbd_custom_pagination( $alumni_query );
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