<div class="well">
    <h1>Forum Demo</h1>
    <?php $this->slot('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$forum_model = new \Arch\Demo\ModelForum();
$forum = app()->createForum();
$forum->set('url', '/demo/forum');
$forum->set('categories', $forum_model->getCategories());
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/forum.php</pre>
    </div>
</div>