<div class="well">
    <h1>Image Gallery Demo</h1>
    <?php $this->slot('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$gallery = app()->createImageGallery(conf('THEME_PATH').'/data');
$gallery->setPathToUrl(function($path) {
    return conf('BASE_URL').'/theme/data';
});
        </pre>
    </div>
</div>