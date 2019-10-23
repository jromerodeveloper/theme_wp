<?php

if(!function_exists('themeWP_custom_theme_options_menu')):
    function themeWP_custom_theme_options_menu(){
        add_menu_page('Ajustes del Tema','Ajustes del Tema','administrator','custom_theme_options','themeWP_custom_theme_options_form','dashicons-admin-generic',20);
    }
endif;

add_action('admin_menu','themeWP_custom_theme_options_menu');

if(!function_exists('themeWP_custom_theme_options_form')):
    function themeWP_custom_theme_options_form(){
        ?>
        <div class="wrap">
            <h1><?php _e('Ajustes y Opciones del Tema', 'themeWP');?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields('themeWP_options_group');
                do_settings_sections('themeWP_options_group');
                ?>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Texto del Footer:</th>
                        <td>
                            <input type="text" name="themeWP_footer_text" value="<?php echo esc_attr(get_option('themeWP_footer_text'));?>">
                        </td>
                    </tr>
                </table>
                <?php submit_button();?>
            </form>
        </div>

        <?php
    }
endif;

if(!function_exists('themeWP_custom_theme_options_register')):
    function themeWP_custom_theme_options_register(){
        // Un registro por opción
        register_setting('themeWP_options_group','themeWP_footer_text');
    }
endif;

add_action('admin_init','themeWP_custom_theme_options_register');