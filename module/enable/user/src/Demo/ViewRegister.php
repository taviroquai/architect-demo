<?php
namespace Demo;

class ViewRegister extends \Arch\View
{
    public function __construct()
    {
        parent::__construct(__DIR__.'/../../theme/register_form.php');

        // set data
        $post = app()->session->get('last_post');
        if (isset($post['email'])) {
            $this->set('email', $post['email']);
            app()->session->delete('last_post');
        }
        $email = app()->input->post('email');
        if (!empty($email)) {
            $this->set('email', $email);
        }
    }
}
