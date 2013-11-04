<?php

// add demo stylesheet; use before theme render event
e('arch.theme.after.load', function() {
    c(BASE_URL.'/theme/default/css/animate-custom.css', 'css');
    c(BASE_URL.'/theme/demo/css/style.css', 'css');
    $path = app()->createBreadcrumbs()->parseAction(app()->input->getAction());
    c($path);
});
        
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
    
    $links = array(
        array('title' => 'Attachment', 'href' => u('/demo/attachment')),
        array('title' => 'Breadcrumbs', 'href' => u('/demo/breadcrumbs')),
        array('title' => 'Carousel', 'href' => u('/demo/carousel')),
        array('title' => 'Shopping Cart', 'href' => u('/demo/cart')),
        array('title' => 'Comment Form', 'href' => u('/demo/commentform')),
        array('title' => 'Crud (JS)', 'href' => u('/demo/crud')),
        array('title' => 'Date Picker', 'href' => u('/demo/datepicker')),
        array('title' => 'File Explorer', 'href' => u('/demo/fileexplorer')),
        array('title' => 'File Gallery', 'href' => u('/demo/filegallery')),
        array('title' => 'File Upload', 'href' => u('/demo/fileupload')),
        array('title' => 'Forum', 'href' => u('/demo/forum')),
        array('title' => 'Hello World', 'href' => u('/hello')),
        array('title' => 'Line Chart', 'href' => u('/demo/linechart')),
        array('title' => 'Login Form', 'href' => u('/login')),
        array('title' => 'Map', 'href' => u('/demo/map')),
        array('title' => 'Pagination', 'href' => u('/demo/pagination')),
        array('title' => 'Poll', 'href' => u('/demo/poll')),
        array('title' => 'Register Form', 'href' => u('/user/register')),
        array('title' => 'Text Editor', 'href' => u('/demo/texteditor')),
        array('title' => 'Tree View', 'href' => u('/demo/treeview'))
    );
    
    $view = app()->createView(__DIR__.'/theme/template.php');
    $view->id = 'demos-list';
    $view->set('links', $links);
    c($view);
});
