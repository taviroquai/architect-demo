<div class="well">
    <h1>Text Editor Demo</h1>
    <?php $this->slot('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$editor = app()->createTextEditor();
$editor->set('value', '&lt;p&gt;paragraph&lt;/p&gt;');
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/texteditor.php</pre>
    </div>
</div>