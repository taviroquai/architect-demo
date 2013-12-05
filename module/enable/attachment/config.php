<?php

r('/demo/attachment', function() {
    
    $downloads_dir = conf('THEME_PATH').'/default/img/';
    if (g('dl')) {
        app()->download($downloads_dir.g('dl'));
    }

    $url = u('/demo/attachment', array('dl' => 'glyphicons-halflings.png'));
    $view = v(__DIR__.'/theme/template.php');
    $view->set('url', $url);
    $view->addContent($view);
    c($view);
});
