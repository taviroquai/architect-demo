<div class="well">
    <h1>Text Editor Demo</h1>
    <form action="" method="post">
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
$editor = app()->createTextEditor();
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/texteditor.php</pre>
    </div>
</div>