<div class="well">
    <h1>File Gallery Demo</h1>
    <?php $this->slot('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$tmpl = ARCH_PATH.'/theme/architect/filegallery.php';
$gallery = app()->createFileExplorer(THEME_PATH.'/data/thumb', $tmpl);
$gallery->set('url', '/demo/filegallery');
$gallery->setPathToUrl(function($path) {
    return conf('BASE_URL').'/'.INDEX_FILE.'/demo?img='.$path;
});
        </pre>
    </div>
</div>