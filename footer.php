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
        <p>
            <small>
                <?php 
                if(get_option('themeWP_footer_text')!==''):
                    echo esc_html(get_option('themeWP_footer_text'));
                else:?>
                    &copy;<?php echo date('Y');?> por Jose Romero
                <?php
                endif;
                ?>
            </small>
        </p>
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