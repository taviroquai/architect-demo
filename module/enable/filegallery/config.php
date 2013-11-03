<?php

r('/demo/filegallery', function() {
    
    c(u('/arch/asset/css/font-awesome.min.css'), 'css');
    
    // trigger event before show view
    tr('demo.filegallery.before.view');
    
    // prepare gallery view
    $tmpl = ARCH_PATH.'/theme/architect/filegallery.php';
    $gallery = app()->createFileExplorer(THEME_PATH.'/data/thumb', $tmpl);
    $gallery->set('url', '/demo/filegallery');
    $gallery->setPathToUrl(function($path) {
        return u('/demo/filegallery', array('img' => $path));
    });

    $view = v(__DIR__.'/theme/template.php')->addContent($gallery);
    c($view);
});

e('demo.filegallery.before.view', function()
{
    // responde to get image request
    if (g('img')) app()->download(g('img'), false); // not as attachment (false)   
});

e('demo.filegallery.before.view', function()
{
    // create thumbs if they not exists
    if (!is_dir(THEME_PATH.'/data/thumb')) {
        mkdir (THEME_PATH.'/data/thumb');
        if (!count(glob(THEME_PATH.'/data/thumb/*.*'))) {
            $originals = glob(THEME_PATH.'/demo/img/*.*');
            foreach ($originals as $item) {
                app()->createImage($item)->saveThumb(THEME_PATH.'/data/thumb');
            }
        }
    }
});