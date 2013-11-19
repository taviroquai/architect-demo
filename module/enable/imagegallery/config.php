<?php

r('/demo/imagegallery', function() {
    
    c(BASE_URL.'/theme/default/css/slimbox2.css', 'css');
    c(BASE_URL.'/theme/default/js/slimbox2.js', 'js');
    
    // trigger event before show view
    tr('demo.imagegallery.before.view');
    
    // prepare gallery view
    $gallery = app()->createImageGallery(THEME_PATH.'/data');
    $gallery->set('url', '/demo/imagegallery');
    $gallery->setPathToUrl(function($path) {
        return BASE_URL.'/theme/data';
    });

    $view = v(__DIR__.'/theme/template.php')->addContent($gallery);
    c($view);
});

e('demo.imagegallery.before.view', function()
{
    // create thumbs if they not exists
    if (!is_dir(THEME_PATH.'/data/thumb')) {
        mkdir (THEME_PATH.'/data/thumb');
        if (!count(glob(THEME_PATH.'/data/thumb/*.*'))) {
            $originals = glob(THEME_PATH.'/demo/img/*.*');
            foreach ($originals as $item) {
                copy($item, THEME_PATH.'/data/'.basename($item));
                app()->createImage($item)->saveThumb(THEME_PATH.'/data/thumb');
            }
        }
    }
});