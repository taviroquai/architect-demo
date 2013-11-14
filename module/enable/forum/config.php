<?php

r('/demo/forum', function() {
    
    $forum_model = new \Demo\ModelForum();
    $forum = app()->createForum();
    $forum->set('url', '/demo/forum');
    $forum->set('categories', $forum_model->getCategories());

    $view = v(__DIR__.'/theme/forum.php')->addContent($forum);
    c($view);
});

r('/demo/forum/(:any)', function($alias = 1) {
    
    $forum_model = new \Demo\ModelForum();
    if (p('topic')) {
        $topic_data = p('topic');
        $post_data = p('post');
        $post_data['id_topic'] = $forum_model->addTopic($topic_data);
        $forum_model->addPost($post_data);
        app()->redirect(u('/demo/forum/'.$alias));
    }
    
    $item = $forum_model->getForumByAlias($alias);
    $forum = app()->createForum();
    $forumitem = $forum->createItem();
    $forumitem->set('forum', $item);
    $forumitem->set('url', '/demo/forum/'.$alias);
    $forumitem->set('topics', $forum_model->getTopics($item->id));

    $view = v(__DIR__.'/theme/forumitem.php')->addContent($forumitem);
    c($view);
});

r('/demo/forum/(:any)/(:any)', function($falias, $alias) {
    
    $forum_model = new \Demo\ModelForum();
    if (p('post')) {
        $forum_model->addPost(p('post'));
        app()->redirect(u('/demo/forum/'.$falias.'/'.$alias));
    }
    
    $topic = $forum_model->getTopicByAlias($alias);
    $forum = app()->createForum();
    $topicview = $forum->createTopic();
    $topicview->set('topic', $topic);
    $topicview->set('url', '/demo/forum/topic/');
    $topicview->set('posts', $forum_model->getPosts($topic->id));

    $view = v(__DIR__.'/theme/forumtopic.php')->addContent($topicview);
    c($view);
});