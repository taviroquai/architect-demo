<div class="well">
    <h1>File Upload Demo</h1>
    <form id="<?=$_id?>" method="post" enctype="multipart/form-data" title="Upload">
        <?php $this->slot('content', function($item) { ?>
            <div>
                <?=$item?>
                <div class="clearfix"></div>
            </div>
        <?})?>
        <button type="submit" class="btn">Send</button>
    </form>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
if ($file = f(0)) app()->upload($file, THEME_PATH.'/data');
$fileupload = app()->createFileUpload();
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/fileupload.php</pre>
    </div>
</div>