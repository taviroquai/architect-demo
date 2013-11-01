<?php

namespace Arch\Demo;

class ViewLogin extends \Arch\View
{
    public function __construct()
    {
        parent::__construct(THEME_PATH.'/demo/login_form.php');
        
        $login = app()->session->login;
        if (empty($login)) {
            // set data
            $email = app()->input->post('email');
            if (!empty($email)) {
                $this->set('email', filter_var($email));
            }
        } else {
            // set session and logout template
            $this->setTemplate(THEME_PATH.'/demo/login_session.php');
            // set default data
            $this->set('logoutUrl', app()->url('/logout'));
            $model = new \Arch\Demo\ModelUser();
            $user = $model->findOne('email = ?', array($login));
            $this->set('user', $user);
        }
    }
}
