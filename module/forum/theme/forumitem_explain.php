<div class="well">
    <h1>Forum Item Demo</h1>
    <?php $this->render('content', function($item) { ?>
        <div>
            <?=$item?>
            <div class="clearfix"></div>
        </div>
    <?})?>
    <div class="explain">
        <h4>PHP</h4>
        <pre>
$forum_model = new \Arch\Demo\ModelForum();
$item = $forum_model->getForumByAlias($alias);
$forum = app()->createForum();
$forumitem = $forum->createItem();
$forumitem->set('forum', $item);
$forumitem->set('url', '/demo/forum/'.$alias);
$forumitem->set('topics', $forum_model->getTopics($item->id));
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/forumitem.php</pre>
    </div>
</div>