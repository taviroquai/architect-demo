<?php
        
// add main route
r('/', function() {
	// add content
    $v = new \Arch\View(THEME_PATH.'/demo/default.php');
    $v->set('idiom', app()->createIdiom());
    c($v);
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
        array('title' => 'Line Chart', 'href' => u('/demo/linechart')),
        array('title' => 'Login Form', 'href' => u('/login')),
        array('title' => 'Map', 'href' => u('/demo/map')),
        array('title' => 'Pagination', 'href' => u('/demo/pagination')),
        array('title' => 'Poll', 'href' => u('/demo/poll')),
        array('title' => 'Register Form', 'href' => u('/user/register')),
        array('title' => 'Shopping Cart', 'href' => u('/demo/cart')),
        array('title' => 'Social Profile', 'href' => u('/demo/social')),
        array('title' => 'Text Editor', 'href' => u('/demo/texteditor')),
        array('title' => 'Tree View', 'href' => u('/demo/treeview'))
    );
    
    $view = app()->createView(__DIR__.'/theme/template.php');
    $view->id = 'demos-list';
    $view->set('links', $links);
    c($view);
});

// manually add session start
e('arch.session.load', function () {
    ini_set('session.gc_probability', 0);
    @session_start();
    app()->session->load($_SESSION);
});

e('arch.session.save', function () {
    // trigger core event
    app()->session->save($_SESSION);
    @session_write_close();
});

// add demo stylesheet; use before theme render event
e('arch.theme.after.load', function() {
    c(BASE_URL.'/theme/default/css/animate-custom.css', 'css');
    c(BASE_URL.'/theme/demo/css/style.css', 'css');
    $path = app()->createBreadcrumbs();
    c($path);
});