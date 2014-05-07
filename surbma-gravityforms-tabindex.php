<?php

/*
Plugin Name: Surbma - Gravity Forms Tabindex Fix
Plugin URI: http://surbma.com/
Description: Fix for Gravity Forms tabindex issue, when more than one forms are displaying on one page.
Version: 1.0.0
Author: Surbma
Author URI: http://surbma.com/
License: GPL2
*/

/**
 * Fix Gravity Form Tabindex Conflicts
 * http://gravitywiz.com/fix-gravity-form-tabindex-conflicts/
 */
function surbma_gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'surbma_gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}
add_filter( 'gform_tabindex', 'surbma_gform_tabindexer', 10, 2 );

