<?php 
/*
Template Name: Contact Template
*/
get_header();
global $hbd_options;
$contactpage_meta			= get_post_meta( get_the_id (), 'hbd_contact_section', true );

$hbd_contact_form_enable        = $contactpage_meta['hbd_contact_form_enable'];
$cp_contact_form_sec_title      = $contactpage_meta['cp_contact_form_sec_title'];
$cp_contact_form_desc           = $contactpage_meta['cp_contact_form_desc'];
$cp_contact_form_shortcode      = $contactpage_meta['cp_contact_form_shortcode'];

$hbd_qc_enable              = $contactpage_meta['hbd_quick_contact_enable'];
$cp_qc_title                = $contactpage_meta['cp_quick_contact_title'];
$cp_qc_desc                 = $contactpage_meta['cp_quick_contact_desc'];
$cp_qc_email_enable         = $contactpage_meta['cp_quick_contact_email_enable'];
$cp_qc_email_title          = $contactpage_meta['cp_quick_contact_email_title'];
$cp_qc_email_image          = $contactpage_meta['cp_quick_contact_email_image'];
$cp_qc_email_address        = $contactpage_meta['cp_quick_contact_email_address'];
$cp_qc_phone_enable         = $contactpage_meta['cp_quick_contact_phone_enable'];
$cp_qc_phone_title          = $contactpage_meta['cp_quick_contact_phone_title'];
$cp_qc_phone_image          = $contactpage_meta['cp_quick_contact_phone_image'];
$cp_qc_phone_no             = $contactpage_meta['cp_quick_contact_phone_no'];
$cp_qc_follow_us_enable     = $contactpage_meta['cp_quick_contact_follow_us_enable'];
$cp_qc_follow_us_title      = $contactpage_meta['cp_quick_contact_follow_us_title'];
$cp_qc_follow_us_image      = $contactpage_meta['cp_quick_contact_follow_us_image'];
$cp_qc_follow_us_link       = $contactpage_meta['cp_quick_contact_follow_us_link'];
$cp_qc_ma_enable            = $contactpage_meta['cp_quick_contact_mailing_address_enable'];
$cp_qc_ma_title             = $contactpage_meta['cp_quick_contact_mailing_address_title'];
$cp_qc_ma_image             = $contactpage_meta['cp_quick_contact_mailing_address_image'];
$cp_qc_ma_desc              = $contactpage_meta['cp_quick_contact_mailing_address_desc'];

