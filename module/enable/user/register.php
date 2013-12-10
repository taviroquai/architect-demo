<?php
/**
 * Default mail configuration
 */
define('MAIL_FROM',         '');
define('MAIL_FROMNAME',     'Application Name');
define('MAIL_REPLY',        '');
define('MAIL_REPLYNAME',    'Application Name');

// add routes
r('/demo/register', function() {
    
    // add view to content
    $view = new \Demo\ViewRegister();
    $view->set('registerUrl', u('/demo/register/post'));
    $view->set('anti_spam', view()->createAntiSpam());
    c($view);
});

// add routes
r('/demo/register-success', function() {
    c('<p>Thank you for registering</p>');
});

// post to this route
r('/demo/register/post', function() {
    
    $antispam = view()->createAntiSpam();
    if ($antispam->validate()) {
        
        // validate input
        $v = help()->createValidator();
        $rules = array();
        $rules[] = $v->createRule('email', 'IsEmail', 'Invalid email address');
        $rules[] = $v->createRule('email', 'Unique', 'Use other email')
                ->addParam(q('demo_user')->s('email')->fetchColumn());
        $rules[] = $v->createRule('password', 'Required', 'Password cannot be empty');
        $rules[] = $v->createRule('password', 'Equals', 'Password does not match')
                ->addParam(i('password_confirm'));
        $result = $v->validate($rules);
        app()->getSession()->loadMessages($v->getMessages());

        if ($result) {
            $model = new \Demo\ModelUser();
            $user = $model->register(i());
            if ($user) {
                help()->redirect(u('/demo/register-success'));
            }
        }
        session('last_post', i());
        sleep(2);
    }
    help()->redirect(u('/demo/register'));
});
