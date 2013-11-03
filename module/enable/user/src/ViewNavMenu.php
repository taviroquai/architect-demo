<?php
namespace Arch\Demo;

class ViewNavMenu extends \Arch\View\Menu
{
    public function __construct()
    {
        parent::__construct(THEME_PATH.'/demo/main_menu.php');
        
        // add demo menu item
        $this->addItem('Demo', app()->url('/demo'));
    }
}
