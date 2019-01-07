<?php 
/*
Template Name: Homepage Template
*/
get_header();
global $hbd_options;
//do_action( 'hbd_video_list' );
$homepage_meta			= get_post_meta( get_the_id (), 'hbd_homepage_section', true );
/*echo "<pre>";
print_r($homepage_meta);
echo "</pre>";*/

$hbd_our_student_enable       = $homepage_meta['hbd_our_student_enable'];
$hp_our_students_sec_title    = $homepage_meta['hp_our_students_sec_title'];
$hp_our_students_title        = $homepage_meta['hp_our_students_title'];
$hp_our_students_desc         = $homepage_meta['hp_our_students_desc'];
$hp_our_students_image_id     = $homepage_meta['hp_our_students_image'];
$hp_our_students_btn_enable   = $homepage_meta['hp_our_students_btn_enable'];
$hp_our_students_btn_label    = $homepage_meta['hp_our_students_btn_label'];
$hp_our_studentsr_btn_url     = $homepage_meta['hp_our_studentsr_btn_url'];

$hbd_our_impact_enable        = $homepage_meta['hbd_our_impact_enable'];
$hp_our_impacts_title         = $homepage_meta['hp_our_impacts_title'];
$hp_our_impacts_desc          = $homepage_meta['hp_our_impacts_desc'];
$hp_our_impacts_list          = $homepage_meta['hp_our_impacts_list'];

$hbd_our_mentor_enable        = $homepage_meta['hbd_our_mentor_enable'];
$hp_our_mentors_title         = $homepage_meta['hp_our_mentors_title'];
$hp_our_mentors_desc          = $homepage_meta['hp_our_mentors_desc'];
$hp_our_mentors_list          = $homepage_meta['hp_our_mentors_list'];
$hp_our_mentors_btn_enable    = $homepage_meta['hp_our_mentors_btn_enable'];
$hp_our_mentors_btn_label     = $homepage_meta['hp_our_mentors_btn_label'];
$hp_our_mentors_btn_url       = $homepage_meta['hp_our_mentors_btn_url'];

