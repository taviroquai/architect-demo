<div class="well">
    <h1>Forum Topic Demo</h1>
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
$topic = $forum_model->getTopicByAlias($alias);
$forum = app()->createForum();
$topicview = $forum->createTopic();
    ->set('topic', $topic);
    ->set('url', '/demo/forum/topic/');
    ->set('posts', $forum_model->getPosts($topic->id));
        </pre>
        <h4>Default Template</h4>
        <pre>/theme/architect/forumtopic.php</pre>
    </div>
</div>