<?php

r('/demo/attachment', function() {
    
    $downloads_dir = conf('THEME_PATH').'/default/img/';
    if (i('dl')) {
        if (!help()->download($downloads_dir.i('dl'))) {
            help()->redirect(help()->url('/404'));
        }
    }

    $url = u('/demo/attachment', array('dl' => 'glyphicons-halflings.png'));
    $view = v(__DIR__.'/theme/template.php');
    $view->set('url', $url);
    $view->addContent($view);
    c($view);
});
