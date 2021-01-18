// Load the theme stylesheets
function theme_styles()  
{ 

	// Example of loading a jQuery slideshow plugin just on the homepage
	wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );

	// Load all of the styles that need to appear on all pages
	wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/custom.css' );

	// Conditionally load the FlexSlider CSS on the homepage
	if(is_page('home')) {
		wp_enqueue_style('flexslider');
	}

}
add_action('wp_enqueue_scripts', 'theme_styles');

// Load the theme stylesheets newest version
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
	wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'), false);	
}
// disables auto updates
add_filter( 'auto_update_theme', '__return_false' );

// hide update notifications
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_themes','remove_core_updates');
