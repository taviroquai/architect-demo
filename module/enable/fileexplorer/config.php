<?php

r('/demo/fileexplorer', function() {
    
    $explorer = app()->createFileExplorer(conf('THEME_PATH'));
    $explorer->set('url', app()->url('/demo/fileexplorer?'));
    $explorer->setInputParam(g($explorer->get('param')));
    
    $view = v(__DIR__.'/theme/template.php')->addContent($explorer);
    c($view);
});
