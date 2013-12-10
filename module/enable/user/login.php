<?php

// add login route
r('/demo/login', function() {
    
    // add view to content
    $view = new \Demo\ViewLogin();
    $view->set('loginUrl', help()->url('/demo/login/post'));
    $view->set('logoutUrl', help()->url('/demo/logout'));
    $view->set('anti_spam', view()->createAntiSpam());
    c($view);
});

// add logout route
r('/demo/logout', function() {
    
    // destroy current session and redirect
    app()->getSession()->reset();
    help()->redirect();
});

// post to this route
r('/demo/login/post', function() {
    
    $antispam = view()->createAntiSpam();
    if ($antispam->validate()) {
        
        //validate input
        $v = help()->createValidator();
        $rules = array();
        $rules[] = $v->createRule('email', 'Required', 'Email is required');
        $rules[] = $v->createRule('email', 'IsEmail', 'Invalid email address');
        $rules[] = $v->createRule('password', 'Required', 'Password is required');
        $result = $v->validate($rules);
        app()->getSession()->loadMessages($v->getMessages());
        
        if ($result) {
            // login user
            $model = new \Demo\ModelUser();
            $user = $model->login(i('email'), i('password'));
            
            if ($user) {
                session('login', $user->email);
                help()->redirect();
            }
        }
        session('last_post', i());
        sleep(2);
    }
    help()->redirect (u('/demo/login'));
});
