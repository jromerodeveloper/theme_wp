    <article>
        <h1>Primer Curso</h1>
        <h2>Contenido</h2>
        <?php if(have_posts()):while(have_posts()):the_post();?>
        <p>Contenido de la entrada</p>
        <?php endwhile; else:?>
        <p>El contenido solicitado no existe</p>
        <?php endif;?>
    </article>