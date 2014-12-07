<?php

/*
Plugin Name: Surbma - Gravity Forms Tabindex Fix
Plugin URI: http://surbma.com/wordpress-plugins/
Description: Fix for Gravity Forms tabindex issue, when more than one forms are displaying on one page.

Version: 1.1.1

Author: Surbma
Author URI: http://surbma.com/

License: GPLv2

Text Domain: surbma-gravity-forms-tabindex-fix
Domain Path: /languages/
*/

// Localization
function surbma_gravity_forms_tabindex_fix_init() {
	load_plugin_textdomain( 'surbma-gravity-forms-tabindex-fix', false, dirname( plugin_basename( __FILE__ ) . '/languages/' ) );
}
add_action( 'init', 'surbma_gravity_forms_tabindex_fix_init' );

// Fix Gravity Forms Tabindex Conflicts
// http://gravitywiz.com/fix-gravity-form-tabindex-conflicts/
function surbma_gravity_forms_tabindex_fix_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'surbma_gravity_forms_tabindex_fix_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}
add_filter( 'gform_tabindex', 'surbma_gravity_forms_tabindex_fix_tabindexer', 10, 2 );

