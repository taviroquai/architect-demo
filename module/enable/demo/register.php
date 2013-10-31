<?php

/**
 * Default mail configuration
 */
define('MAIL_FROM',         'taviroquai@hotmail.com');
define('MAIL_FROMNAME',     'Application Name');
define('MAIL_REPLY',        'taviroquai@hotmail.com');
define('MAIL_REPLYNAME',    'Application Name');

// add routes
r('/register', function() {
    // trigger before view
    tr('register.form.before.view');
    // add view to content
    $view = new \Arch\Demo\ViewRegister();
    $view->set('registerUrl', u('/register'));
    c($view);
});

// add routes
r('/register-success', function() {
    c('<p>Thank you for registering</p>');
});


// add event save post
e('register.form.before.view', function() {

    if (p('register') && app()->getCaptcha()) {

        // load model
        $model = new \Arch\Demo\ModelUser();
        $user = $model->register(p());
        
        if ($user) {
            // trigger after post
            tr('register.form.after.post', $user);
            // redirect to success page
            app()->redirect(u('/register-success'));
        } else {
            sleep(2);
        }
    }
});
