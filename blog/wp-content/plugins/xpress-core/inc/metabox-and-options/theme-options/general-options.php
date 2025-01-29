<?php

// Create general section
CSF::createSection( $seargin_theme_option, array(
	'title'  => esc_html__( 'General Options', 'xpress-core' ),
	'id'     => 'general_options',
	'icon'   => 'fa fa-google',
	'fields' => array(

		array(
			'id'     => 'theme_primary_color',
			'type'   => 'color',
			'title'  => esc_html__( 'Primary Color', 'xpress-core' ),
			'desc'   => esc_html__( 'You can change other colors from individual Elemenotor widget\'settings.', 'xpress-core' ),
		),
		array(
			'id'     => 'theme_secondary_color',
			'type'   => 'color',
			'title'  => esc_html__( 'Secondary Color', 'xpress-core' ),
			'desc'   => esc_html__( 'You can change other colors from individual Elemenotor widget\'settings.', 'xpress-core' ),
		),
        array(
            'id'      => 'scroll_up_btn',
            'title'   => esc_html__( 'Scroll Up Button', 'xpress-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Scroll Up Button Hide Show', 'xpress-core' ),
            'default' => true,
        ),
        array(
            'id'      => 'preloader_enable',
            'title'   => esc_html__( 'Enable Preloader', 'xpress-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Enable or Disable Preloader', 'xpress-core' ),
            'default' => true,
        ),
        array(
            'id'      => 'sticky_header_enable',
            'title'   => esc_html__( 'Enable Stikcy Header', 'xpress-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Enable or Disable Stikcy Header', 'xpress-core' ),
            'default' => true,
        ),
        array(
            'id'      => 'footer_sticky',
            'title'   => esc_html__( 'Enable Stikcy Footer', 'xpress-core' ),
            'type'    => 'switcher',
            'desc'    => esc_html__( 'Enable or Disable Stikcy Header', 'xpress-core' ),
            'default' => true,
        ),
	)
) );