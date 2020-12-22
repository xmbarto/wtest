<?php

/*
@package barto theme

====================
ADMIN PAGE
====================
*/

function barto_add_admin_page(){
    add_menu_page( 
        'Barto Theme Options', 
        'Barto', 
        'manage_options', 
        'mxbarto',
        'barto_theme_create_page',
        ''
    );
}

add_action('admin_menu','barto_add_admin_page');

function barto_theme_creatye_page(){

}