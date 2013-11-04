<?php

r('/demo/fileupload', function() {
    
    if ($file = f(0)) {
        app()->upload($file, THEME_PATH.'/data');
    }
    $fileupload = app()->createFileUpload();

    $view = v(__DIR__.'/theme/template.php')->addContent($fileupload);
    c($view);
});
