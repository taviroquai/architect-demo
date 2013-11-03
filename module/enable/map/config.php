<?php

r('/demo/map', function() {
    
    $map = app()->createMap()
            ->set('lon', 0)
            ->set('lat', 0)
            ->set('zoom', 2);
    $marker = $map->model->createMarker(0, 0, 'Hello Architect!', true);
    $map->model->addMarker($marker);

    $view = v(__DIR__.'/theme/template.php')->addContent($map);
    c($view);
});
