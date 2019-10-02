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
     <nav>
      <ul>
       <li>Item 1</li>
       <li>Item 2</li>
       <li>Item 3</li>
       <li>Item 4</li>
      </ul>
     </nav>
    </header>
    <main>
     <article>
      <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore maiores id minima culpa amet aperiam sed adipisci recusandae nisi at quae dolores accusamus quod quis iusto, doloremque nulla? Placeat, facere.</p>
     </article>    
     <aside>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis laborum architecto in deleniti debitis quidem ducimus at magnam tenetur, necessitatibus, cupiditate ad dignissimos voluptatem nesciunt deserunt voluptatibus exercitationem sequi cum.</p>
     </aside>
    </main>
    <footer>
     <div>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque quis qui enim autem voluptatum recusandae fugit dignissimos doloremque facere fugiat nemo, eos nulla ea. Ipsa est architecto aliquid repudiandae iste!</p>
     </div>
    </footer>
    <?php wp_footer();?>
</body>
</html>