<?php

$seargin_temp_meta = 'seargin_temp_meta';

CSF::createMetabox( $seargin_temp_meta, array(
    'title'     => 'Template Type',
    'post_type' => array('seargin_template'),
    'data_type' => 'unserialize'
) );

// Header Section
CSF::createSection( $seargin_temp_meta, array(
    'fields' => array(
        array(
            'id'          => 'seargin_template_type',
            'type'        => 'select',
            'chosen'      => true,
            'title'       => 'Select Template Type',
            'placeholder' => 'Select Template Type',
            'options'     => array(
                'tf_header_key'  => 'Header',
                'tf_footer_key'  => 'Footer',
            ),
            'default'     => ''
        ),
    ),
) );
