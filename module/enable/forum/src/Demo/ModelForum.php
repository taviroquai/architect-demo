<?php

namespace Demo;

/**
 * Model Forum
 */
class ModelForum
{
    /**
     * Inserts a new topic onto database
     * @param array $data
     * @return integer
     */
    public function addTopic($data)
    {
        $data['alias']      = help()->createSlug($data['title'])->run();
        $data['id_user']    = 1;
        $data['datetime']   = date('Y-m-d H:i:s');
        return q('demo_topic')->i($data)->getInsertId();
    }
    
    /**
     * Inserts a new post
     * @param array $data The post data
     * @return integer
     */
    public function addPost($data)
    {
        $data['datetime']   = date('Y-m-d H:i:s');
        $data['id_user']    = 1;
        return q('demo_post')->i($data)->getInsertId();
    }
    
    /**
     * Returns a new forum by ID
     * @param integer $id The forum ID
     * @return \stdClass
     */
    public function getForum($id)
    {
        return q('demo_forum')
            ->s()
            ->w('id = ?', array($id))
            ->fetchObject();
    }
    
    /**
     * Returns a new forum by alias (slug)
     * @param string $alias The forum slug
     * @return \stdClass
     */
    public function getForumByAlias($alias)
    {
        return q('demo_forum')
            ->s()
            ->w('alias = ?', array($alias))
            ->fetchObject();
    }
    
    /**
     * Returns a topic by topic id
     * @param integer $id The topic ID
     * @return \stdClass
     */
    public function getTopic($id)
    {
        return q('demo_topic')
            ->s()
            ->w('id = ?', array($id))
            ->fetchObject();
    }
    
    /**
     * Returns a topic by alias (slug)
     * @param string $alias The topic slug
     * @return \stdClass
     */
    public function getTopicByAlias($alias)
    {
        return q('demo_topic')
            ->s()
            ->w('alias = ?', array($alias))
            ->fetchObject();
    }

    /**
     * Returns forum categories
     * @return array
     */
    public function getCategories()
    {
        return q('demo_forum')
            ->s('demo_forum.*, count(id_forum) as total_topics')
            ->j('demo_topic', 'demo_forum.id = demo_topic.id_forum')
            ->g('demo_forum.id')
            ->fetchAll();
    }
    
    /**
     * Returns an array of topis by category ID
     * @param integer $id the category ID
     * @return array
     */
    public function getTopics($id)
    {
        return q('demo_topic')
            ->s('demo_topic.*, count(id_topic) as total_posts')
            ->j('demo_post', 'demo_topic.id = demo_post.id_topic')
            ->w('demo_topic.id_forum = ?', array($id))
            ->g('demo_topic.id')
            ->fetchAll();
    }
    
    /**
     * Returns all topics by alias
     * @param string $alias The topic alias
     * @return array
     */
    public function getTopicsByAlias($alias)
    {
        return q('demo_topic')
            ->s('demo_topic.*, count(id_topic) as total_posts')
            ->j('demo_post', 'demo_topic.id = demo_post.id_topic')
            ->w('demo_topic.id_forum = ?', array($alias))
            ->g('demo_topic.id')
            ->fetchAll();
    }
    
    /**
     * Returns all post from topic ID
     * @param integer $id_topic The topic ID
     * @return array
     */
    public function getPosts($id_topic)
    {
        return q('demo_post')
            ->s()
            ->w('demo_post.id_topic = ?', array($id_topic))
            ->fetchAll();
    }
}