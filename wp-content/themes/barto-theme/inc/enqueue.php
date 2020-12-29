<?php

/*
@package barto theme

====================
ADMIN PAGE
====================
*/

function mxbarto_loads_admin_scripts($hook){
    echo $hook;
    wp_register_style( 'mxbarto-admin', get_template_directory_uri() . '/css/mxbarto.admin.css', array(), 'all' );
    wp_enqueue_style( 'mxbarto-admin');
}

add_action('admin_enqueue_scripts','mxbarto_loads_admin_scripts');