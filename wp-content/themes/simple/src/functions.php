<?php // ==== FUNCTIONS ==== //

// Load the configuration file for this installation; all options are set here
if ( is_readable( trailingslashit( get_stylesheet_directory() ) . 'functions-config.php' ) )
  require_once( trailingslashit( get_stylesheet_directory() ) . 'functions-config.php' );

// Load configuration defaults for this theme; anything not set in the custom configuration (above) will be set here
require_once( trailingslashit( get_stylesheet_directory() ) . 'functions-config-defaults.php' );

// An example of how to manage loading front-end assets (scripts, styles, and fonts)
require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/assets.php' );

// Required to demonstrate WP AJAX Page Loader (as WordPress doesn't ship with simple post navigation functions)
require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/navigation.php' );

// Only the bare minimum to get the theme up and running
function voidx_setup() {

  // Language loading
  load_theme_textdomain( 'voidx', trailingslashit( get_template_directory() ) . 'languages' );

  // HTML5 support; mainly here to get rid of some nasty default styling that WordPress used to inject
  add_theme_support( 'html5', array( 'search-form', 'gallery' ) );

  // $content_width limits the size of the largest image size available via the media uploader
  // It should be set once and left alone apart from that; don't do anything fancy with it; it is part of WordPress core
  global $content_width;
  if ( !isset( $content_width ) || !is_int( $content_width ) )
    $content_width = (int) 960;

  // Register header and footer menus
  register_nav_menu( 'header', __( 'Header menu', 'voidx' ) );
  register_nav_menu( 'footer', __( 'Footer menu', 'voidx' ) );

}
add_action( 'after_setup_theme', 'voidx_setup', 11 );

// Sidebar declaration
function voidx_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Main sidebar', 'voidx' ),
    'id'            => 'sidebar-main',
    'description'   => __( 'Appears to the right side of most posts and pages.', 'voidx' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>'
  ) );
}
add_action( 'widgets_init', 'voidx_widgets_init' );


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_home',
		'title' => 'Home',
		'fields' => array (
			array (
				'key' => 'field_56c2a866ad1e9',
				'label' => 'Background Image',
				'name' => 'background_image',
				'type' => 'image',
				'instructions' => 'Add the background image.',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_56c2a7889e62e',
				'label' => 'Intro Text',
				'name' => 'intro_text',
				'type' => 'text',
				'instructions' => 'Add the intro text.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'An Introduction to:',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56c2a7a79e62f',
				'label' => 'Button Label',
				'name' => 'button_label',
				'type' => 'text',
				'instructions' => 'Add the button label.',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'Learn More',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56c2a7c59e630',
				'label' => 'Overlay Item',
				'name' => 'overlay_item',
				'type' => 'repeater',
				'instructions' => 'Add an overlay item.',
				'required' => 1,
				'sub_fields' => array (
					array (
						'key' => 'field_56c2a7e49e631',
						'label' => 'Overlay Title',
						'name' => 'overlay_title',
						'type' => 'text',
						'instructions' => 'Add the overlay title.',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'placeholder' => 'Bio',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_56c2a80a9e632',
						'label' => 'Overlay Text',
						'name' => 'overlay_text',
						'type' => 'wysiwyg',
						'instructions' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi modi pariatur enim ipsa aliquam temporibus minima. Eos veniam ullam, ut.',
						'required' => 1,
						'column_width' => '',
						'default_value' => '',
						'toolbar' => 'basic',
						'media_upload' => 'no',
					),
				),
				'row_min' => 4,
				'row_limit' => 4,
				'layout' => 'row',
				'button_label' => 'Add item.',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'index.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
