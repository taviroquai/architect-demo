<?php

r('/demo/commentform', function() {
    
    $form = app()->createCommentForm();

    $view = v(__DIR__.'/theme/template.php')->addContent($form);
    c($view);
});
