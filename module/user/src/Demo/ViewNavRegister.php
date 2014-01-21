<?php
namespace Demo;

class ViewNavRegister extends \Arch\Registry\View
{
    public function __construct()
    {
        parent::__construct(__DIR__.'/../../theme/register_navlink.php');
        
        // set register url
        $this->set('registerUrl', u('/demo/register'));
        
        // hide if there is a user logged in
        if (session('login')) {
            $this->hide();
        }
    }
}
