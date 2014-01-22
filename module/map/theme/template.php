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
$map = view()->createMap()
    ->set('lon', 0)
    ->set('lat', 0)
    ->set('zoom', 2);
$marker = $map->createMarker(0, 0, 'Hello Architect!', true);
$map->addMarker($marker);
        </pre>
        <h4>Default Template</h4>
        <pre>vendor/taviroquai/architectphp/theme/map.php</pre>
    </div>
</div>