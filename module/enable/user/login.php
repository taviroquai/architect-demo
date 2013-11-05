<?php

// add login route
r('/login', function() {
    
    // add view to content
    $view = new \Arch\Demo\ViewLogin();
    $view->set('loginUrl', app()->url('/login/post'));
    $view->set('logoutUrl', app()->url('/logout'));
    c($view);
});

// add logout route
r('/logout', function() {
    
    // destroy current session and redirect
    app()->session->destroy();
    app()->redirect();
});

// add event try to login
r('/login/post', function() {
    
    // login user
    $model = new \Arch\Demo\ModelUser();
    $user = $model->login(p('email'), p('password'));

    if ($user) app()->session->login = $user->email;
    else {
        app()->session->last_post = p();
        app()->redirect (u('/login'));
    }

    // redirect to clean post
    app()->redirect();
});
