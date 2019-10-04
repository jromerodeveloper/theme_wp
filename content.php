    <article>
        <h1>Primer Curso</h1>
        <?php if(have_posts()):while(have_posts()):the_post();?>
        <h2>
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </h2>
        <?php the_permalink();?>
        <?php the_post_thumbnail();?>
        <?php the_post_thumbnail_url();?>
        <img src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php echo get_the_title();?>">
        <?php the_excerpt();?>
        <?php the_category();?>
        <p><?php the_category(', ');?></p>
        <p><?php the_tags();?></p>
        <!-- <p><?php the_date();?></p> -->
        <p><?php the_time();?></p>
        <p><?php the_time('d-M-Y');?></p>
        <!-- Imprimir la fecha con el formato establecido en el Dashboard -->
        <p><?php the_time(get_option('date_format'));?></p>
        <br>
        <p><?php the_author();?></p>
        <p><?php the_author_posts_link();?></p>
        <div>
        <?php //the_content();?>
        </div>
        <?php endwhile; else:?>
        <p>El contenido solicitado no existe</p>
        <?php endif;?>
    </article>
    <section>
        <?php previous_post_link()?>
        <?php next_post_link();?>
        <br>
        <?php echo paginate_links();?>
    </section>