?>
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <section class="contact-section-wrapper">
                <div class="container">
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
                    <div class="row">
                        <div class="col-sm-6">
                            <?php if( 1 == $hbd_contact_form_enable ):?>
                                <div class="contact-form">
                                    <h2 class="contact-title"><?php echo ( $cp_contact_form_sec_title ) ? $cp_contact_form_sec_title : 'Get In Touch'; ?></h2>
                                    <?php echo wpautop( $cp_contact_form_desc );?>
                                    <?php echo do_shortcode( $cp_contact_form_shortcode ); ?>

                                    <?php /* ?>
                                    <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST">

                                    <input type=hidden name="oid" value="00D410000013qYq">
                                    <input type=hidden name="retURL" value="http://www.appliedentrepreneurship.com">

                                    <!--  ----------------------------------------------------------------------  -->
                                    <!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
                                    <!--  these lines if you wish to test in debug mode.                          -->
                                    <!--  <input type="hidden" name="debug" value=1>                              -->
                                    <!--  <input type="hidden" name="debugEmail"                                  -->
                                    <!--  value="kris@priemerconsulting.com">                                     -->
                                    <!--  ----------------------------------------------------------------------  -->

                                    <label for="first_name">First Name</label><input  id="first_name" maxlength="40" name="first_name" size="20" type="text" required="required" /><br>

                                    <label for="last_name">Last Name</label><input  id="last_name" maxlength="80" name="last_name" size="20" type="text" required="required"  /><br>

                                    <label for="phone">Phone</label><input  id="phone" maxlength="40" name="phone" size="20" type="text" /><br>

                                    <label for="email">Email</label><input  id="email" maxlength="80" name="email" size="20" type="text" required="required" /><br>

                                    <label for="description">Description</label><textarea name="description"></textarea><br>

                                    Role of Interest:<select  id="00N4100000Y8n86" multiple="multiple" name="00N4100000Y8n86" title="Role of Interest"><option value="Student">Student</option>
                                    <option value="Investor">Investor</option>
                                    <option value="Mentor">Mentor</option>
                                    <option value="Board Member">Board Member</option>
                                    <option value="Tour">Tour</option>
                                    <option value="Speaker">Speaker</option>
                                    </select><br>

                                    <input type="submit" name="submit">

                                    </form>

                                    <?php */ ?>


                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-sm-6">
                            <?php if( 1 == $hbd_qc_enable ): ?>
                                <div class="quick-contact-section">
                                    <h2 class="contact-title"><?php echo ( $cp_qc_title ) ? $cp_qc_title : 'Quick Contact'; ?></h2>
                                    <?php echo wpautop( $cp_qc_desc );?>
                                    <div class="quick-contact-wrapper">
                                        <div class="quick-contact-item-wrapper">
                                            <?php if( 1 == $cp_qc_email_enable ): ?>
                                                <div class="quick-contact-item">
                                                    <?php if( !empty( $cp_qc_email_image )): 
                                                        $cp_qc_email_image_src = hbd_image_src ( array ( 'id' => $cp_qc_email_image, 'size' => 'thumbnail' ) );
                                                    ?>
                                                        <figure class="quick-contact-icon">
                                                            <img src="<?php echo $cp_qc_email_image_src;?>" alt="">
                                                        </figure>
                                                    <?php endif; ?>
                                                    <div class="quick-contact-text">
                                                        <h4><?php echo ( $cp_qc_email_title ) ? $cp_qc_email_title : 'Email'; ?>:</h4>
                                                        <a href="mailto:<?php echo $cp_qc_email_address;?>"><?php echo $cp_qc_email_address;?></a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if( 1 == $cp_qc_phone_enable ):?>
                                                <div class="quick-contact-item">
                                                    <?php if( !empty( $cp_qc_phone_image )): 
                                                        $cp_qc_phone_image_src = hbd_image_src ( array ( 'id' => $cp_qc_phone_image, 'size' => 'thumbnail' ) );
                                                    ?>
                                                        <figure class="quick-contact-icon">
                                                            <img src="<?php echo $cp_qc_phone_image_src;?>" alt="">
                                                        </figure>
                                                    <?php endif; ?>
                                                    <div class="quick-contact-text">
                                                        <h4><?php echo ( $cp_qc_phone_title ) ? $cp_qc_phone_title : 'Phone';?>:</h4>
                                                        <a href="tel:<?php echo $cp_qc_phone_no; ?>"><?php echo $cp_qc_phone_no; ?></a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if( 1 == $cp_qc_follow_us_enable ):?>
                                                <div class="quick-contact-item">
                                                    <?php if( !empty( $cp_qc_follow_us_image )): 
                                                        $cp_qc_follow_us_src = hbd_image_src ( array ( 'id' => $cp_qc_follow_us_image, 'size' => 'thumbnail' ) );
                                                    ?>
                                                        <figure class="quick-contact-icon">
                                                            <img src="<?php echo $cp_qc_follow_us_src;?>" alt="">
                                                        </figure>
                                                    <?php endif; ?>
                                                    <?php if( !empty( $cp_qc_follow_us_link )): ?>
                                                        <div class="quick-contact-text">
                                                            <h4><?php echo ( $cp_qc_follow_us_title ) ? $cp_qc_follow_us_title : 'Follow Us'; ?>:</h4>
                                                            <div class="menu-social-link-container">
                                                                <ul class="menu">
                                                                    <?php foreach ($cp_qc_follow_us_link as $key => $value): ?>
                                                                        <li><a href="<?php echo $value['cp_quick_contact_follow_url'];?>"> &nbsp; </a></li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>

                                            <?php if( 1 == $cp_qc_ma_enable ): ?>
                                                <div class="quick-contact-item">
                                                    <?php if( !empty( $cp_qc_ma_image )): 
                                                        $cp_qc_ma_image_src = hbd_image_src ( array ( 'id' => $cp_qc_ma_image, 'size' => 'thumbnail' ) );
                                                    ?>
                                                        <figure class="quick-contact-icon">
                                                            <img src="<?php echo $cp_qc_ma_image_src;?>" alt="">
                                                        </figure>
                                                    <?php endif; ?>
                                                    <div class="quick-contact-text">
                                                        <h4><?php echo ( $cp_qc_ma_title ) ? $cp_qc_ma_title : 'Mailing Address'; ?></h4>
                                                        <?php echo wpautop( $cp_qc_ma_desc );?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- #content -->
<?php 
get_footer();