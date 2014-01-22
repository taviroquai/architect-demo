<div class="well">
    <h1>Image Gallery Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$gallery = view()->createImageGallery()
    ->setPath('path/to/images')
    ->setPathToUrl(conf('BASE_URL').'/path/to/images');
        </pre>
        <h4>Default Template</h4>
        <pre>vendor/taviroquai/architectphp/theme/imagegallery.php</pre>
    </div>
</div>