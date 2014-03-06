<div class="well">
    <h1>File Upload Demo</h1>
    <form id="<?=$_id?>" method="post" enctype="multipart/form-data" title="Upload">
        <?php $this->render('content', function($item) { ?>
            <div>
                <?=$item?>
                <div class="clearfix"></div>
            </div>
        <?php }); ?>
        <button type="submit" class="btn">Send</button>
    </form>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$fileupload = view()->createFileUpload();
if ($file = f(0)) {
    $fileupload->upload($file, conf('THEME_PATH').'/data');
}
        </pre>
        <h4>Default Template</h4>
        <pre>vendor/taviroquai/architectphp/theme/fileupload.php</pre>
    </div>
</div>