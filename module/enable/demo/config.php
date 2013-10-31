<?php
            
// add main route
r('/', function() {
	// add content
    c(new \Arch\View(BASE_PATH.'/theme/demo/default.php'));
});

// add 404 route
r('/404', function()  {
   	// set content
    c('<h1>404</h1>');
});

r('/demo', function() {
    
    // demo of file upload
    if ($file = f(0)) {
        app()->upload($file, BASE_PATH.'/theme/data');
    }
    
    // demo of download file
    if (g('dl')) {
        app()->download(BASE_PATH.'/theme/default/img/'.g('dl'));
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

require_once 'register.php';
require_once 'login.php';
require_once 'crud.php';
