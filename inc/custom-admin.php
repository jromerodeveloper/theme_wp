<?php
//https://codex.wordpress.org/Dashboard_Widgets_API
//https://codex.wordpress.org/Plugin_API/Admin_Screen_Reference
//https://codex.wordpress.org/Administration_Screens
//https://codex.wordpress.org/Adding_Administration_Menus

if(!function_exists('themeWP_admin_scripts')):
    function themeWP_admin_scripts(){
        wp_register_style('custom-properties', get_stylesheet_directory_uri().'/css/custom-properties.css', array(), '1.0.0', 'all');
        wp_register_style('admin-page-style', get_stylesheet_directory_uri().'/css/admin_page.css', array('custom-properties'), '1.0.0', 'all');
        
        wp_enqueue_style('custom-properties');
        wp_enqueue_style('admin-page-style');
        
        wp_register_script('admin-page-script', get_template_directory_uri().'/js/admin_page.js', array(), '1.0.0', true);
        
        wp_enqueue_script('jquery');
        wp_enqueue_script('admin-page-script');
    }
endif;

add_action('admin_enqueue_scripts','themeWP_admin_scripts');

// Modificar los estilos del editor de entradas y páginas
// https://rudrastyh.com/gutenberg/css.html#custom_css
// **Actualización** Ahora la función se llama en el hook 'after_setup_theme' y se necesita agregar de manera obligatoria el add_theme_support('editor-styles')
if (!function_exists('themeWP_add_editor_styles')):
    function themeWP_add_editor_styles(){
        add_theme_support('editor-styles');
        add_editor_style('https://fonts.googleapis.com/css?family=Raleway:400,700');
        add_editor_style('css/custom_editor_style.css');
    }   
endif;
  
add_action('after_setup_theme','themeWP_add_editor_styles');