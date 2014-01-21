<?php

r('/demo/pagination', function() {
    
    $pagination = view()->createPagination();
    $pagination->setLimit(3);
    $pagination->setTotalItems(10);
    $pagination->parseCurrent();

    $layout = l(__DIR__.'/theme/template.php');
    $layout->set('pagination', $pagination);
    c($layout);
});
