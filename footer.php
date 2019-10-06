    </main>
    <footer class="Footer">
        <?php 
        if(has_nav_menu('social_menu')):
            wp_nav_menu(array(
                'theme_location'=>'social_menu',
                'container'=>'nav',
                'container_clas'=>'SocialMedia'
            ));
        endif;?>
        <div>
            <small>&copy;<?php echo date('Y');?> por Jose Romero</small>
        </div>
        <?php
        if(is_active_sidebar('footer_sidebar')):
            dynamic_sidebar('footer_sidebar');
        endif;
        ?>
    </footer>
    <?php wp_footer();?>
</body>
</html>