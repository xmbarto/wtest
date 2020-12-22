<?php

/*
@package barto theme

====================
ADMIN PAGE
====================
*/

function barto_add_admin_page(){
    // Generate Barto Admin Page
    add_menu_page( 'Barto Theme Options', 'Barto', 'manage_options', 'mxbarto','barto_theme_create_page','dashicons-editor-bold', 110 );

    // Generate Barto Admin Subpage
    add_submenu_page('mxbarto', 'Barto Theme Options', 'Settings', 'manage_options', 'mxbarto', 'mxbarto_theme_create_page');

    add_submenu_page( 'mxbarto', 'CSS Settings', 'CSS', 'manage_options', 'mxbarto_css', 'mxbarto_theme_css_page', );
}

add_action('admin_menu','barto_add_admin_page');

function barto_theme_create_page(){
    require_once(get_template_directory() . '/inc/templates/barto-admin.php');
}

function mxbarto_theme_css_page(){

}