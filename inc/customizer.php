<?php
if(!function_exists('themeWP_customize_register')):
    function themeWP_customize_register(){
        $wp_customize->get_setting('blogname')->transport='postMessage';
        $wp_cutomize->get_setting('blogdescription')->transport='postMessage';
    }
    if(isset($wp_customize->selective_refresh)):
        $wp_customize->selective_refresh->add_partial('blogname',array(
            'selector'=>'.WP-Header-title',
            'render_callback'=>'themeWP_customize_blogname'
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'=>'.WP-Header-description',
            'render_callback'=>'themeWP_customize_blogdescription'
        ));
    endif;
endif;

if(!function_exists('themeWP_customize_blogname')):
    function themeWP_customize_blogname(){
        bloginfo('name');
    }
endif;

if(!function_exists('themeWP_customize_blogdescription')):
    function themeWP_customize_blogdescription(){
        bloginfo('description');
    }
endif;