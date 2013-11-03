<?php

r('/demo/attachment', function() {
    
    if (g('dl')) app()->download(THEME_PATH.'/default/img/'.g('dl'));

    $url = u('/demo/attachment', array('dl' => '/glyphicons-halflings.png'));
    $view = v(__DIR__.'/theme/template.php');
    $view->set('url', $url);
    $view->addContent($view);
    c($view);
});
