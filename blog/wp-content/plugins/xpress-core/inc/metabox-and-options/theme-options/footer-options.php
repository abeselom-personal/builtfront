<?php
// Create Footer section

CSF::createSection( $seargin_theme_option, array(
	'title'  => esc_html__( 'Footer Options', 'xpress-core' ),
	'icon'   => 'fa fa-credit-card',
	'fields' => array(
        array(
            'id'          => 'footer_style',
            'type'        => 'select',
            'chosen'      => true,
            'title'       => __('Select Footer Style', 'xpress-core' ),
            'options'     => Seargin_Plugin_Helper::get_footer_types(),
        ),

        array(
            'id'            => 'footer_copyright',
            'type'          => 'wp_editor',
            'title'         => esc_html__( 'Copyright Text', 'xpress-core' ),
            'desc'          => esc_html__( 'Type site copyright text here.', 'xpress-core' ),
            'tinymce'       => true,
            'quicktags'     => true,
            'default'         => esc_html__( '© Seargin 2023 | All Right Reserved', 'xpress-core' ),
            'media_buttons' => false,
        ),

	)
) );



























