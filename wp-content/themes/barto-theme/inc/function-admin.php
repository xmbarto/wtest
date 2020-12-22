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
    add_submenu_page('mxbarto', 'Barto Settings', 'Settings', 'manage_options', 'mxbarto_settings', 'mxbarto_theme_settings_page');

    add_submenu_page( 'mxbarto', 'CSS Settings', 'CSS', 'manage_options', 'mxbarto_css', 'mxbarto_theme_css_page', );
}

add_action('admin_menu','barto_add_admin_page');

function barto_theme_creatye_page(){

}

function mxbarto_theme_settings_page(){
    
}

function mxbarto_theme_css_page(){

}