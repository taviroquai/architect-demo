<?php

r('/demo/fileupload', function() {
    
    
    $fileupload = view()->createFileUpload();
    if ($file = f(0)) {
        $fileupload->upload($file, conf('THEME_PATH').'/data');
    }

    $view = v(__DIR__.'/theme/template.php')->addContent($fileupload);
    c($view);
});
