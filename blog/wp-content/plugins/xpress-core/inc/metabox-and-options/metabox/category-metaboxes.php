<?php

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $seargin_category_meta = 'seargin_category_color';

    //
    // Create taxonomy options
    CSF::createTaxonomyOptions( $seargin_category_meta, array(
        'taxonomy'  => 'category',
        'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
    ) );

    //
    // Create a section
    CSF::createSection( $seargin_category_meta, array(
        'fields' => array(
            array(
                'id'    => 'cat-color',
                'type'  => 'color',
                'title' => 'Color',
            ),

        )
    ) );

}