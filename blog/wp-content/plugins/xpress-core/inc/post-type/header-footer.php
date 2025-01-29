<?php
if(!function_exists('seargin_page_template_type')  ){
    function seargin_page_template_type(){
        register_post_type( 'seargin_template',
            array(
                'labels' => array(
                    'name' => __( 'Header & Footer','xpress-core' ),
                    'singular_name' => __( 'Template','xpress-core' ),
                ),
                'public' => true,
                'rewrite' => array('slug' => 'header-footer'),
                'publicly_queryable' => true,
                'show_in_menu'      => true,
                'menu_icon' => 'dashicons-align-wide',
                'supports' => ['title', 'elementor']
            )
        );
    }
    add_action( 'init','seargin_page_template_type',2 );
}
