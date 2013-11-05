<?php
/**
 * Default mail configuration
 */
define('MAIL_FROM',         'taviroquai@hotmail.com');
define('MAIL_FROMNAME',     'Application Name');
define('MAIL_REPLY',        'taviroquai@hotmail.com');
define('MAIL_REPLYNAME',    'Application Name');

// add routes
r('/user/register', function() {
    // trigger before view
    tr('register.form.before.view');
    // add view to content
    $view = new \Demo\ViewRegister();
    $view->set('registerUrl', u('/user/register'));
    c($view);
});

// add routes
r('/user/register-success', function() {
    c('<p>Thank you for registering</p>');
});

// add event save post
e('register.form.before.view', function() {

    if (p('register') && app()->getCaptcha()) {

        // load model
        $model = new \Demo\ModelUser();
        $user = $model->register(p());
        
        // what to do?
        if ($user) app()->redirect(u('/user/register-success'));
        else sleep(2);
    }
});
