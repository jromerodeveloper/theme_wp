    <aside>
        <h2>Sidebar</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laborum architecto in deleniti debitis quidem ducimus at magnam tenetur, necessitatibus, cupiditate ad dignissimos voluptatem nesciunt deserunt voluptatibus exercitationem sequi cum.</p>
        <?php
        if(is_active_sidebar('main_sidebar')):
            dynamic_sidebar('main_sidebar');
        else:?>
        <article>
            <h3><?php _e('Buscar','themeWP');?></h3>
            <?php get_search_form();?>
        </article>
        <?php endif;?>
    </aside>