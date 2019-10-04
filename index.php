<?php
get_header();
if(is_home()):
    echo '<mark>Estoy en el home</mark>';
elseif(is_category('relojes')):
    echo '<mark>Estoy mostrando resultados de la categoria Relojes</mark>';
elseif(is_category()):
    echo '<mark>Estoy mostrando resultados de una categoría</mark>';
elseif(is_page()):
    echo '<mark>Estoy mostrando una página</mark>';
elseif(is_tag()):
    echo '<mark>Estoy mostrando resultados de una etiqueta</mark>';
elseif(is_search()):
    echo '<mark>Estoy mostrando resultados de una búsqueda</mark>';
elseif(is_author()):
    echo '<mark>Estoy mostrando un autor</mark>';
elseif(is_404()):
    echo '<mark>Estoy mostrando una página de Error</mark>';
endif;
get_template_part('content');
get_sidebar();
get_footer();