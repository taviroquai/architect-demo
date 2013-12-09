<?php

r('/demo/carousel', function() {
    
    c(conf('BASE_URL').'/theme/demo/carousel/style.css', 'css');
    
    $url = conf('BASE_URL').'/theme/demo/img/';
    $carousel = view()->createCarousel();
    $carousel->addItem('<img src="'.$url.'carousel1.jpg" />', 1);
    $carousel->addItem('<img src="'.$url.'carousel2.jpg"  />', 0);

    $view = v(__DIR__.'/theme/template.php')->addContent($carousel);
    c($view);
});
