<?php

r('/demo/texteditor', function() {
    
    $editor = app()->createTextEditor();
    $name = 'editor1';
    $editor->set('name', $name);
    if (p($name)) $editor->set('value', p($name));
    
    $view = v(__DIR__.'/theme/template.php')->addContent($editor);
    c($view);
});
