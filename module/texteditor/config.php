<?php

r('/demo/texteditor', function() {
    
    $editor = view()->createTextEditor();
    $name = 'editor1';
    $editor->set('name', $name);
    $editor->set('value', '<p>paragraph</p>');
    
    $layout = l(__DIR__.'/theme/template.php')->addContent($editor);
    c($layout);
});
