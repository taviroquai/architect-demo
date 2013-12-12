<?php

r('/demo/fileupload', function() {
    
    
    $fileupload = view()->createFileUpload();
    if ($file = f(0)) {
        $result = $fileupload->upload($file, conf('THEME_PATH').'/data');
        if ($result) m('File uploaded!');
        redirect(u('/demo/fileupload'));
    }

    $layout = l(__DIR__.'/theme/template.php')->addContent($fileupload);
    c($layout);
});
