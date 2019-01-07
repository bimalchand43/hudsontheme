<?php
/**
 Template Name: Show All Query Template
 * The template for displaying all query
 *
 */
 if( ! is_user_logged_in() ) {
    wp_safe_redirect( esc_url( site_url() ), 302 );
    # redirect code goes here if accessed directly.
}
$current_user = wp_get_current_user();

get_header(); ?>

<div id="query-container">
    <div class="container">
        <div clas="row">
            <div class="col-sm-12">
            <?php
            $args = array('author' => $current_user->ID, 'post_type' => 'student', 'post_status' => 'publish');
            $the_query = new WP_Query( $args );
            //print_r($the_query);
            // The Loop
            if ( $the_query->have_posts() ) { ?>
                <ul class="query-list">
               <?php while ( $the_query->have_posts() ) {
		            $the_query->the_post();
		            ?>
                    <li><?php the_content(); ?></li>
                    <?php } ?>
                </ul>
                <?php 
                wp_reset_postdata();
            } else {
	echo "No Post Found!!";
}
                ?>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
