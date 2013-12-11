<?php

r('/demo/imagegallery', function() {
    
    c(conf('BASE_URL').'/theme/default/css/slimbox2.css', 'css');
    c(conf('BASE_URL').'/theme/default/js/slimbox2.js', 'js');
    
    // trigger event before show view
    tr('demo.imagegallery.before.view');
    
    // prepare gallery view
    $gallery = view()->createImageGallery();
    $gallery->setPath(conf('THEME_PATH').'/data');
    $gallery->setPathToUrl(function($path) {
        return conf('BASE_URL').'/theme/data';
    });

    $layout = l(__DIR__.'/theme/template.php')->addContent($gallery);
    c($layout);
});

e('demo.imagegallery.before.view', function()
{
    $theme_path = conf('THEME_PATH');
    // create thumbs if they not exists
    if (!is_dir($theme_path.'/data/thumb')) {
        mkdir ($theme_path.'/data/thumb');
        if (!count(glob($theme_path.'/data/thumb/*.*'))) {
            $originals = glob($theme_path.'/demo/img/*.*');
            foreach ($originals as $item) {
                copy($item, $theme_path.'/data/'.basename($item));
                app()->createImage($item)->saveThumb($theme_path.'/data/thumb');
            }
        }
    }
});