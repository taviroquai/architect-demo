<?php
namespace Demo;

class ViewNavRegister extends \Arch\View
{
    public function __construct()
    {
        parent::__construct(__DIR__.'/../../theme/register_navlink.php');
        
        // hide if there is a user logged in
        if (app()->session->login) {
            $this->hide();
        }
    }
}
