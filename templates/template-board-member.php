<?php 
/*
Template Name: Board Member Template
*/
get_header();
global $hbd_options;
//$aboutpage_meta           = get_post_meta( get_the_id (), 'hbd_about_section', true );
?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section class="member-section template-board-member">
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
                                $board_member_arg  = array(                                
                                                    'post_type'   => 'boardmember',
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
                                
                                $board_member_query = new WP_Query( $board_member_arg );
                                
                                if( $board_member_query->have_posts() ){
                                    while( $board_member_query->have_posts() ){
                                        $board_member_query->the_post();

                                        $board_member_meta    =get_post_meta( get_the_id (), 'board_member_meta', true );
                                        $bm_designation     = $board_member_meta['bm_designation']; 
                                        $bm_linkendin_id    = $board_member_meta['bm_linkendin_id']; 
                                        ?>
                                        <div class="member-item">
                                            <?php if( has_post_thumbnail() ){ ?>
                                                <figure class='featured-image'>
                                                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'current-class' ); ?>" alt="">
                                                    <?php if( !empty( $bm_linkendin_id )):?>
                                                        <div class="profile-section linkedin-link">
                                                            <a href="<?php echo esc_url( $bm_linkendin_id );?>" target="_blank">Linkendin</a>
                                                        </div>
                                                    <?php endif; ?>
                                                </figure>
                                            <?php } ?>
                                            <!-- <figure class="featured-image">
                                            </figure> -->
                                            <div class="entry-content">
                                                <?php
                                                    the_title( '<h3 class="member-name"><a href="' . esc_url( $bm_linkendin_id ) . '" rel="bookmark" target="_blank">', '</a></h3>' );
                                                ?>
                                                <?php if( !empty( $bm_designation )):?>
                                                    <span class="member-habbit"><?php echo $bm_designation; ?></span>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    /* pagination */
                                    /* if ($board_member_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
                                        <nav class="prev-next-posts">
                                            <div class="next-posts-link">
                                                <?php echo get_previous_posts_link( 'Newer Articles' ); // display newer posts link ?>
                                            </div>
                                            <div class="prev-posts-link">
                                                <?php echo get_next_posts_link( 'Older Articles', $board_member_query->max_num_pages ); // display older posts link ?>
                                            </div>
                                        </nav>
                                    <?php } */

                                    echo hbd_custom_pagination( $board_member_query );
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