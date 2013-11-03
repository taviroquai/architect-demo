<div class="well">
    <h1>Comment Form Demo</h1>
    <?php $this->slot('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$form = app()->createCommentform();
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/commentform.php</pre>
    </div>
</div>