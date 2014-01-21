<?php
namespace Demo;

class ViewNavLogin extends \Arch\Registry\View
{
    public function __construct()
    {
        parent::__construct(__DIR__.'/../../theme/login_navform.php');

        $login = session('login');
        if (empty($login)) {
            $this->set('loginUrl', u('/demo/login/post'));
            $this->set('anti_spam', view()->createAntiSpam());
        }
        else {
            // set session and logout template
            $this->setTemplate(__DIR__.'/../../theme/login_navsession.php');

            // set default data
            $this->set('logoutUrl', u('/demo/logout'));
            $model = new \Demo\ModelUser();
            $user = $model->findOne('email = ?', array($login));
            $this->set('user', $user);
        }
    }
}
