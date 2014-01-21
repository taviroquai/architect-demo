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
$gallery = view()->createImageGallery()->setPath(conf('THEME_PATH').'/data');
        </pre>
    </div>
</div>