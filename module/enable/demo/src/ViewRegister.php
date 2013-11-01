<?php
namespace Arch\Demo;

class ViewRegister extends \Arch\View
{
    public function __construct()
    {
        parent::__construct(THEME_PATH.'/demo/register_form.php');

        // set data
        $this->set('registerUrl', '/register');
        $email = app()->input->post('email');
        if (!empty($email)) {
            $this->set('email', filter_var($email));
        }
    }
}
