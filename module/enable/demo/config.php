<?php

// add main route
r('/', function() {
	// add content
    c(new \Arch\View(THEME_PATH.'/demo/default.php'));
});

// add 404 route
r('/404', function()  {
   	// set content
    c('<h1>404</h1>');
});

r('/demo', function() {
    
    // demo of file upload
    if ($file = f(0)) {
        app()->upload($file, THEME_PATH.'/data');
    }
    
    // demo of download file
    if (g('dl')) {
        app()->download(THEME_PATH.'/default/img/'.g('dl'));
    }
    if (g('img')) {
        app()->download(g('img'), false); // not as attachment (false)
    }
    
    // demo of forum posts
    $forum_model = new \Arch\Demo\ModelForum();
    if (p('topic')) {
        $forum_model->addTopic(p());
        app()->redirect(u('/demo'));
    }
    if (p('post')) {
        $forum_model->addPost(p());
        app()->redirect(u('/demo'));
    }
    
    // show demo view
    c(new \Arch\Demo\ViewMain());
});

r('/demo/install', function() {
    // initialization
    \Arch\Demo\ModelUser::checkDatabase();
});

// add more routes
require_once __DIR__.'/register.php';
require_once __DIR__.'/login.php';
require_once __DIR__.'/crud.php';
