<?php

r('/demo/texteditor', function() {
    
    $editor = app()->createTexteditor();

    $view = v(__DIR__.'/theme/template.php')->addContent($editor);
    c($view);
});
