<?php

r('/demo/map', function() {
    
    $map = view()->createMap()
            ->set('lon', 0)
            ->set('lat', 0)
            ->set('zoom', 2);
    $marker = $map->createMarker(0, 0, 'Hello Architect!', true);
    $map->addMarker($marker);

    $layout = l(__DIR__.'/theme/template.php')->addContent($map);
    c($layout);
});
