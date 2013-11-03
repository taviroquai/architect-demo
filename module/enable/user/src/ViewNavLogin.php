<?php
namespace Arch\Demo;

class ViewNavLogin extends \Arch\View
{
    public function __construct()
    {
        parent::__construct(__DIR__.'/../theme/login_navform.php');

        $login = app()->session->login;
        
        if (empty($login)) {
            $this->set('loginUrl', app()->url('/login'));
        }
        else {
            // set session and logout template
            $this->setTemplate(__DIR__.'/../theme/login_navsession.php');

            // set default data
            $this->set('logoutUrl', app()->url('/logout'));
            $model = new \Arch\Demo\ModelUser();
            $user = $model->findOne('email = ?', array($login));
            $this->set('user', $user);
        }
    }
}
