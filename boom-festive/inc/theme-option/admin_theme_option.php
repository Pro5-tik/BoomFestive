<?php
/*
* Enqueue CSS
*/
function theme_option_custom_css(){
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/inc/bootstrap.min.css', array(), '4.3.1', 'all' );
	wp_enqueue_style('theme_option_custom_css', get_template_directory_uri().'/inc/theme-option/theme_option_custom.css', array(), '1.0.0', 'all');
    
}
add_action( 'admin_enqueue_scripts', 'theme_option_custom_css' );

// Add Theme Options Page
add_action("admin_menu","ibsf_theme_options");
function ibsf_theme_options(){
	//Generate Boom Festive Admin Page(main).
	add_menu_page(
		"Boom Festive Theme Options", //page title.
		"Boom Festive", //Menu title.
		"manage_options", //capability
		"boom_festive",//menu slug
		"ibsf_theme_header_settings",//callback function
		"dashicons-buddicons-friends"//icon			
	);

}
//callback functions
function ibsf_theme_header_settings(){
    require_once(get_template_directory() . '/inc/theme-option/header_option.php');
}

//Theme Options Settings page.
function theme_options_setting(){
	//step-1(For General section)
	add_settings_section( 
		"section",
		 "General Page", 
		 null, 
		 "boom_festive" );
	//step-2(Site Logo,Site Title,Site tagline)
	add_settings_field(
		"sl",
		"Site Logo",
		"display_site_logo",//callback functions
		"boom_festive",
		"section"
	);
	add_settings_field(
		"site_title",
		"Site Title",
		"display_site_title",//callback functions
		"boom_festive",
		"section"
	);
	add_settings_field(
		"site_tagline",
		"Site Tagline",
		"display_site_tagline",//callback functions
		"boom_festive",
		"section"
	);
	// step #3 We need to add this(channel_name) setting to area
	register_setting("section","sl");
	register_setting("section","site_title");
	register_setting("section","site_tagline");

	//For Header Section
	add_settings_section( 
		"header_section",
		 "Header page", 
		 null, 
		 "boom_festive1" );
	//step-2
	add_settings_field(
		"header_bg_color",
		"Header Background Color",
		"display_header_bg_color",//callback functions
		"boom_festive1",
		"header_section"
	);
	// step #3 We need to add this setting to area
	register_setting("header_section","header_bg_color");

	//For Footer Section.
	add_settings_section( 
		"footer_section",
		 "Footer page", 
		 null, 
		 "boom_festive2" 
		);
	//1)Footer Bg Color
	add_settings_field(
	"footer_bg_section",
	"Footer Background  Color",
	"display_footer_bg",//callback functions
	"boom_festive2",
	"footer_section"
	);
	//2)Copyright Section.
	add_settings_field(
		"copyright_sec",
		"Copyright Section",
		"display_copy_sec",//callback functions
		"boom_festive2",
		"footer_section"
	);
	//3)Footer Menu text Color
	add_settings_field(
		"footer_menu_text_section",
		"Footer Menu Text  Color",
		"display_footer_menu_text_color",//callback functions
		"boom_festive2",
		"footer_section"
	);
	//Register Section
	register_setting("footer_section","footer_bg_section");
	register_setting("footer_section","copyright_sec");
	register_setting("footer_section","footer_menu_text_section");

	//For Background Section.
	add_settings_section( 
		"background_section",
		 "Bakground page", 
		  null, 
		 "boom_festive3" );
	//step-2
	add_settings_field(
		"background_color",
		"Background Color",
		"display_background_color",//callback functions
		"boom_festive3",
		"background_section"
	);
	// step #3 We need to add this setting to area
	register_setting("background_section","background_color");


}
add_action("admin_init","theme_options_setting");

//add call back fuctions for General section
function display_site_logo(){
	$sl = get_option('sl');
    ?>
    <input type="file" name="sl" accept="image/*" />
    <?php
    if ($sl) {
        echo '<p>Current Logo:</p>';
        echo '<img src="' . esc_url($sl) . '" style="max-width: 200px;" />';
    }
}

function display_site_title(){
	$site_title = get_option('site_title', get_bloginfo('name'));
    echo '<input type="text" name="site_title" value="' . esc_attr($site_title) . '" />';
}

function display_site_tagline(){
	$site_tagline = get_option('site_tagline', get_bloginfo('description'));
    echo '<input type="text" name="site_tagline" value="' . esc_attr($site_tagline) . '" />';
}

//callback function for header section
function display_header_bg_color(){
	$header_bg_color = get_option('header_bg_color', '#333'); // Default color if option is not set
    echo '<input type="color" name="header_bg_color" value="' . esc_attr($header_bg_color) . '" />';
}

//callback function for footer section
function display_copy_sec(){
	?>
	<input type="text" name="copyright_sec" value="<?php echo get_option('copyright_sec');?>" id="copyright_sec"/>
	<?php
}

function display_footer_bg(){
	$footer_bg_section = get_option('footer_bg_section', '#333'); // Default color if option is not set
    echo '<input type="color" name="footer_bg_section" value="' . esc_attr($footer_bg_section) . '" />';
}

function display_footer_menu_text_color(){
	$footer_menu_text_section = get_option('footer_menu_text_section', '#333'); // Default color if option is not set
    echo '<input type="color" name="footer_menu_text_section" value="' . esc_attr($footer_menu_text_section) . '" />';
}

//callback function for Background.
function display_background_color(){
	$background_color = get_option('background_color', '#ffffff'); // Default color if option is not set
    echo '<input type="color" name="background_color" value="' . esc_attr($background_color) . '" />';
}
