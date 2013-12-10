<div class="well">
    <h1>File Explorer Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$explorer = app()->createFileExplorer(conf('THEME_PATH'))
    ->set('url', help()->url('/demo/fileexplorer?'))
    ->setInputParam(i($explorer->get('param')))
    ->setPathToUrl(function($item) {
        return u('/download', array('file' => basename($item)));
    });
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/fileexplorer.php</pre>
    </div>
</div>