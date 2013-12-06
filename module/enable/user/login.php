<?php

// add login route
r('/login', function() {
    
    // add view to content
    $view = new \Demo\ViewLogin();
    $view->set('loginUrl', app()->url('/login/post'));
    $view->set('logoutUrl', app()->url('/logout'));
    c($view);
});

// add logout route
r('/logout', function() {
    
    // destroy current session and redirect
    session_destroy();
    app()->session->reset();
    app()->redirect();
});

// add event try to login
r('/login/post', function() {
    
    // login user
    $model = new \Demo\ModelUser();
    $user = $model->login(p('email'), p('password'));

    if ($user) app()->session->set('login', $user->email);
    else {
        app()->session->set('last_post', p());
        sleep(2);
        app()->redirect (u('/login'));
    }

    // redirect to clean post
    app()->redirect();
});
