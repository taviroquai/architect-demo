<div class="well">
    <h1>Map Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$map = app()->createMap()
            ->set('lon', 0)
            ->set('lat', 0)
            ->set('zoom', 2);
$marker = $map->model->createMarker(0, 0, 'Hello Architect!', true);
$map->model->addMarker($marker);
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/map.php</pre>
    </div>
</div>