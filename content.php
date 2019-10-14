    <article class="Content">
        <?php 
        // Eliminar parametros de loop anteriores
        query_posts(null);
        if(have_posts()):while(have_posts()):the_post();?>
        <article>    
            <?php the_post_thumbnail();?>
            <h2>
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </h2>
            <?php the_excerpt();?>
            <p><?php the_category(', ');?></p>
            <p><?php the_tags();?></p>
            <!-- Imprimir la fecha con el formato establecido en el Dashboard -->
            <p><?php the_time(get_option('date_format'));?></p>
            <p><?php the_author_posts_link();?></p>
        </article>
        <hr>
        <?php endwhile; else:?>
        <p>El contenido solicitado no existe</p>
        <?php endif;?>
        <?php wp_reset_postdata();?>
    </article>
    <section class="Pagination Other">
        <?php echo paginate_links();?>
    </section>