<?php

// add login route
r('/login', function() {
    // trigger before view
    tr('login.form.before.view');
    // add view to content
    $view = new \Arch\Demo\ViewLogin();
    $view->set('loginUrl', app()->url('/login'));
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
e('login.form.before.view', function() {

    if (p('login')) {
        
        // login user
        $model = new \Arch\Demo\ModelUser();
        $user = $model->login(p('email'), p('password'));
        
        if ($user) app()->session->login = $user->email;
        
        // redirect to clean post
        app()->redirect();
    }
});
