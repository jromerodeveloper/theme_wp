<?php
if(!function_exists('themeWP_custom_header')):
    function themeWP_custom_header(){
        // Activar cabecera configurable
        // https://developer.wordpress.org/themes/funcionality/custom-headers/
        add_theme_support('custom-header', apply_filters(
            'themeWP_custom_header_args', array(
                'default-image'=>get_template_directory_uri().'/img/header-image.jpg',
                'default-text-color'=>'F60',
                'width'=>1200,
                'height'=>720,
                'flex-width'=>true,
                'flex-heihght'=>true,
                'video'=>true,
                'wp-head-callback'=>'themeWP_wp_header_style'
            )
        ));
    }
endif;

add_action('after_setup_theme','themeWP_custom_header');

if(!function_exists('themeWP_wp_header_style')):
    function themeWP_wp_header_style(){
        $header_text_color = get_header_textcolor();
        ?>
        <style>
            .WP-Header-branding *{
                color:#<?php echo esc_attr($header_text_color);?>;
            }
        </style>
    <?php
    }
endif;