<?php

r('/demo/commentform', function() {
    
    $form = view()->createCommentForm();

    $layout = l(__DIR__.'/theme/template.php')->addContent($form);
    c($layout);
});
