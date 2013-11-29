<?php

namespace Demo;

/**
 * ForumItem class
 */
class ForumItem extends \Arch\View
{
    /**
     * Returns a new forum item view
     * @param string $tmpl The template file
     */
    public function __construct($tmpl = null)
    {
        if ($tmpl === null) {
            $tmpl = implode(DIRECTORY_SEPARATOR,
                    array(THEME_PATH,'demo','forum','forumitem.php'));
        }
	parent::__construct($tmpl);
        
        // init params
        $this->data['url'] = '/';
        $this->data['param'] = 'topic';
        $this->data['items'] = array();
    }
   
}