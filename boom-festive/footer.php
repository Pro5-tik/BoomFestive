<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Boom_Festive
 */

?>

 <footer>
	 <section class="footer-widgets">
	 <div class="container">
					<div class="row">
						<?php if( is_active_sidebar( 'boom-festive-sidebar-footer1' ) ): ?>
							<div class="col-md-4 col-12">
								<?php dynamic_sidebar( 'boom-festive-sidebar-footer1' ); ?>
							</div>
						<?php endif; ?>
						<?php if( is_active_sidebar( 'boom-festive-sidebar-footer2' ) ): ?>
							<div class="col-md-4 col-12">
								<?php dynamic_sidebar( 'boom-festive-sidebar-footer2' ); ?>
							</div>
						<?php endif; ?>	
						<?php if( is_active_sidebar( 'boom-festive-sidebar-footer3' ) ): ?>
							<div class="col-md-4 col-12">
								<?php dynamic_sidebar( 'boom-festive-sidebar-footer3' ); ?>
							</div>
						<?php endif; ?>											
					</div>
				</div>
	 </section>

	 <section class="copyright" style="background-color: <?php echo esc_attr(get_option('footer_bg_section', '#333')); ?>">
		 <div class="container">
			 <div class="row">
				 <div class="copyright-text col-12 col-md-6">
				 <p>
					<?php
					$copyright_sec = get_option("copyright_sec"); // Default value if option is not set
					$copyright = get_theme_mod('set_copyright', $copyright_sec);
					
					echo esc_html($copyright);
					?>
				</p>
				 </div>
				 <nav class="footer-menu col-12 col-md-6 text-left text-md-right" >
					 <?php 
						 wp_nav_menu( 
							 array(
										 'theme_location' =>'boom_festive_footer_menu',
										 'depth'          =>1,
							 ) 
						 ); 
					 ?>							
				 </nav>
			 </div>
		 </div>
	 </section>
 </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
