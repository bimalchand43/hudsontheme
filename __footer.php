	<?php 
		global $hbd_options;

		$cta_section_title 			    = $hbd_options['cta_section_title'];
		$cta_section_apply_enable 	= $hbd_options['cta_section_apply_enable'];
		$cta_section_apply_label 	  = $hbd_options['cta_section_apply_label'];
		$cta_section_apply_link	 	  = $hbd_options['cta_section_apply_link'];
		$cta_section_donate_enable	= $hbd_options['cta_section_donate_enable'];
		$cta_section_donate_label	  = $hbd_options['cta_section_donate_label'];
		$cta_section_donate_link	  = $hbd_options['cta_section_donate_link'];
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<!-- Start CTA -->
        <section class="promotional-bar">
            <div class="container">
                <h2 class="entry-title"><?php echo ( $cta_section_title ) ? $cta_section_title :'What Are You Waiting For'; ?></h2>
                <div class="button-section">
                	<?php if( 1 == $cta_section_apply_enable ): ?>
                    	<a href="<?php echo $cta_section_apply_link; ?>" class="box-button">
                    		<?php echo ( $cta_section_apply_label ) ? $cta_section_apply_label : 'apply'; ?> 
                		</a>
                	<?php endif; ?>
                	<?php if( 1 == $cta_section_donate_enable ):?>
                    	<a href="<?php echo $cta_section_donate_link;?>" class="box-button box-donate-button">
                    		<?php echo ( $cta_section_donate_label ) ? $cta_section_donate_label : 'Invest'; ?>
                		</a>
                	<?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Ends CTA  -->

	    <section class="widget-area">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-3">
                    	<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                    		<?php dynamic_sidebar( 'footer-widget-1' ); ?>
                    	<?php else : ?>
                    		<?php echo 'Insert Widget Content Footer 1'; ?>
                    	<?php endif; ?>
	                </div>
	                <div class="col-sm-2">
	                    <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                    		<?php dynamic_sidebar( 'footer-widget-2' ); ?>
                    	<?php else : ?>
                    		<?php echo 'Insert Widget Content Footer 2'; ?>
                    	<?php endif; ?>
	                </div>
	                <div class="col-sm-3">
	                    <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
                    		<?php dynamic_sidebar( 'footer-widget-3' ); ?>
                    	<?php else : ?>
                    		<?php echo 'Insert Widget Content Footer 3'; ?>
                    	<?php endif; ?>
	                </div>
	                <div class="col-sm-4 inline-social-icon">
	                    <?php if ( is_active_sidebar( 'footer-widget-4' ) ) : ?>
                    		<?php dynamic_sidebar( 'footer-widget-4' ); ?>
                    	<?php else : ?>
                    		<?php echo 'Insert Widget Content Footer 4'; ?>
                    	<?php endif; ?>
	                </div>
	            </div>
	        </div><!-- .container -->
	    </section>
	    <section class="site-generator"> <!-- site-generator starting from here -->
	        <div class="container">
	          	<span class="copy-right"><?php echo $hbd_options['site_copyright']; ?></span>
          	    <?php
          	    	$args = array(
          	    		'theme_location' => 'footer-links',
          	    		'menu' => '',
          	    		'container' => 'div',
          	    		'container_class' => 'site-generator-menu',
          	    		'container_id' => '',
          	    		'menu_class' => 'menu',
          	    		'menu_id' => '',
          	    		'echo' => true,
          	    		'fallback_cb' => 'wp_page_menu',
          	    		'before' => '',
          	    		'after' => '',
          	    		'link_before' => '',
          	    		'link_after' => '',
          	    		'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
          	    		'depth' => 0,
          	    		'walker' => ''
          	    	);
          	    
          	    	echo wp_nav_menu( $args ); ?>
	        </div> 
	    </section>
	</footer><!-- .site-footer -->
</div><!-- end #page -->
<?php wp_footer(); ?>
</body>
</html>