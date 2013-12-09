<?php

r('/demo/pagination', function() {
    
    $pagination = view()->createPagination();
    $pagination->setLimit(3);
    $pagination->setTotalItems(10);
    $pagination->parseCurrent();

    $view = v(__DIR__.'/theme/template.php');
    $view->set('pagination', $pagination);
    c($view);
});
