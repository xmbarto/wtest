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
    register_setting( 'mxbarto-settings-group', 'profile_picture'  );
    register_setting( 'mxbarto-settings-group', 'first_name'  );
    register_setting( 'mxbarto-settings-group', 'last_name'  );
    register_setting( 'mxbarto-settings-group', 'user_description' );
    register_setting( 'mxbarto-settings-group', 'twitter_handler', 'mxbarto_sanitize_twitter_handler'  );
    register_setting( 'mxbarto-settings-group', 'facebook_handler', 'mxbarto_sanitize_facebook_handler'  );
    register_setting( 'mxbarto-settings-group', 'instagram_handler', 'mxbarto_sanitize_instagram_handler'  );

    add_settings_section( 'mxbarto-sidebar-options', 'Sidebar Options', 'mxbarto_sidebar_options', 'mxbarto' );
    
    add_settings_field( 'sidebar-profile', 'Profile Picture', 'mxbarto_sidebar_picture', 'mxbarto', 'mxbarto-sidebar-options', );
    add_settings_field( 'sidebar-name', 'Full name', 'mxbarto_sidebar_name', 'mxbarto', 'mxbarto-sidebar-options', );
    add_settings_field( 'sidebar-user-description', 'Description', 'mxbarto_sidebar_user_description', 'mxbarto', 'mxbarto-sidebar-options', );
    add_settings_field( 'sidebar-twitter', 'Twitter account', 'mxbarto_sidebar_twitter', 'mxbarto', 'mxbarto-sidebar-options', );
    add_settings_field( 'sidebar-facebook', 'Facebook account', 'mxbarto_sidebar_facebook', 'mxbarto', 'mxbarto-sidebar-options', );
    add_settings_field( 'sidebar-instagram', 'Instagram account', 'mxbarto_sidebar_instagram', 'mxbarto', 'mxbarto-sidebar-options', );
}

function mxbarto_sidebar_options(){
    echo 'Customize your sidebar information';
}

function mxbarto_sidebar_picture(){
    $picture = esc_attr( get_option( 'profile_picture' ) );
    echo    '<input type="hidden" name="profile_picture" value="'.$picture.'"/>
            <input type="button" value="Upload Profile Picture" class="button secondary-button" id="mxbarto-upload-button"/>';
}

function mxbarto_sidebar_name(){
    $firstName = esc_attr( get_option( 'first_name' ) ) ;
    $lastName = esc_attr( get_option( 'last_name' ) ) ;
    echo    '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First name"/>
            <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last name"/>';
}

function mxbarto_sidebar_user_description(){
    $userDescription = esc_attr( get_option( 'user_description') );
    echo 
        '<input type="text" name="user_description" value="'.$userDescription.'" placeholder="Description"/>
        <p class="description">Write something smart.</p>';
}

function mxbarto_sidebar_twitter(){
    $twitter = esc_attr( get_option( 'twitter_handler' ) ) ;
    echo    
        '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter account"/>
        <p class="description">Input your Twitter username without the @ character</p>';
}

function mxbarto_sidebar_facebook(){
    $facebook = esc_attr( get_option( 'facebook_handler' ) ) ;
    echo    '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook account"/>';
}

function mxbarto_sidebar_instagram(){
    $instagram = esc_attr( get_option( 'instagram_handler' ) ) ;
    echo    
        '<input type="text" name="instagram_handler" value="'.$instagram.'" placeholder="Instagram account"/>
        <p class="description">Input your Instagram username without the @ character</p>';
}

//Sanitization settings

function mxbarto_sanitize_twitter_handler($input){
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output;
}

function mxbarto_sanitize_facebook_handler($input){
    $output = sanitize_text_field($input);
    return $output;
}

function mxbarto_sanitize_instagram_handler($input){
    $output = sanitize_text_field($input);
    $output = str_replace('@', '', $output);
    return $output;
}