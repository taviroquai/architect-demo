<?php

r('/demo/fileexplorer', function() {
    
    $explorer = view()->createFileExplorer(conf('THEME_PATH'));
    $explorer->set('url', help()->url('/demo/fileexplorer?'));
    $explorer->setInputParam(i($explorer->get('param')));
    
    $layout = l(__DIR__.'/theme/template.php')->addContent($explorer);
    c($layout);
});
