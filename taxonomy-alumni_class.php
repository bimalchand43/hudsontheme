<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hbd_AEP
 */

get_header(); ?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section class="member-section template-alumni alumni-archive-list">
                <div class="container">
                    <?php hbd_simple_breadcrumb();?>
                    <?php
                    if ( have_posts() ) : ?>
                                                
                        <header class="page-header">
                            <?php
                                the_archive_title( '<h1 class="page-title">', '</h1>' );
                                the_archive_description( '<div class="archive-description">', '</div>' );
                            ?>
                        </header><!-- .page-header -->
                        <div class="member-content">

                            <?php
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
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
                            endwhile;
                            wp_pagenavi();
                            //the_posts_navigation();
                            
                            ?>

                            <?php    

                        else :

                            get_template_part( 'template-parts/content', 'none' );
                        ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>
</div>
<?php
get_footer();