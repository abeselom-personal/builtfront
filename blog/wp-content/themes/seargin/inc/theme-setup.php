<?php
/*
 * After setup theme
 */

if ( ! function_exists( 'seargin_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function seargin_setup() {

		// Load text domain
		load_theme_textdomain( 'seargin', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Title tag
		add_theme_support( 'title-tag' );

		// Post thumbnail
		add_theme_support( 'post-thumbnails' );

		// Post formats
		add_theme_support( 'post-formats', array(
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat'
		) );

        //Woocommerc
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-slider' );

		//Custom image size
		add_image_size( 'seargin-large', 1300, 700, true );
		add_image_size( 'seargin-medium', 500, 400, true );
		add_image_size( 'seargin-portfolio', 600, 670, true );

		// Register navigation menus
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'seargin' ),
		) );

		// HTML5 markup
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'seargin_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Gutenberg
		add_theme_support(
			'gutenberg',
			array( 'wide-images' => true )
		);

		// Align wide
		add_theme_support( 'align-wide' );

		// Block style
		add_theme_support( 'wp-block-styles' );

		// Default color palette
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Deep Black', 'seargin' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => esc_html__( 'Medium Black', 'seargin' ),
				'slug'  => 'medium-black',
				'color' => '#131923',
			),
			array(
				'name'  => esc_html__( 'Light Green', 'seargin' ),
				'slug'  => 'light-green',
				'color' => '#00fcfa',
			),

			array(
				'name'  => esc_html__( 'Deep Blue', 'seargin' ),
				'slug'  => 'Deep-blue',
				'color' => '#003796',
			),

			array(
				'name'  => esc_html__( 'Loght Yellow', 'seargin' ),
				'slug'  => 'light-yellow',
				'color' => '#ffe34c',
			),
		) );

		// Editor style
		add_theme_support( 'editor-styles' );

		// Editor style css
		add_editor_style( 'assets/css/theme-editor-style.css' );

		// remove block widget support
		remove_theme_support( 'widgets-block-editor' );
	}
endif;
add_action( 'after_setup_theme', 'seargin_setup' );


//Set the content width in pixels, based on the theme's design and stylesheet.
function seargin_content_width() {

	//Default content width.
	$GLOBALS['content_width'] = apply_filters( 'seargin_content_width', 1140 );
}
add_action( 'after_setup_theme', 'seargin_content_width', 0 );