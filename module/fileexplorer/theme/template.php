<div class="well">
    <h1>File Explorer Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?php }); ?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$explorer = view()->createFileExplorer()
    ->setPath('path/to/explore');
        </pre>
        <h4>Default Template</h4>
        <pre>vendor/taviroquai/architectphp/theme/fileexplorer.php</pre>
    </div>
</div>