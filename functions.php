<?php
/**
 * snow functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package snow
 */

if ( ! function_exists( 'snow_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function snow_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on snow, use a find and replace
	 * to change 'snow' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'snow', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'snow' ),
		'social' => esc_html__( 'Social', 'snow' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'snow_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
function mytheme_setup_theme_supported_features() {

	// Format large
	add_theme_support( 'align-wide' );

}
add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );

add_action( 'after_setup_theme', 'snow_setup' );


// LOAD Snow CORE (if you remove this, the theme will break)
require_once( 'inc/snow.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
require_once( 'inc/admin.php' );


// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
 require_once( 'inc/custom-post-type.php' );

 //Allow editor style.
   //add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

/* ADD woocommerce to the theme
      add_action( 'after_setup_theme', 'woocommerce_support' );
	   <function woocommerce_support() {
	       add_theme_support( 'woocommerce' );
	   }
		 add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
echo '<section class="entry-content cf" itemprop="articleBody">';
}

function my_theme_wrapper_end() {
echo '</section>';
}

*/

	 remove_action('wp_head', 'print_emoji_detection_script', 7);
	 remove_action('admin_print_scripts', 'print_emoji_detection_script');
	 remove_action('wp_print_styles', 'print_emoji_styles');
	 remove_action('admin_print_styles', 'print_emoji_styles');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function snow_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'snow_content_width', 640 );
}
add_action( 'after_setup_theme', 'snow_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function snow_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'snow' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Footer-1', 'snow' ),
		'id'            => 'footer_1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s footer-w-align">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',

	) );register_sidebar( array(
		'name'          => esc_html__( 'Footer-2', 'snow' ),
		'id'            => 'footer_2',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s footer-w-align">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );register_sidebar( array(
		'name'          => esc_html__( 'footer-3', 'snow' ),
		'id'            => 'footer_3',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s footer-w-align">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'snow_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function snow_scripts() {
	// register main stylesheet
	wp_enqueue_style( 'snow-style', get_template_directory_uri(). '/css/style.css', array(), '', 'all' );

    	wp_enqueue_style( 'animate', get_template_directory_uri(). '/css/aos.css', array(), '', 'all' );
       wp_enqueue_script( 'scroll', get_template_directory_uri() . '/js/owl.carousel.js', array(), '20151215', true );

	wp_enqueue_script( 'snow-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', array(), '20151215', true );
		wp_enqueue_script( 'sidr', get_template_directory_uri() . '/js/jquery.sidr.min.js', array(), '20151215', true );

		wp_enqueue_script( 'snow-scripts', get_template_directory_uri() . '/js/my_scripts.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'snow_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function ra_change_translate_text_multiple( $translated ) {
	$text = array(
		'This carousel is empty, please add some logos.' => 'Aucun sponsor de ce niveau actuellement… Pourquoi pas vous ?
		<a href="info@piousse.ch"></a>info@piousse.ch</a>
		',
		//'Old Text 2' => 'New Translation 2',
	);
	$translated = str_ireplace(  array_keys($text),  $text,  $translated );
	return $translated;
}
add_filter( 'gettext', 'ra_change_translate_text_multiple', 20 );
