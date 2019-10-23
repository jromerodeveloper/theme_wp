<?php
// https://codex.wordpress.org/Class_Reference/wpdb
// https://developer.wordpress.org/reference/classes/wpdb/

if(!function_exists('themeWP_contact_table')):
    function themeWP_contact_table(){
        global $wpdb;
        global $contact_table_version;

        $contact_table_version = '1.0.0';

        $table = $wpdb->prefix.'contact_form';

        $charset_collate = $wpdb->get_charset_collate();

        $sql = "
            CREATE TABLE $table(
                contact_id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
                name VARCHAR(50) NOT NULL,
                email VARCHAR(50) NOT NULL,
                subject VARCHAR(50) NOT NULL,
                comments LONGTEXT NOT NULL,
                contact_date DATETIME NOT NULL,
                PRIMARY KEY (contact_id)
            ) $charset_collate;
        ";

        require_once ABSPATH.'wp-admin/includes/upgrade.php';

        dbDelta($sql);
        add_option('contact_table_version',$contact_table_version);
    }
endif;

add_action('after_setup_theme','themeWP_contact_table');

if(!function_exists('themeWP_contact_form_menu')):
    function themeWP_contact_form_menu(){
        add_menu_page('Contacto','Contacto','administrator','contact_form','themeWP_contact_form_comments','dashicons-id-alt',20);
        add_submenu_page('contact_form', 'Todos los contactos', 'Todos los contactos', 'administrator', 'contact_form_comments', 'themeWP_contact_form_comments');
    }
endif;

add_action('admin_menu','themeWP_contact_form_menu');

if(!function_exists('themeWP_contact_form_comments')):
    function themeWP_contact_form_comments(){  
        ?>
        <div class="wrap">
            <h1><?php _e('Comentarios de la página de Contacto','themeWP');?></h1>
            <table class="wp-list-table widefat striped">
                <thead>
                    <tr>
                        <td class="manage-column"><?php _e('id','themeWP');?></td>
                        <td class="manage-column"><?php _e('Nombre','themeWP');?></td>
                        <td class="manage-column"><?php _e('Email','themeWP');?></td>
                        <td class="manage-column"><?php _e('Asunto','themeWP');?></td>
                        <td class="manage-column"><?php _e('Comentarios','themeWP');?></td>
                        <td class="manage-column"><?php _e('Fecha','themeWP');?></td>
                        <td class="manage-column"><?php _e('Eliminar','themeWP');?></td>
                    </tr>
                    <tbody>
                        <tr>
                            <td>valor 1</td>
                            <td>valor 2</td>
                            <td>valor 3</td>
                            <td>valor 4</td>
                            <td>valor 5</td>
                            <td>valor 6</td>
                            <td>valor 7</td>
                        </tr>
                    </tbody>
            </table>
        </div>
        <?php
    }
endif;

// https://codex.wordpress.org/Shortcode_API
// https://codex.wordpress.org/Function_Reference/add_shortcode
if(!function_exists('themeWP_contact_form')):
    function themeWP_contact_form($atts){
        echo "
        <div>
            <h1>".$atts[title]."</h1> 
        </div>
        ";
    }
endif;

// Llamando una función a través de un Shortcode
add_shortcode('contact_form','themeWP_contact_form');