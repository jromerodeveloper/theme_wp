<?php
/**
 * Theme WP Functions and Definitions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 * @package WordPress
 * @subpackage theme_wp
 * @since 1.0.0
 * @version 1.0.0 
 */

if(!function_exists('themeWP_scripts')):

 wp_register_style('style', get_stylesheet_directory_uri().'/style.css', array(), '1.0.0', 'all');
 
 wp_enqueue_style('style');

 wp_register_script('scripts', get_template_directory_uri().'/scripts.js', array(), '1.0.0', true);

 wp_enqueue_script('jquery');
 wp_enqueue_script('scripts');
endif;

if(!function_exists('themeWP_setup')):
    function themeWP_setup(){
        add_theme_support('post-thumbnails');
    }
endif;

add_action('after_setup_theme','themeWP_setup');