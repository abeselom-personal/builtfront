<?php


/**
 * Enqueue styles and scripts.
 */
function seargin_enqueue_css_and_js() {

    /*
     * Load Google fonts.
     * User can customized this default fonts from theme options
     */
    function seargin_fonts_url() {
        $fonts_url = '';
        $fonts     = [];
        $subsets   = 'latin,latin-ext';

        if ( 'off' !== _x( 'on', 'DM Sans: on or off', 'seargin' ) ) {
            $fonts[] = 'DM Sans:400,500,600,700';
        }

        if ( 'off' !== _x( 'on', 'Poppins: on or off', 'seargin' ) ) {
            $fonts[] = 'Poppins:300,400,500,600,700';
        }

        if ( 'off' !== _x( 'on', 'Lato: on or off', 'seargin' ) ) {
            $fonts[] = 'Lato:300,400,700';
        }

        if ( 'off' !== _x( 'on', 'Noto Serif Display: on or off', 'seargin' ) ) {
            $fonts[] = 'Noto Serif Display:400,500,600,700';
        }

        if ( 'off' !== _x( 'on', 'Raleway: on or off', 'seargin' ) ) {
            $fonts[] = 'Raleway:400,500,600,700';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $fonts_url );
    }

    wp_enqueue_style( 'seargin-googlefonts', seargin_fonts_url(), [], null );

    // Enqueue Style
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( 'assets/css/bootstrap.min.css' ), array(), '5.0.', 'all' );

    wp_enqueue_style( 'font-awesome-5', get_theme_file_uri( 'assets/css/fontawesome.css' ), array(), '5.13.0', 'all' );
    
    wp_enqueue_style( 'e-animations', get_theme_file_uri( 'assets/css/animate.css' ), array(), '3.5.1', 'all' );

    wp_enqueue_style( 'swiper-seargin', get_theme_file_uri( 'assets/css/swiper.min.css' ), array(), '6.6.1', 'all' );

    wp_enqueue_style( 'odometer', get_theme_file_uri( 'assets/css/odometer.css' ), array(), '0.4.8', 'all' );

    wp_enqueue_style( 'nice-select', get_theme_file_uri( 'assets/css/nice-select.css' ), array(), '1.0.0', 'all' );

    wp_enqueue_style( 'magnific-popup', get_theme_file_uri( 'assets/css/magnific-popup.css' ), array(), '3.1.9', 'all' );

    wp_enqueue_style( 'seargin-core', get_theme_file_uri( 'assets/css/seargin-core.css' ), array(), SEARGIN_VERSION, 'all' );

    wp_enqueue_style( 'seargin-main', get_theme_file_uri( 'assets/css/main.css' ), array(), SEARGIN_VERSION, 'all' );

    wp_enqueue_style( 'seargin-style', get_stylesheet_uri(), array(), SEARGIN_VERSION, 'all' );

    if ( class_exists('WooCommerce') ) {
        wp_enqueue_style( 'woocommerce-style', get_template_directory_uri() . '/woocommerce/woocommerce.css' );
    }

    // Enqueue script

    wp_enqueue_script( 'bootstrap', get_theme_file_uri( 'assets/js/bootstrap.bundle.min.js' ), array( 'jquery' ), '5.0.0', true );

    wp_enqueue_script( 'swiper-slider', get_theme_file_uri( 'assets/js/swiper.min.js' ), array( 'jquery' ), '6.7.0', true );

    wp_enqueue_script( 'wow', get_theme_file_uri( 'assets/js/wow.min.js' ), array( 'jquery' ), '1.1.3', true );

    wp_enqueue_script( 'appear', get_theme_file_uri( 'assets/js/appear.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'odometer', get_theme_file_uri( 'assets/js/odometer.min.js' ), array( 'jquery' ), '0.4.8', true );

    wp_enqueue_script( 'nice-select', get_theme_file_uri( 'assets/js/jquery.nice-select.min.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'animated-heading', get_theme_file_uri( 'assets/js/animated-heading.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'imagesloaded', get_theme_file_uri( 'assets/js/imagesloaded.pkgd.min.js' ), array( 'jquery' ), '4.1.4', true );

    wp_enqueue_script( 'theia-sticky-sidebar', get_theme_file_uri( 'assets/js/theia-sticky-sidebar.min.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'marquee', get_theme_file_uri( 'assets/js/jquery.marquee.min.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'isotope', get_theme_file_uri( 'assets/js/isotope.pkgd.min.js' ), array( 'jquery' ), '3.0.5', true );

    wp_enqueue_script( 'magnific-popup', get_theme_file_uri( 'assets/js/jquery.magnific-popup.min.js' ), array( 'jquery' ), '1.1.0', true );

    wp_enqueue_script( 'parallax', get_theme_file_uri( 'assets/js/parallax.min.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'touchspin', get_theme_file_uri( 'assets/js/touchspin.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'parallax-scroll', get_theme_file_uri( 'assets/js/parallax-scroll.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'jarallax', get_theme_file_uri( 'assets/js/jarallax.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'easing', get_theme_file_uri( 'assets/js/easing.min.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'scrollspy', get_theme_file_uri( 'assets/js/scrollspy.js' ), array( 'jquery' ), '1.0.0', true );

    wp_enqueue_script( 'seargin-main', get_theme_file_uri( 'assets/js/main.js' ), array( 'jquery' ), SEARGIN_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'seargin_enqueue_css_and_js' );

/**
 * Enqueue Backend Styles And Scripts.
 **/

function seargin_backend_css_js( $screen ) {

    if ( $screen == "widgets.php" ) {
        wp_enqueue_media();
        wp_enqueue_script( 'seargin-media-upload', get_theme_file_uri( 'assets/js/media-upload.js' ), array( 'jquery' ), '1.0.0', true );
    }
}

add_action( 'admin_enqueue_scripts', 'seargin_backend_css_js' );