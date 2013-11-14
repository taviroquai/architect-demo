<?php

namespace Demo;

/**
 * Model Forum
 */
class ModelForum
{
    
    public function __construct()
    {
        
    }

    public function addTopic($data)
    {
        $data['alias']      = app()->slug($data['title']);
        $data['id_user']    = 1;
        $data['datetime']   = date('Y-m-d H:i:s');
        return q('demo_topic')->i($data)->getInsertId();
    }
    
    public function addPost($data)
    {
        $data['datetime']   = date('Y-m-d H:i:s');
        $data['id_user']    = 1;
        return q('demo_post')->i($data)->getInsertId();
    }
    
    public function getForum($id)
    {
        return q('demo_forum')
            ->s()
            ->w('id = ?', array($id))
            ->fetchObject();
    }
    
    public function getForumByAlias($alias)
    {
        return q('demo_forum')
            ->s()
            ->w('alias = ?', array($alias))
            ->fetchObject();
    }
    
    public function getTopic($id)
    {
        return q('demo_topic')
            ->s()
            ->w('id = ?', array($id))
            ->fetchObject();
    }
    
    public function getTopicByAlias($alias)
    {
        return q('demo_topic')
            ->s()
            ->w('alias = ?', array($alias))
            ->fetchObject();
    }

    public function getCategories()
    {
        return q('demo_forum')
            ->s('demo_forum.*, count(id_forum) as total_topics')
            ->j('demo_topic', 'demo_forum.id = demo_topic.id_forum')
            ->g('demo_forum.id')
            ->fetchAll();
    }
    
    public function getTopics($id)
    {
        return q('demo_topic')
            ->s('demo_topic.*, count(id_topic) as total_posts')
            ->j('demo_post', 'demo_topic.id = demo_post.id_topic')
            ->w('demo_topic.id_forum = ?', array($id))
            ->g('demo_topic.id')
            ->fetchAll();
    }
    
    public function getTopicsByAlias($alias)
    {
        return q('demo_topic')
            ->s('demo_topic.*, count(id_topic) as total_posts')
            ->j('demo_post', 'demo_topic.id = demo_post.id_topic')
            ->w('demo_topic.id_forum = ?', array($alias))
            ->g('demo_topic.id')
            ->fetchAll();
    }
    
    public function getPosts($id_topic)
    {
        return q('demo_post')
            ->s()
            ->w('demo_post.id_topic = ?', array($id_topic))
            ->fetchAll();
    }
}