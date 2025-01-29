<?php
$seargin_career_metabox = 'seargin_career_meta';

CSF::createMetabox( $seargin_career_metabox, array(
    'title'     => 'Career Options',
    'post_type' => 'seargin_career',
    'menu_position'=>0,
) );

// Header Section
CSF::createSection( $seargin_career_metabox, array(
    'fields' => array(

        array(
            'id'    => 'job_location',
            'type'  => 'text',
            'title' => esc_html__( 'Job Location', 'xpress-core' ),
            'desc' => esc_html__( 'Job Locaiton Means Remote / In House Job', 'xpress-core' ),
        ),
        array(
            'id'    => 'job_time',
            'type'  => 'text',
            'title' => esc_html__( 'Job Time', 'xpress-core' ),
            'desc' => esc_html__( 'Job Time Means Full Time / Part Time Job', 'xpress-core' ),
        ),
    ),
) );