$hbd_our_investor_enable      = $homepage_meta['hbd_our_investor_enable'];
$hp_our_investors_title       = $homepage_meta['hp_our_investors_title'];
$hp_our_investors_desc        = $homepage_meta['hp_our_investors_desc'];
$hp_our_investors_btn_enable  = $homepage_meta['hp_our_investors_btn_enable'];
$hp_our_investors_btn_label   = $homepage_meta['hp_our_investors_btn_label'];
$hp_our_investors_btn_url     = $homepage_meta['hp_our_investors_btn_url'];
$hp_our_investors_list        = $homepage_meta['hp_our_investors_list'];
?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <!-- Start Our Students -->
            <?php if( 1 == $hbd_our_student_enable ): ?>                
                <section class="info-section-wrapper">
                    <div class="container">
                        <header class="entry-header heading">
                            <h2 class="entry-title"><?php echo ($hp_our_students_sec_title) ? $hp_our_students_sec_title : 'Our Students' ?></h2>
                        </header>
                        <div class="info-section">
                        <div class="row">
                            <div class="col-sm-5 col-sm-push-7">
                                <?php if( !empty( $hp_our_students_image_id )): 
                                    $hp_our_students_image_src = hbd_image_src ( array ( 'id' => $hp_our_students_image_id, 'size' => 'large' ) );
                                ?>
                                    <figure class="info-image">
                                        <img src="<?php echo $hp_our_students_image_src; ?>" align="">
                                    </figure>
                                <?php endif;?>
                            </div>
                            <div class="col-sm-7 col-sm-pull-5">
                                <div class="info-content-section">
                                    <h2 class="entry-title"><?php echo $hp_our_students_title; ?></h2>
                                    <article class="entry-content">
                                        <?php echo wpautop( $hp_our_students_desc ); ?>
                                        <?php if( !empty( $hp_our_students_btn_enable )): ?>
                                            <p><a href="<?php echo $hp_our_studentsr_btn_url; ?>" class="readmore-button"><?php echo ( $hp_our_students_btn_label ) ? $hp_our_students_btn_label : 'Read More'; ?> <i class="fa fa-arrow-right"></i></a></p>
                                        <?php endif; ?>
                                    </article>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Ends Our Students -->

            <!-- Start Our Impact -->
            <?php if( 1 == $hbd_our_impact_enable ): ?>
                <section class="featured-section">
                    <div class="container">
                        <header class="entry-header heading">
                            <h2 class="entry-title"><?php echo ($hp_our_impacts_title) ? $hp_our_impacts_title : 'Our Impact'; ?></h2>
                        </header>
                        <div class="section-info">
                            <?php echo wpautop( $hp_our_impacts_desc ); ?>
                        </div>
                        <div class="row">
                            <?php if( !empty( $hp_our_impacts_list )):
                                foreach ($hp_our_impacts_list as $key => $value): 
                                    $impacts_title      = $value['hp_our_impacts_title'];
                                    $impacts_image_id   = $value['hp_our_impacts_image'];
                                    $impacts_image_src  = hbd_image_src ( array ( 'id' => $impacts_image_id, 'size' => 'thumbnail' ) );
                                    $impacts_desc       = $value['hp_our_impacts_desc'];
                                    $impacts_link_label = $value['hp_our_impacts_link_label'];
                                    $impacts_link_url   = $value['hp_our_impacts_link_url'];
                            ?>
                                    <div class="col-sm-3">
                                        <div class="featured-item">
                                            <?php if( !empty( $impacts_image_id )):?>
                                                <figure class="featured-icon">
                                                    <img src="<?php echo $impacts_image_src; ?>" alt="">
                                                </figure>
                                            <?php endif;?>
                                            <h2 class="entry-title">
                                                <a href="<?php echo $impacts_link_url; ?>"><?php echo $impacts_title; ?></a>
                                            </h2>
                                            <article class="entry-content">
                                                <p><?php echo $impacts_desc; ?></p>
                                                <p><a href="<?php echo $impacts_link_url; ?>" class="readmore-button"><?php echo ( $impacts_link_label ) ? $impacts_link_label : 'Read more'; ?></a></p>
                                            </article>
                                        </div>
                                    </div>                                
                            <?php endforeach;
                            endif; ?>
                        </div>
                    </div>
                </section>
            <?php endif;?>
            <!-- Ends Our Impact -->

            <!-- Start Our Mentors -->
            <?php if( 1 == $hbd_our_mentor_enable ): ?>
                <section class="team-section">
                    <div class="container">
                        <header class="entry-header heading">
                            <h2 class="entry-title"><?php echo ( $hp_our_mentors_title ) ? $hp_our_mentors_title : 'Our Mentors'; ?></h2>
                        </header>
                        <div class="section-info">
                            <p><?php echo $hp_our_mentors_desc; ?></p>
                        </div>
                        <?php if( !empty( $hp_our_mentors_list )): ?>
                            <div class="team-item-wrapper">
                                <?php foreach ( $hp_our_mentors_list as $key => $value) :
                                    $mentor_post_id = $value['hp_our_mentors_list_id'];
                                ?>
                                    <div class="team-item">
                                        <?php
                                        $mentor_args = array(
                                                        'p'           => $mentor_post_id,
                                                        'post_type'   => 'ourmentor',
                                                        'post_status' => 'publish'
                                                    );
                                        $mentor_query = new WP_Query( $mentor_args );
                                        if( $mentor_query->have_posts() ){
                                            while( $mentor_query->have_posts() ){
                                                $mentor_query->the_post();
                                                $mentor_meta        = get_post_meta( get_the_id (), 'our_mentor_meta', true );
                                                $mentor_designation = $mentor_meta['mentor_designation'];
                                                $mentor_linkendin   = $mentor_meta['mentor_linkendin_id'];
                                                ?>
                                                    <figure class="team-img">
                                                        <?php the_post_thumbnail( 'medium' );?>
                                                    </figure>
                                                    <?php the_title('<h4 class="author-name">','</h4>' ); ?>
                                                    <?php if( !empty( $mentor_designation )): ?>
                                                        <span class="author-designation">- <?php echo $mentor_designation; ?> -</span>
                                                    <?php endif; ?>
                                                    <article class="author-text">
                                                        <?php /*?><p>"<?php //echo substr( get_the_content(), 0, 100 ); ?>"</p><?php */ ?>
                                                        <?php the_content(); ?>
                                                    </article>
                                                    <?php if( !empty( $mentor_linkendin )):?>
                                                        <div class="menu-social-link-container">
                                                            <ul>
                                                                <li><a href="<?php echo $mentor_linkendin; ?>" target="_blank">linkendin</a></li>
                                                            </ul>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php
                                            }
                                            wp_reset_postdata();
                                        } ?>

                                    </div>
                                <?php endforeach;?>
                            </div>
                        <?php endif;?>
                        <?php if( 1 == $hp_our_mentors_btn_enable ): ?>
                            <a href="<?php echo $hp_our_mentors_btn_url; ?>" class="readmore-button"><?php echo ( $hp_our_mentors_btn_label ) ? $hp_our_mentors_btn_label : 'View all Mentors'; ?> <i class="fa fa-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif;?>
            <!-- Ends Our Mentors -->

            <!-- Start Our Investor -->
            <?php if( 1 == $hbd_our_investor_enable ): ?>
                <section class="sponsor-section">
                    <div class="container">
                        <header class="entry-header heading">
                            <h2 class="entry-title"><?php echo ( $hp_our_investors_title ) ? $hp_our_investors_title: 'Our Investors'; ?></h2>
                        </header>
                        <div class="section-info">
                            <p><?php echo $hp_our_investors_desc;?></p>
                        </div>
                        <?php if( 1 == $hp_our_investors_btn_enable ):?>
                            <a href="<?php echo $hp_our_investors_btn_url;?>" class="readmore-button"><?php echo ($hp_our_investors_btn_label) ? $hp_our_investors_btn_label : 'View All Investors' ?></a>
                        <?php endif; ?>
                        <?php if( !empty( $hp_our_investors_list )):?>
                            <div class="sponsor-logo-wrap">
                                <div id="sponsor-logo-slider" class="owl-carousel owl-theme">
                                    <?php foreach ($hp_our_investors_list as $key => $value): 
                                        $investor_image_id  = $value['hp_our_investors_list_image'];
                                        $investor_image_src = hbd_image_src ( array ( 'id' => $investor_image_id, 'size' => 'full' ) );
                                        if( !empty( $investor_image_id )):
                                    ?>
                                            <figure class="sponsor-logo">
                                                <a href="#">
                                                    <img src="<?php echo $investor_image_src; ?>" alt="">
                                                </a>
                                            </figure>                                       
                                    <?php endif;
                                    endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
            <!-- Ends Our Investors -->

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer();