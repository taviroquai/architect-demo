<?php

// load session manually - by default uses native php session
e('arch.session.load', function () {
    app()->getSession()->load();
});

// call save session - by default calls session_write_close()
e('arch.session.save', function () {
    app()->getSession()->save();
});

// load default theme manually
e('arch.theme.load', function() {
    theme(conf('THEME_PATH').DIRECTORY_SEPARATOR.'default');
    theme()->set('idiom', help()->createIdiom()->execute());
    $path = view()->createBreadcrumbs();
    $path->parseAction(app()->getInput()->getAction(), app());
    theme()->addContent($path);
});

// add main route
r('/', function() {
	// add content
    $layout = l(__DIR__.'/theme/default.php');
    $layout->set('idiom', help()->createIdiom()->execute());
    c($layout);
});

// add demo route
r('/demo', function() {
    
    $links = array(
        array('title' => 'Attachment', 'href' => u('/demo/attachment')),
        array('title' => 'Breadcrumbs', 'href' => u('/demo/breadcrumbs')),
        array('title' => 'Carousel', 'href' => u('/demo/carousel')),
        array('title' => 'Comment Form', 'href' => u('/demo/commentform')),
        array('title' => 'Crud - Auto Table / Form', 'href' => u('/demo/crud')),
        array('title' => 'Date Picker', 'href' => u('/demo/datepicker')),
        array('title' => 'File Explorer', 'href' => u('/demo/fileexplorer')),
        array('title' => 'Image Gallery', 'href' => u('/demo/imagegallery')),
        array('title' => 'File Upload', 'href' => u('/demo/fileupload')),
        array('title' => 'Forum', 'href' => u('/demo/forum')),
        array('title' => 'Hello World', 'href' => u('/hello')),
        array('title' => 'HTTP Request', 'href' => u('/demo/http')),
        array('title' => 'Line Chart', 'href' => u('/demo/linechart')),
        array('title' => 'Login Form', 'href' => u('/demo/login')),
        array('title' => 'Map', 'href' => u('/demo/map')),
        array('title' => 'Pagination', 'href' => u('/demo/pagination')),
        array('title' => 'Poll', 'href' => u('/demo/poll')),
        array('title' => 'Register Form', 'href' => u('/demo/register')),
        array('title' => 'Shopping Cart', 'href' => u('/demo/cart')),
        array('title' => 'Social Profile', 'href' => u('/demo/social')),
        array('title' => 'Text Editor', 'href' => u('/demo/texteditor')),
        array('title' => 'Tree View', 'href' => u('/demo/treeview'))
    );
    
    $layout = l(__DIR__.'/theme/template.php');
    $layout->id = 'demos-list';
    $layout->set('links', $links);
    c($layout);
});

