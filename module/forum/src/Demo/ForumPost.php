<?php

namespace Demo;

/**
 * ForumPost class
 */
class ForumPost extends \Arch\Theme\Layout
{
    /**
     * Returns a new forum post view
     * @param string $tmpl The template file
     */
    public function __construct($tmpl = null)
    {
        if ($tmpl === null) {
            $tmpl = implode(DIRECTORY_SEPARATOR,
                    array(__DIR__,'..','..','theme','forumpost.php'));
        }
		parent::__construct($tmpl);
    }
   
}