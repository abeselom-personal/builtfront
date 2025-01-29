<?php

$seargin_theme_data = wp_get_theme();

/*
 * Define theme version
 */
define('SEARGIN_VERSION', (WP_DEBUG) ? time() : $seargin_theme_data->get('Version'));

/*
 * Inc folder directory
 */
define('SEARGIN_INC_DIR', get_template_directory() . '/inc/');

/*
 * After setup theme
 */
require_once SEARGIN_INC_DIR . 'theme-setup.php';

/*
 * Load default theme options
 */
 require_once SEARGIN_INC_DIR . 'cs-framework-functions.php';

/*
 * Load meta box and theme options if Codestar framework installed.
 */
if( class_exists( 'CSF' ) ) {
    // require_once SEARGIN_INC_DIR . 'metabox-and-options/metabox-and-options.php';
}

/**
 * Template Functions
 */
require SEARGIN_INC_DIR . 'template-functions.php';

/*
 * Enqueue styles and scripts.
 */
require_once SEARGIN_INC_DIR . 'css-and-js.php';

/*
 * Register widget area
 */
require_once SEARGIN_INC_DIR . 'widget-area-init.php';

/**
 * tgmp functions file
 */
require_once SEARGIN_INC_DIR . 'class-tgm-plugin-activation.php';
require_once SEARGIN_INC_DIR . 'add-plugin.php';

/*
 * Load inline style.
 */
require_once SEARGIN_INC_DIR . 'inline-style.php';

/**
 * Implement the Custom Header feature.
 */
require SEARGIN_INC_DIR . 'custom-header.php';

/**
 * Custom template tags for this theme.
 */
require SEARGIN_INC_DIR . 'class-wp-seargin-navwalker.php';

/**
 * seargin Core Functions
 */
require SEARGIN_INC_DIR . 'seargin-helper-class.php';

/**
 * Customizer additions.
 */
require SEARGIN_INC_DIR . '/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require SEARGIN_INC_DIR . '/jetpack.php';
}

/*
 * Comment Template
 */
require_once SEARGIN_INC_DIR . 'comment-template.php';

/*
 * Import Demo Content
 */
require_once SEARGIN_INC_DIR . 'demo-content/import-demo-content.php';


/**
 * Remove Action Hook
 */

function seargin_woo_theme_init(){
    $seargin_exlude_hooks = require SEARGIN_INC_DIR . '/remove_actions.php';
    foreach( $seargin_exlude_hooks as $k => $v )
    {
        foreach( $v as $value )
            remove_action( $k, $value[0], $value[1] );
    }

}
add_action( 'init', 'seargin_woo_theme_init');


