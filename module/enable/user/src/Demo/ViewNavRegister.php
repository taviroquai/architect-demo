<?php
namespace Demo;

class ViewNavRegister extends \Arch\View
{
    public function __construct()
    {
        parent::__construct(__DIR__.'/../../theme/register_navlink.php');
        
        // set register url
        $this->set('registerUrl', help()->url('/demo/register'));
        
        // hide if there is a user logged in
        if (session('login')) {
            $this->hide();
        }
    }
}
