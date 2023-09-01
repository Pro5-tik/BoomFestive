<?php
/**
 * The template for the sidebar containing the shop widget area
 *
 * @package Boom_Festive
 */
?>

<?php if( is_active_sidebar( 'boom-festive-sidebar-shop' ) ): ?>
	<?php dynamic_sidebar( 'boom-festive-sidebar-shop' ); ?>
<?php endif;