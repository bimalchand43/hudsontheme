<?php 
/*
Template Name: Students Ajax Load Template
*/
get_header();

?>
<div id="student-wrapper">
    <div class="container">
        <div class="row loadmore-post">
<?php
 $args = array(
     'post_type' => 'student',
    'posts_per_page' => '6',
    'status' => 'publish'
);
 
// Custom query.
$query = new WP_Query( $args );
 
// Check that we have query results.
if ( $query->have_posts() ) {
 
    // Start looping over the query results.
    while ( $query->have_posts() ) {
        $get_post_class = get_query_var('newpost') ? get_query_var('newpost') : '' ;
        $query->the_post(); 
        $backgroundImage = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
        ?>
        <div class="col-sm-4 <?php echo  $get_post_class; ?>">
            <div class="student-content">
                <div class="studen-img"><img src="<?php echo $backgroundImage; ?>" /></div>
                <div class="student-title"><h2><?php the_title(); ?></h2></div>
                <div class="student-desc"><?php the_excerpt(); ?></div>
            </div>
        </div>
 
 <?php   }
 
}
 
wp_reset_postdata();
 
?>
    </div><!--row-->
    </div><!--row-->
        <div class="load-container">
			<a  class="load-btn" data-page="1" data-perpage="6">
				<span class="dashicons dashicons-image-rotate"></span> Load More
			</a>
		</div>
    </div><!--eof container-->
</div><!--eof student-wrapper-->

<?php 
get_footer();
?>