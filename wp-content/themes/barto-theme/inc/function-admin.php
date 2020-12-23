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

// Functions

function barto_theme_create_page(){
    require_once(get_template_directory() . '/inc/templates/barto-admin.php');
}

function mxbarto_theme_css_page(){

}

function mxbarto_custom_settings(){
    register_setting( 'mxbarto-settings-group', 'first_name'  );
    register_setting( 'mxbarto-settings-group', 'last_name'  );
    register_setting( 'mxbarto-settings-group', 'twitter_handler'  );
    register_setting( 'mxbarto-settings-group', 'facebook_handler'  );
    register_setting( 'mxbarto-settings-group', 'instagram_handler'  );

    add_settings_section( 'mxbarto-sidebar-options', 'Sidebar Options', 'mxbarto_sidebar_options', 'mxbarto' );
    
    add_settings_field( 'sidebar-name', 'Full name', 'mxbarto_sidebar_name', 'mxbarto', 'mxbarto-sidebar-options', );
    add_settings_field( 'sidebar-twitter', 'Twitter account', 'mxbarto_sidebar_twitter', 'mxbarto', 'mxbarto-sidebar-options', );
    add_settings_field( 'sidebar-facebook', 'Facebook account', 'mxbarto_sidebar_facebook', 'mxbarto', 'mxbarto-sidebar-options', );
    add_settings_field( 'sidebar-instagram', 'Instagram account', 'mxbarto_sidebar_instagram', 'mxbarto', 'mxbarto-sidebar-options', );
}

function mxbarto_sidebar_options(){
    echo 'Customize your sidebar information';
}

function mxbarto_sidebar_name(){
    $firstName = esc_attr( get_option( 'first_name' ) ) ;
    $firstName = esc_attr( get_option( 'last_name' ) ) ;
    echo    '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First name"/>
            <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last name"/>';
}

function mxbarto_sidebar_twitter(){
    $twitter = esc_attr( get_option( 'twitter_handler' ) ) ;
    echo    '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter account"/>';
}

function mxbarto_sidebar_facebook(){
    $facebook = esc_attr( get_option( 'facebook_handler' ) ) ;
    echo    '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook account"/>';
}

function mxbarto_sidebar_instagram(){
    $instagram = esc_attr( get_option( 'instagram_handler' ) ) ;
    echo    '<input type="text" name="instagram_handler" value="'.$instagram.'" placeholder="Instagram account"/>';
}