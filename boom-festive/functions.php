<?php
/**
 * Boom Festive functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Boom_Festive
 */

/**
 * Enqueue files for the TGM PLugin Activation library.(Do it later)
 */
// require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
// require_once get_template_directory() . '/inc/required-plugins.php';
/**
 * Enqueue scripts for demo data using One Click Demo Import library.(Do it later)
 */
// require_once get_template_directory() . '/demo-data/ocdi.php';
/**
 * Enqueue WP Bootstrap Navwalker library (responsive menu).
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/** 
 * Enqueue scripts and styles.
*/
function ibsf_scripts(){
    //Bootstrap javascript and CSS files
 	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
 	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '4.3.1', 'all' );
    
	// Theme's main stylesheet
 	wp_enqueue_style( 'boom-festive-style', get_stylesheet_uri(), array(), '1.0 ', false );
    // Google Fonts
 	wp_enqueue_style( 'rajdhani', 'https://fonts.googleapis.com/css?family=Rajdhani:400,500,600,700|https://fonts.googleapis.com/css?family=Seaweed+Script' );

    // Flexslider Javascript and CSS files
	wp_enqueue_script( 'flexslider-min-js', get_template_directory_uri() . '/inc/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/inc/flexslider/flexslider.css', array(), '', 'all' );
	wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/inc/flexslider/flexslider.js', array( 'jquery' ), '', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts','ibsf_scripts');

if ( ! function_exists( 'ibsf_config' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	function ibsf_config(){
		//register nav menus.
		register_nav_menus(
			array(
				'boom_festive_main_menu'=>esc_html__('Boom Festive Main Menu','boom-festive'),
				'boom_festive_footer_menu'=>esc_html__('Boom Festive Footer Menu','boom-festive'),
			)
		);
		
       // This theme is WooCommerce compatible, so we're adding support to WooCommerce
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 255,
			'single_image_width'    => 255,
	        'product_grid'          => array(
	            'default_rows'    => 3,
                'min_rows'        => 2,
                'max_rows'        => 8,
                'default_columns' => 4,
                'min_columns'     => 2,
                'max_columns'     => 5,
	        ),
		) );
        add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		 //for html5 support.
		 $args = array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		);
		add_theme_support("html5", $args);  
		$args = array(
			'width'         => 1200,
			'height'        => 280,
			'flex-width'    => true,
			'flex-height'   => true,
		);
		add_theme_support("custom-header", $args);
		add_theme_support( "align-wide" ) ;

        /**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */

        add_theme_support( 'custom-logo', array(
			'height' 		=> 90,
			'width'			=> 90,
			'flex_height'	=> true,
			'flex_width'	=> true,
		) );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */	
		add_theme_support('post-thumbnails');
        //adding custom image size.
        add_image_size('ibsf_slider',1920,800,array('center','center'));
        add_image_size('ibsf_blog',960,640,array('center','center'));
		
        if ( ! isset( $content_width ) ) {
            $content_width = 600;
        }

		add_theme_support('title-tag');
		//add background image
		add_theme_support("custom-background");
} 
endif;      
add_action('after_setup_theme','ibsf_config',0);
/**
 * If WooCommerce is active, we want to enqueue a file
 * with a couple of template overrides
 */
if(class_exists('WooCommerce')){
    //to call the wc-modifications file.
    require get_template_directory().'/inc/wc-modifications.php';
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'ibsf_woocommerce_header_add_to_cart_fragment' );

function ibsf_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}



/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 */
add_action( 'widgets_init', 'ibsf_sidebars' );

function ibsf_sidebars(){
	register_sidebar( array(
		'name'			=> esc_html__('Boom Festive Main Sidebar','boom-festive'),
		'id'			=> 'boom-festive-sidebar-1',
		'description'	=> esc_html__('Drag and drop your widgets here','boom-festive'),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
	register_sidebar( array(
		'name'			=> esc_html__('Boom Festive Shop Sidebar','boom-festive'),
		'id'			=> 'boom-festive-sidebar-shop',
		'description'	=> esc_html__('Drag and drop your Woocommerce  widgets here','boom-festive'),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
	register_sidebar( array(
		'name'			=> esc_html__('Boom Festive Footer Sidebar 1','boom-festive'),
		'id'			=> 'boom-festive-sidebar-footer1',
		'description'	=> esc_html__('Drag and drop your widgets here','boom-festive'),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );

	register_sidebar( array(
		'name'			=> esc_html__('Boom Festive Footer Sidebar 2','boom-festive'),
		'id'			=> 'boom-festive-sidebar-footer2',
		'description'	=> esc_html__('Drag and drop your widgets here','boom-festive'),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
	register_sidebar( array(
		'name'			=> esc_html__('Boom Festive Footer Sidebar 3','boom-festive'),
		'id'			=> 'boom-festive-sidebar-footer3',
		'description'	=> esc_html__('Drag and drop your widgets here','boom-festive'),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s widget-wrapper">', 
		'after_widget'	=> '</div>',
		'before_title'	=> '<h4 class="widget-title">',
		'after_title'	=> '</h4>',
	) );
}
/**
 * Adds custom classes to the array of body classes.
 */
function ibsf_body_classes( $classes ) {

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'boom-festive-sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if ( ! is_active_sidebar( 'boom-festive-sidebar-shop' ) ) {
		$classes[] = 'no-sidebar-shop';
	}

	if ( ! is_active_sidebar( 'boom-festive-sidebar-footer1' ) && ! is_active_sidebar( 'boom-festive-sidebar-footer2' ) && ! is_active_sidebar( 'boom-festive-sidebar-footer3' ) ) {
		$classes[] = 'no-sidebar-footer';
	}

	return $classes;
}
add_filter( 'body_class', 'ibsf_body_classes' );

/**
 * Adds a shim to wp_body_open backwards compatibility
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
			do_action( 'wp_body_open' );
	}
}


// Add custom theme options panel.
include_once('inc/theme-option/admin_theme_option.php');








