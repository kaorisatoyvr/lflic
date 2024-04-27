<?php
/**
 * LFLIC functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LFLIC
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lflic_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on LFLIC, use a find and replace
		* to change 'lflic' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'lflic', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'lflic' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'lflic_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'lflic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lflic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lflic_content_width', 640 );
}
add_action( 'after_setup_theme', 'lflic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lflic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lflic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lflic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'lflic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lflic_scripts() {

	 // Enqueue the main stylesheet
	wp_enqueue_style( 'lflic-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'lflic-style', 'rtl', 'replace' );

	// Enqueue the navigation JavaScript file
	wp_enqueue_script( 'lflic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	// Check if it's a singular page with open comments and threaded comments enabled
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Enqueue Swiper on the Homepage
	if (is_front_page()) {
		wp_enqueue_script('swiper-scripts', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), '11.0.4', array('strategy' => 'defer'));
		wp_enqueue_script('swiper-configs', get_template_directory_uri() . '/js/swiper-configs.js', array('swiper-scripts'), _S_VERSION, array('strategy' => 'defer'));
	}

	// Google Fonts
	wp_enqueue_style(
		'silk-googlefonts',
		'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Playfair+Display:wght@400;700;900&display=swap',
		array(),
		null, // only use null for Google Fonts
		'all'
	);

	wp_enqueue_script('jquery');
    
    // Enqueue your script with jQuery as a dependency
    wp_enqueue_script(
        'hamburger-script',
        get_stylesheet_directory_uri() . '/js/hamburger.js', // Use get_stylesheet_directory_uri() for child themes
        array('jquery'), // jQuery is now a dependency
        null,
        true
    );

}
add_action( 'wp_enqueue_scripts', 'lflic_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Add menu
register_nav_menus( 
    array(
        'header' => esc_html__( 'Header Menu Location', 'lflic' ),
        'footer-left' => esc_html__( 'Footer - Left Side', 'lflic' ),
		'footer-right' => esc_html__( 'Footer - Right Side', 'lflic' ),
		'mobile-header' => esc_html__('Mobile Header - Hamburger', 'lflic'),
    )
);

// Add custom crop sizes
add_image_size( 'portrait-blog', 200, 9999 );
// hard crop mode
add_image_size( 'portrait-blog-crop', 200, 250, true );
// hard crop right top positioning
add_image_size( 'your-custom-size', 250, 250, array( 'right', 'top' ) );

// adding CPTs
require get_template_directory() . '/inc/cpt-taxonomy.php';

// block block editor
add_filter('use_block_editor_for_post', 'disable_block_editor_for_specific_page', 10, 2);
add_filter('gutenberg_can_edit_post_type', 'disable_block_editor_for_specific_page', 10, 2);
function disable_block_editor_for_specific_page($can_edit, $post) {
    // Replace 123 with the ID of the specific page where you want to disable the editors
    if ($post->ID === 2) {
        return false;
    }
    return $can_edit;
}

// Remove Posts
function disable_post_creation() {
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'disable_post_creation');

// Remove content editor
add_action('admin_init', 'remove_editor_init');
function remove_editor_init() {
    // Array of page IDs where you want to remove the editor
    $page_ids = array(2, 37, 82);
    
    // Check if the current page being edited is one of the specified pages
    if (isset($_GET['post']) && in_array($_GET['post'], $page_ids)) {
        remove_post_type_support('page', 'editor');
    }
}


