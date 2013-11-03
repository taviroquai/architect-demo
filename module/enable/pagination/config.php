<?php

r('/demo/pagination', function() {
    
    $pagination = app()->createPagination();
    $pagination->total = 10;
    $pagination->limit = 10;

    $view = v(__DIR__.'/theme/template.php');
    $view->set('pagination', $pagination);
    c($view);
});
