<?php

r('/demo/texteditor', function() {
    
    $editor = app()->createTextEditor();

    $view = v(__DIR__.'/theme/template.php')->addContent($editor);
    c($view);
});
