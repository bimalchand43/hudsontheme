<?php
function hbd_banner_section(){
    global $hbd_options;
    $meta               = get_post_meta( get_the_id (), 'common_heading', true );
    /*echo "<pre>";
    print_r($meta);
    echo "</pre>";*/
    $banner_image_enable    = $meta['banner_image_enable'];
    $banner_image_id        = $meta['banner_image'];
    $banner_heading_enable  = $meta['banner_heading_enable'];
    $page_title             = $meta['hbd_page_title'];
    $page_subtitle          = $meta['hbd_page_subtitle'];
    $hbd_banner_btn_enable  = $meta['hbd_banner_btn_enable'];
    $hbd_banner_btn_label   = $meta['hbd_banner_btn_label'];
    $hbd_banner_btn_url     = $meta['hbd_banner_btn_url'];


    if ( $banner_image_enable == 1 ):    
        $banner_image_url   = hbd_image_src ( array ( 'id' => $banner_image_id, 'size' => 'full' ) );
    ?>
    
    <div class="banner-section" style="background-image: url('<?php echo esc_url( $banner_image_url );?>');">
      <div class="container">
        <div class="banner-content">
          <?php if( 1 == $banner_heading_enable ): ?>
            <?php echo ( $page_title ) ? '<span class="highlight-title">'.$page_title.'</span>' : '';?>
            <header class="entry-header">
              <?php echo ( $page_subtitle ) ? '<h2 class="entry-title">'.$page_subtitle.'</h2>' : '';?>
            </header>
            <?php if( 1== $hbd_banner_btn_enable ): ?>
              <a href="<?php echo $hbd_banner_btn_url; ?>" class="box-button">
                <?php echo ( $hbd_banner_btn_label ) ? $hbd_banner_btn_label : 'apply Today'; ?>
              </a>
            <?php endif;
          endif;
          ?>
        </div>
      </div>
    </div>
    <?php endif ; /* ends for banner image */

    /* added for archieve */
    /*if( is_archive() ):
    ?>
    <div class="banner-section">
      <figure class="banner-img">
        <?php if( ( category_image_src( array('size' =>  'full' )  , false ) ) != null ): 
          $category_image = category_image_src( array('size' =>  'full' ) );
        else :
          $category_image = get_template_directory_uri().'/images/about-bg.png';
        endif; ?>
            <img src="<?php echo $category_image; ?>" alt="Yeah!" class="img-responsive">
      </figure>
      <div class="container v-center">
          <div class="banner-content">
              <header class="entry-header">
                  <?php the_archive_title( '<h2 class="entry-title">', '</h2>' ); ?>
              </header>
          </div>
      </div>
    </div>
    <?php
    endif;*/
}
add_action ( 'hbd_banner', 'hbd_banner_section' ) ;


/* function to get video from custom post type */
function hbd_artistvideo() {    
    $video_args = array(
        'posts_per_page'    => 4,              
        'post_type'         => 'artistvideo',
        'post_status'       => 'publish'
    );

    // Fetch posts.
    $video_query    = new WP_Query( $video_args );
    if ( $video_query->have_posts() ) :
        while ( $video_query->have_posts() ) : 
            $video_query->the_post();
            //the_title();    
            echo esc_url(hbd_youtube_video_src());
        endwhile;
        wp_reset_postdata();
    endif;
}
add_action ( 'hbd_video_list', 'hbd_artistvideo' ) ;

/* for newletter expect homepage */
function hbd_newsletter() {
  global $hbd_options;
  $newsletter_sec_bg_img    = $hbd_options['hp_newsletter_section_bg_img'];
  $newsletter_sec_title     = $hbd_options['hp_newsletter_section_title'];
  $newsletter_sec_subtitle  = $hbd_options['hp_newsletter_section_subtitle'];
  $newsletter_sec_content   = $hbd_options['hp_newsletter_section_content'];
  if( !empty( $newsletter_sec_bg_img ) ) {
      $newsletter_sec_bg_img_src  = hbd_image_src ( array ( 'id' => $newsletter_sec_bg_img, 'size' => 'full' ) ); ;
  } else {
      $newsletter_sec_bg_img_src  = get_stylesheet_directory_uri().'/images/signup-bg.png';
  }
?>
  <section class="signup-section expect-homepage" style="background-image: url( <?php echo esc_url( $newsletter_sec_bg_img_src ); ?>);">
    <div class="container">
      <div class="signup-content">
        <?php if( !empty( $newsletter_sec_title ) ):?>
          <header class="entry-header heading">
            <h2 class="entry-title">
              <strong><?php echo $newsletter_sec_title;?></strong>
            </h2>
            <?php echo ( $newsletter_sec_subtitle ) ? '<h3 class="subtitle">'. $newsletter_sec_subtitle . '</h3>' : ''; ?>
          </header>
          <?php endif; ?>
        <!-- embed code copied from mailchimp -->
        <div class="mailchimp-form-code">
          <?php //echo do_shortcode( $newsletter_sec_content );?>

          <!-- Begin MailChimp Signup Form -->
          <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
          <div id="mc_embed_signup">
          <form action="//rigorousweb.us11.list-manage.com/subscribe/post?u=9892b64f8667223172ceb2b10&amp;id=5e9990818d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
              <div id="mc_embed_signup_scroll">
            
            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_9892b64f8667223172ceb2b10_5e9990818d" tabindex="-1" value=""></div>
              <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
              </div>
          </form>
          </div>
          <!--End mc_embed_signup-->

        </div>
        <!-- embed code ends -->

      </div>
    </div>
  </section>
<?php
}
add_action( 'hbd_newsletter', 'hbd_newsletter' );