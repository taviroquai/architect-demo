<?php
namespace Demo;

class ViewRegister extends \Arch\Registry\View
{
    public function __construct()
    {
        parent::__construct(__DIR__.'/../../theme/register_form.php');

        // set data
        $post = session('last_post');
        if (isset($post['email'])) {
            $this->set('email', $post['email']);
            app()->getSession()->delete('last_post');
        }
        $email = i('email');
        if (!empty($email)) {
            $this->set('email', $email);
        }
    }
}
