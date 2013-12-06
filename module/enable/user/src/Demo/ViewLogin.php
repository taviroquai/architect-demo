<?php

namespace Demo;

class ViewLogin extends \Arch\View
{
    public function __construct()
    {
        parent::__construct(__DIR__.'/../../theme/login_form.php');
        
        $login = app()->session->get('login');
        if (empty($login)) {
            // set data
            $post = app()->session->get('last_post');
            if (isset($post['email'])) {
                $this->set('email', $post['email']);
                app()->session->delete('last_post');
            }
        } else {
            // set session and logout template
            $this->setTemplate(__DIR__.'/../../theme/login_session.php');
            $model = new \Demo\ModelUser();
            $user = $model->findOne('email = ?', array($login));
            $this->set('user', $user);
        }
    }
}
