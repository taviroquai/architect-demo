<?php

r('/demo/http', function() {
    
    $get_result = help()->httpGet(u('/demo/http/get'));
    $post_result = help()->httpPost(
        help()->url('/demo/http/post'),
        array('param' => 'post')
    );
    
    $view = v(__DIR__.'/theme/template.php');
    $view->set('http_get_url', u('/demo/http/get'));
    $view->set('http_post_url', u('/demo/http/post'));
    $view->set('get_result', $get_result);
    $view->set('post_result', $post_result);
    c($view);
});

r('/demo/http/get', function() {
    o('test');
});

r('/demo/http/post', function() {
    o(i('param'));
});