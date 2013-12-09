<?php
namespace Demo;

class ViewNavMenu extends \Arch\View\Menu
{
    public function __construct()
    {
        parent::__construct();
        $this->template = __DIR__.'/../../theme/main_menu.php';
        
        // add demo menu item
        $this->addItem('Demo', help()->url('/demo'));
    }
}
