<?php
/*
Plugin Name: CountdownW
Plugin URI: 
Description: Countdown widget for star wars 9.
Author: Iacopo Cutino
Version: 1.0
Author URI: www.iacopocutino.it
License: GPL2

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (! defined('ABSPATH')) {
	exit();
}

/**
 * Enqueue countdown script
 **/
function enqueue_script_countdown() {
        wp_register_script( 'jquery.countdown.js', plugins_url('/js/jquery.countdown.js', __FILE__), array('jquery'), '1.0.0' );
        wp_enqueue_script( 'jquery.countdown.js' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_script_countdown' );


/**
 * Enqueue css
 **/
function enqueue_style() {
        wp_register_style( 'style.css', plugins_url('/css/style.css', __FILE__), false, '1.0.0' );
        wp_enqueue_style( 'style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_style' );



// get the class
require_once( plugin_dir_path( __FILE__ )  . 'countdown-class.php' );


/**
* Register Countdown Widget
*/

function register_Countdown_Widget() {
    	register_widget( 'Countdown_Widget' );
	}
	add_action( 'widgets_init', 'register_Countdown_Widget' );