<?php
// Creando la tabla en la base de datos para guardar los registros del formulario
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

// Agregando en el Menu del dashboard
if(!function_exists('themeWP_contact_form_menu')):
    function themeWP_contact_form_menu(){
        add_menu_page('Contacto','Contacto','administrator','contact_form','themeWP_contact_form_comments','dashicons-id-alt',20);
        add_submenu_page('contact_form', 'Todos los contactos', 'Todos los contactos', 'administrator', 'contact_form_comments', 'themeWP_contact_form_comments');
    }
endif;

add_action('admin_menu','themeWP_contact_form_menu');

// Imprimiendo los registros del formulario en el dashboard
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
                        <?php
                        global $wpdb;
                        $table = $wpdb->prefix.'contact_form';
                        $rows = $wpdb->get_results("SELECT*FROM $table",ARRAY_A);
                        // echo '<pre>';
                        //     var_dump($rows);
                        // echo '</pre>';

                        // ciclo para recorrer toda la tabla como arreglo asociativo
                        foreach($rows as $row):
                        ?>
                        <tr>
                            <td><?php echo $row['contact_id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['subject'];?></td>
                            <td><?php echo $row['comments'];?></td>
                            <td><?php echo $row['contact_date'];?></td>
                            <td>
                                <a href="#" class="u-delete" data-contact-id="<?php echo $row['contact_id'];?>">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
            </table>
        </div>
        <?php
    }
endif;

// Imprimiendo el formulario en el front a través de un shortcode
// https://codex.wordpress.org/Shortcode_API
// https://codex.wordpress.org/Function_Reference/add_shortcode
if(!function_exists('themeWP_contact_form')):
    function themeWP_contact_form($atts){
        ?>
        <form action="" method="POST" class="ContactForm">
            <legend><?php echo $atts['title'];?></legend>
            <input type="text" name="name" placeholder="Escríbe tu nombre">
            <input type="email" name="email" placeholder="Escríbe tu email">
            <input type="text" name="subject" placeholder="Asunto a tratar">
            <textarea name="comments" cols="50" rows="5" placeholder="Escríbe tus comentarios"></textarea>
            <input type="submit" value="Enviar">
            <input type="hidden" name="send_contact_form" value="1">
        </form>
        <?php
    }
endif;

// Llamando una función a través de un Shortcode
add_shortcode('contact_form','themeWP_contact_form');

// Llamando hoja de estilos y script del formulario
if(!function_exists('themeWP_contact_scripts')):
    function themeWP_contact_scripts(){
        if(is_page('contacto')):
            wp_register_style('contact-form-style', get_template_directory_uri().'/css/contact_form.css', array(), '1.0.0', 'all');
            
            wp_enqueue_style('contact-form-style');

            wp_register_script('contact-form-script', get_template_directory_uri().'/js/contact_form.js', array(), '1.0.0', true);
            
            wp_enqueue_script('contact-form-script');
        endif;
    }
endif;

add_action('wp_enqueue_scripts','themeWP_contact_scripts');

// Guardando datos de los registros del formulario en la base de datos
if(!function_exists('themeWP_contact_form_save')):
    function themeWP_contact_form_save(){
        if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['send_contact_form'])):
            global $wpdb;

            $name = sanitize_text_field($_POST['name']);
            $email = sanitize_text_field($_POST['email']);
            $subject = sanitize_text_field($_POST['subjet']);
            $comments = sanitize_text_field($_POST['comments']);

            $table = $wpdb->prefix.'contact_form';

            $form_data = array (
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'comments' => $comments,
                'contact_date' => date('Y-m-d H:m:s')
            );

            $form_formats = array ('%s','%s','%s','%s','%s');

            $wpdb->insert($table,$form_data,$form_formats);

            $url = get_page_by_title('Gracias por tus comentarios');
            wp_redirect(get_permalink($url->ID));
            exit;
        endif;
    }
endif;

add_action('init','themeWP_contact_form_save');

// Llamando al script del formulario para el ADMIN
if(!function_exists('themeWP_contact_admin_scripts')):
    function themeWP_contact_admin_scripts(){
        wp_register_script('contact-form-admin-script', get_template_directory_uri().'/js/contact_form_admin.js', array('jquery'), '1.0.0', true);
        
        wp_enqueue_script('contact-form-admin-script');

        // Permite pasar valores de PHP a JS en notación de Objeto
        wp_localize_script(
            'contact-form-admin-script',
            'contact_form',
            array(
                'name' => 'Módulo de comentarios de Contacto',
                'ajax_url' => admin_url('admin-ajax.php')
            )
        );
    }
endif;

add_action('admin_enqueue_scripts','themeWP_contact_admin_scripts');

if(!function_exists('themeWP_contact_form_delete')):
    function themeWP_contact_form_delete(){
        if(isset($_POST['id'])):
            global $wpdb;

            $table = $wpdb->prefix.'contact_form';
            $delete_row = $wpdb->delete($table,array('contact_id'=>$_POST['id']),array('%d'));

            if($delete_row):
                $response = array(
                    'err' => false,
                    'msg' => 'Se eliminó el comentario con el ID'.$_POST['id']
                );
            else:
                $response = array(
                    'err' => true,
                    'msg' => 'NO se eliminó el comentario con el ID'.$_POST['id']
                );
            endif;
            die(json_encode($response));
        endif;
    }
endif;

add_action('wp_ajax_themeWP_contact_form_delete','themeWP_contact_form_delete');