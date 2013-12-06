<?php
/**
 * Default mail configuration
 */
define('MAIL_FROM',         'taviroquai@hotmail.com');
define('MAIL_FROMNAME',     'Application Name');
define('MAIL_REPLY',        'taviroquai@hotmail.com');
define('MAIL_REPLYNAME',    'Application Name');

// add routes
r('/demo/register', function() {
    
    // add view to content
    $view = new \Demo\ViewRegister();
    $view->set('registerUrl', u('/demo/register/post'));
    c($view);
});

// add routes
r('/demo/register-success', function() {
    c('<p>Thank you for registering</p>');
});

// post to this route
r('/demo/register/post', function() {
    
    if (app()->getCaptcha()) {
        
        // validate input
        $rules = array();
        $rules[] = rule('email', 'IsEmail', 'Invalid email address');
        $rules[] = rule('email', 'Unique', 'Use other email')
                ->addParam(q('demo_user')->s('email')->fetchColumn());
        $rules[] = rule('password', 'Required', 'Password cannot be empty');
        $rules[] = rule('password', 'Equals', 'Password does not match')
                ->addParam(p('password_confirm'));
        $result = app()->input->validate($rules);
        app()->session->loadMessages(app()->input->getMessages());

        if ($result) {
            $model = new \Demo\ModelUser();
            $user = $model->register(p());
            if ($user) {
                app()->redirect(u('/demo/register-success'));
            }
        }
        app()->session->set('last_post', p());
        sleep(2);
    }
    app()->redirect(u('/demo/register'));
});
