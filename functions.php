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
    function themeWP_scripts(){
        wp_register_style('style', get_stylesheet_directory_uri().'/style.css', array(), '1.0.0', 'all');
        
        wp_enqueue_style('style');
        
        wp_register_script('scripts', get_template_directory_uri().'/scripts.js', array(), '1.0.0', true);
        
        wp_enqueue_script('jquery');
        wp_enqueue_script('scripts');
    }
endif;

add_action('wp_enqueue_scripts','themeWP_scripts');

if(!function_exists('themeWP_setup')):
    function themeWP_setup(){
        //Soporte para traducciones
        //https://developer.wordpress.org/themes/functionality/internationalization/
        //https://make.wordpress.org/polyglots/handbook/Herramientas
        //https://www.icanlocalize.com/tools/php_scanner
        //https://poedit.net/
        load_theme_textdomain('themeWP', get_template_directory().'/languages');

        add_theme_support('post-thumbnails');

        add_theme_support('html5',array(
            'commet-list',
            'commet-form',
            'search-form',
            'gallery',
            'caption'
        ));

        add_theme_support('custom-logo',array(
            'height'=>100,
            'width'=>100,
            'flex-height'=>true,
            'flex-width'=>true
        ));

        add_theme_support('custom-background',array(
            'default-color'=>'DDD',
            'default-image'=>get_template_directory_uri().'/img/background-image.png',
            'default-repeat'=>'repeat',
            'default-position-x'=>'',
            'default-position-y'=>'',
            'default-size'=>'',
            'default-attachment'=>'fixed'
        ));

        // Activa la actualización selectiva de widgets en el customize
        add_theme_support('customize-selective-refresh-widgets');
    }
endif;

add_action('after_setup_theme','themeWP_setup');

if(!function_exists('themeWP_menus')):
    function themeWP_menus(){
        register_nav_menus(array(
            'main_menu'=>__('Menú Principal','themeWP'),
            'social_menu'=>__('Menú Redes Sociales','themeWP')
        ));
    }
endif;

add_action('init','themeWP_menus');

if(!function_exists('themeWP_register_sidebars')):
    function themeWP_register_sidebars(){
        register_sidebar(array(
            'name'=>__('Sidebar Principal','themeWP'),
            'id'=>'main_sidebar',
            'description'=>__('Este es el sidebar principal','themeWP'),
            'before_widget'=>'<article id="%1$s" class="Widget %2$s">',
            'after_widget'=>'</article>',
            'before_title'=>'<h3>',
            'after_title'=>'</h3>'
        ));
        register_sidebar(array(
            'name'=>__('Sidebar del Pie de Página','themeWP'),
            'id'=>'footer_sidebar',
            'description'=>__('Este es el sidebar del Footer','themeWP'),
            'before_widget'=>'<article id="%1$s" class="Widget %2$s">',
            'after_widget'=>'</article>',
            'before_title'=>'<h3>',
            'after_title'=>'</h3>'
        ));
    }
endif;

add_action('widgets_init','themeWP_register_sidebars');

require_once get_template_directory().'/inc/custom-header.php';
require_once get_template_directory().'/inc/customizer.php';
require_once get_template_directory().'/inc/custom-login.php';
require_once get_template_directory().'/inc/custom-admin.php';
// require_once get_template_directory().'/inc/custom-post-types.php';
// require_once get_template_directory().'/inc/custom-taxonomies.php';
require_once get_template_directory() . '/inc/custom-pre-get-posts.php';
// require_once get_template_directory() . '/inc/custom-metaboxes.php';
require_once get_template_directory().'/inc/custom-theme-options.php';
require_once get_template_directory().'/inc/custom-contact-form.php';