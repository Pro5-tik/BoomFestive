<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Boom_Festive
 */

 ?>

<?php if( is_active_sidebar( 'boom-festive-sidebar-1' ) ): ?>
	<aside class="sidebar-1 col-lg-3 col-md-4 col-12 h-100">
		<?php dynamic_sidebar( 'boom-festive-sidebar-1' ); ?>
	</aside>
<?php endif;

