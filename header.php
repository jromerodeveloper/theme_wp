<!DOCTYPE html>
<html lang="<?php language_attributes();?>">
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title('|', true, 'rigth');?></title>
    <?php wp_head();?>
</head>
<body>
    <header>
        <div>
           <a href="<?php echo esc_url(home_url('/'));?>">LOGO</a> 
        </div>
        <?php 
        if(has_nav_menu('main_menu')):
            wp_nav_menu(array(
                'theme_location'=>'main_menu',
                'container'=>'nav',
                'container_clas'=>'Menu'
            ));
        else: ?>
        <nav>
            <ul>            
                <?php wp_list_pages('title_li') ;?>
            </ul>
        </nav>
        <?php endif;?>
    </header>
    <main>