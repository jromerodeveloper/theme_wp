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

// Función para eliminar opciones del menu del Dashboard
if (!function_exists('mawt_admin_menu')):
    function mawt_admin_menu(){
      //remove_menu_page('edit.php'); // Entradas
      //remove_menu_page('upload.php'); // Multimedia
      //remove_menu_page('link-manager.php'); // Enlaces
      //remove_menu_page('edit.php?post_type=page'); // Páginas
      //remove_menu_page('edit-comments.php'); // Comentarios
      //remove_menu_page('themes.php'); // Apariencia
      //remove_menu_page('plugins.php'); // Plugins
      //remove_menu_page('users.php'); // Usuarios
      //remove_menu_page('tools.php'); // Herramientas
      //remove_menu_page('options-general.php'); // Ajustes
    }
  endif;
  add_action('admin_menu','mawt_admin_menu');

  if (!function_exists('mawt_before_admin_bar')):
    function mawt_before_admin_bar(){
      global $wp_admin_bar;
      /*
        search:para eliminar la caja de búsqueda
        comments:Para eliminar el aviso de comentarios
        updates:Eliminar el aviso de actualizaciones
        edit:Elimina editar entrada y páginas
        get-shortlink:Proporciona un enlace corto a esa página/post
        my-sites:Elimina el menu my sitios, si utilizas la función multisitios de wordpress
        site-name:Elimina el nombre de la web
        wp-logo:Elimina el logo(y el sub Menú)
        my-account:Elimina los enlaces a su cuenta. El ID depende de si usted tiene Avatar habilitado o no.
        view-site:Elimina el sub menú que aparece al pasar el cursor sobre el nombre de la web
        about:Elimina el enlace “Sobre WordPress
        wporg:Elimina el enlace a wordpress.org
        documentation:Elimina el enlace a la documentación oficial(Codex)
        support-forums:Elimina el enlace a los foros de ayuda
        feedback:Elimina el enlace Sugerencias
      */
    //   $wp_admin_bar->remove_menu('wp-logo');
    //   $wp_admin_bar->remove_menu('new-content');
    //   $wp_admin_bar->remove_menu('comments');
    }
  endif;

  add_action( 'wp_before_admin_bar_render', 'mawt_before_admin_bar' );

  