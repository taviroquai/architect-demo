<?php

r('/demo/breadcrumbs', function() {
    
    $breadcrumbs = view()->createBreadcrumbs();
    $breadcrumbs->addItem('Dummy', '#', 0);

    $layout = l(__DIR__.'/theme/template.php');
    $layout->addContent($breadcrumbs);
    c($layout);
});
