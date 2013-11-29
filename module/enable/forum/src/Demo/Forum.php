<?php

namespace Demo;

/**
 * Forum class
 */
class Forum extends \Arch\View
{
    
    /**
     * Returns a new forum
     * @param string $tmpl The template for the forum
     */
	public function __construct($tmpl = null)
    {   
        if ($tmpl === null) {
            $tmpl = implode(DIRECTORY_SEPARATOR,
                    array(THEME_PATH,'demo','forum','forum.php'));
        }
		parent::__construct($tmpl);
        
        // init params
        $this->data['url'] = '/';
        $this->data['param'] = 'forum';
        $this->data['items'] = array();
	}
    
    /**
     * Returns a new forum item (category) view
     * @param string $tmpl The template for the forum item (category)
     * @return \Arch\View\ForumItem
     */
    public function createItem($tmpl = null)
    {
        return new \Demo\ForumItem($tmpl);
    }
    
    /**
     * Returns a new topic view
     * @param string $tmpl The template for the topic
     * @return \Arch\View\ForumTopic
     */
    public function createTopic($tmpl = null)
    {
        return new \Demo\ForumTopic($tmpl);
    }
    
    /**
     * Returns a new post view
     * @param string $tmpl The template for the topic
     * @return \Arch\View\ForumPost
     */
    public function createPost($tmpl = null)
    {
        return new \Demo\ForumPost($tmpl);
    }

}