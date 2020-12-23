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

    // Generate Barto Admin Subpages
    // Settings
    add_submenu_page('mxbarto', 'Barto Theme Options', 'Settings', 'manage_options', 'mxbarto', 'mxbarto_theme_create_page');
    // CSS
    add_submenu_page( 'mxbarto', 'CSS Settings', 'CSS', 'manage_options', 'mxbarto_css', 'mxbarto_theme_css_page', );

    //Activate custom settings
    add_action( 'admin_init', 'mxbarto_custom_settings' );


}

add_action('admin_menu','barto_add_admin_page');

function barto_theme_create_page(){
    require_once(get_template_directory() . '/inc/templates/barto-admin.php');
}

function mxbarto_theme_css_page(){

}

function mxbarto_custom_settings(){
    register_setting( 'mxbarto-settings-group', 'first_name'  );
    add_settings_section( 'mxbarto-sidebar-options', 'Sidebar Options', 'mxbarto_sidebar_options', 'mxbarto' );
}

function mxbarto_sidebar_options(){
    echo 'Customize your sidebar information';
}