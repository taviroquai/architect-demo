<?php

r('/demo/fileexplorer', function() {
    
    $explorer = app()->createFileExplorer(conf('THEME_PATH'));
    $explorer->setInputParam(g($explorer->get('param')));
    $explorer->set('url', app()->url('/demo/fileexplorer?'));
    $explorer->setPathToUrl(function($path) {
        return $path;
    });

    $view = v(__DIR__.'/theme/template.php')->addContent($explorer);
    c($view);
});
