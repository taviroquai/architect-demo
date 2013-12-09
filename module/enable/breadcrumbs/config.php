<?php

r('/demo/breadcrumbs', function() {
    
    $breadcrumbs = view()->createBreadcrumbs();
    $breadcrumbs->addItem('Dummy', '#', 0);

    $view = v(__DIR__.'/theme/template.php')->addContent($breadcrumbs);
    c($view);
});
