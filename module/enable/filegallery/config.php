<?php

r('/demo/filegallery', function() {
    
    c(u('/arch/asset/css/font-awesome.min.css'), 'css');
    
    if (g('img')) app()->download(g('img'), false); // not as attachment (false)
    
    $tmpl = ARCH_PATH.'/theme/architect/filegallery.php';
    $gallery = app()->createFileExplorer(THEME_PATH.'/data/thumb', $tmpl);
    $gallery->set('url', '/demo/filegallery');
    $gallery->setPathToUrl(function($path) {
        return u('/demo/filegallery', array('img' => $path));
    });

    $view = v(__DIR__.'/theme/template.php')->addContent($gallery);
    c($view);
});
