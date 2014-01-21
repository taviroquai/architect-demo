<?php

r('/demo/attachment', function() {
    
    $downloads_dir = conf('THEME_PATH').'/default/img/';
    if (i('dl')) {
        if (!help()->createDownload($downloads_dir.i('dl'))->run()) {
            redirect(u('/404'));
        }
    }

    $url = u('/demo/attachment', array('dl' => 'glyphicons-halflings.png'));
    $layout = l(__DIR__.'/theme/template.php');
    $layout->set('url', $url);
    c($layout);
});