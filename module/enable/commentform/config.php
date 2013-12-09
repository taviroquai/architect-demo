<?php

r('/demo/commentform', function() {
    
    $form = view()->createCommentForm();

    $view = v(__DIR__.'/theme/template.php')->addContent($form);
    c($view);
});
