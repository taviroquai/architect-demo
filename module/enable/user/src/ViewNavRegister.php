<?php
namespace Arch\Demo;

class ViewNavRegister extends \Arch\View
{
    public function __construct()
    {
        parent::__construct(THEME_PATH.'/demo/register_navlink.php');
        
        // hide if there is a user logged in
        if (app()->session->login) {
            $this->hide();
        }
    }
}
