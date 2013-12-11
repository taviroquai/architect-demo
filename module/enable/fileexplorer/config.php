<?php

r('/demo/fileexplorer', function() {
    
    $explorer = view()->createFileExplorer();
    $explorer->setPath(conf('THEME_PATH'));
    $explorer->set('url', u('/demo/fileexplorer?'));
    $explorer->setInputParam(i($explorer->get('param')));
    
    $layout = l(__DIR__.'/theme/template.php')->addContent($explorer);
    c($layout);
});
