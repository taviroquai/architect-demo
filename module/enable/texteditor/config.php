<?php

r('/demo/texteditor', function() {
    
    $editor = view()->createTextEditor();
    $name = 'editor1';
    $editor->set('name', $name);
    $editor->set('value', '<p>paragraph</p>');
    
    $view = v(__DIR__.'/theme/template.php')->addContent($editor);
    c($view);
});
