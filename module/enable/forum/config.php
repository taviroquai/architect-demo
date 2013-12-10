<?php

r('/demo/forum', function() {
    
    $forum_model = new \Demo\ModelForum();
    $forum = new \Demo\Forum();
    $forum->set('url', '/demo/forum');
    $forum->set('categories', $forum_model->getCategories());

    $layout = l(__DIR__.'/theme/forum_explain.php')->addContent($forum);
    c($layout);
});

r('/demo/forum/(:any)', function($alias = 1) {
    
    $forum_model = new \Demo\ModelForum();
    if (i('topic')) {
        $topic_data = i('topic');
        $post_data = i('post');
        $post_data['id_topic'] = $forum_model->addTopic($topic_data);
        $forum_model->addPost($post_data);
        help()->redirect(u('/demo/forum/'.$alias));
    }
    
    $item = $forum_model->getForumByAlias($alias);
    $forum = new \Demo\Forum();
    $forumitem = $forum->createItem();
    $forumitem->set('forum', $item);
    $forumitem->set('url', '/demo/forum/'.$alias);
    $forumitem->set('topics', $forum_model->getTopics($item->id));

    $layout = l(__DIR__.'/theme/forumitem_explain.php')->addContent($forumitem);
    c($layout);
});

r('/demo/forum/(:any)/(:any)', function($falias, $alias) {
    
    $forum_model = new \Demo\ModelForum();
    if (i('post')) {
        $forum_model->addPost(i('post'));
        help()->redirect(u('/demo/forum/'.$falias.'/'.$alias));
    }
    
    $topic = $forum_model->getTopicByAlias($alias);
    $forum = new \Demo\Forum();
    $topicview = $forum->createTopic();
    $topicview->set('topic', $topic);
    $topicview->set('url', '/demo/forum/topic/');
    $topicview->set('posts', $forum_model->getPosts($topic->id));

    $layout = l(__DIR__.'/theme/forumtopic_explain.php')->addContent($topicview);
    c($layout);
});