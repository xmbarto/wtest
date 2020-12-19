<?php
/**
 * Plugin Name:       b-plugin
 * Plugin URI:        https://mxbarto.com.ar/wtest
 * Description:       My first wp plugin.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Maxi Bartolozzi
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       b-plugin
 * Domain Path:       /languages
 */

add_filter( 'the_title', 'mxbarto_filter_title' );
function mxbarto_filter_title( $title ) {
    return 'The ' . $title;
}
