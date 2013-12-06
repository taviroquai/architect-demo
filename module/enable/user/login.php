<?php

// add login route
r('/demo/login', function() {
    
    // add view to content
    $view = new \Demo\ViewLogin();
    $view->set('loginUrl', app()->url('/demo/login/post'));
    $view->set('logoutUrl', app()->url('/demo/logout'));
    c($view);
});

// add logout route
r('/demo/logout', function() {
    
    // destroy current session and redirect
    session_destroy();
    app()->session->reset();
    app()->redirect();
});

// post to this route
r('/demo/login/post', function() {
    
    if (app()->getCaptcha()) {
        
        //validate input
        $rules = array();
        $rules[] = rule('email', 'Required', 'Email is required');
        $rules[] = rule('email', 'IsEmail', 'Invalid email address');
        $rules[] = rule('password', 'Required', 'Password is required');
        $result = app()->input->validate($rules);
        app()->session->loadMessages(app()->input->getMessages());
        
        if ($result) {
            // login user
            $model = new \Demo\ModelUser();
            $user = $model->login(p('email'), p('password'));
            
            if ($user) {
                app()->session->set('login', $user->email);
                app()->redirect();
            }
        }
        app()->session->set('last_post', p());
        sleep(2);
    }
    app()->redirect (u('/demo/login'));
});
